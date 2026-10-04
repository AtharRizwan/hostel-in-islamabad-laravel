<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Database\Seeders\ServiceSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(ServiceSeeder::class);
    }

    public function test_guests_are_redirected_to_login_from_every_page(): void
    {
        $service = Service::first();

        foreach (['/home', '/about', '/services', '/services/'.$service->id] as $url) {
            $this->get($url)->assertRedirect(route('login'));
        }
    }

    public function test_logged_in_users_can_see_every_page(): void
    {
        $user = User::factory()->create();
        $service = Service::first();

        $this->actingAs($user)->get('/home')->assertOk()->assertSee('Welcome to Hostel in Islamabad');
        $this->actingAs($user)->get('/about')->assertOk()->assertSee('Our Mission');
        $this->actingAs($user)->get('/services')->assertOk()->assertSee('Available Services');
        $this->actingAs($user)->get('/services/'.$service->id)->assertOk()->assertSee($service->name);
    }

    public function test_home_features_the_first_three_services(): void
    {
        $user = User::factory()->create();
        [$first, $second, $third, $fourth] = Service::orderBy('id')->take(4)->get();

        $this->actingAs($user)->get('/home')
            ->assertSee($first->name)
            ->assertSee($second->name)
            ->assertSee($third->name)
            ->assertDontSee($fourth->name);
    }

    public function test_service_page_lists_each_line_and_renders_bold_safely(): void
    {
        $user = User::factory()->create();
        $service = Service::create([
            'name' => 'Test Service',
            'image_link' => 'img/bike.jpg',
            'description' => 'Short',
            'long_description' => "First **bold** point\nSecond <script>alert(1)</script> point",
            'price' => 'Free',
        ]);

        $this->actingAs($user)->get('/services/'.$service->id)
            ->assertSee('<li>First <strong>bold</strong> point</li>', false)
            ->assertSee('&lt;script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false);
    }

    public function test_only_admins_see_the_update_service_form(): void
    {
        $service = Service::first();

        $this->actingAs(User::factory()->create())->get('/services/'.$service->id)
            ->assertDontSee('Update Service');

        $this->actingAs(User::factory()->create(['role' => 'admin']))->get('/services/'.$service->id)
            ->assertSee('Update Service');
    }
}
