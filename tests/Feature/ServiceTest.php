<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Database\Seeders\ServiceSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;

    private array $changes = [
        'name' => 'Updated name',
        'price' => 'Rs 999',
        'description' => 'Updated description',
        'long_description' => "Point one\nPoint two",
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(ServiceSeeder::class);
    }

    public function test_non_admins_cannot_update_a_service(): void
    {
        $service = Service::first();
        $original = $service->name;

        $this->actingAs(User::factory()->create())
            ->put('/services/'.$service->id, $this->changes)
            ->assertForbidden();

        $this->assertSame($original, $service->fresh()->name);
    }

    public function test_admins_can_update_a_service(): void
    {
        $service = Service::first();
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->put('/services/'.$service->id, $this->changes)
            ->assertRedirect(route('service.show', $service))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('services', ['id' => $service->id] + $this->changes);
    }

    public function test_invalid_service_updates_are_rejected(): void
    {
        $service = Service::first();
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->put('/services/'.$service->id, ['name' => ''] + $this->changes)
            ->assertRedirect(route('service.show', $service).'#edit-service')
            ->assertSessionHasErrors('name');
    }

    public function test_pricing_table_shows_prices_as_stored(): void
    {
        $this->actingAs(User::factory()->create())->get('/services')
            ->assertSee('Rs 1000 per person')
            ->assertSee('Complimentary')
            ->assertDontSee('per serving per serving')
            ->assertDontSee('per person per serving')
            ->assertDontSee('Complimentary per serving');
    }
}
