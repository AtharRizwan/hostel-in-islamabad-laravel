<?php

namespace Tests\Feature;

use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    private function validReview(array $overrides = []): array
    {
        return array_merge([
            'username' => 'happy_guest',
            'url' => 'https://example.com',
            'review' => str_repeat('Lovely stay, friendly staff and great breakfast. ', 3),
        ], $overrides);
    }

    private function reviewBy(User $user): Review
    {
        return Review::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'text' => 'A review',
            'position' => 'member',
            'username' => 'someone',
            'website' => 'https://example.com',
        ]);
    }

    public function test_users_can_add_a_review_without_exposing_their_email(): void
    {
        $user = User::factory()->create(['name' => 'Guest Person', 'email' => 'private@example.com']);

        $this->actingAs($user)->post('/reviews', $this->validReview())
            ->assertRedirect(route('services').'#reviews')
            ->assertSessionHas('success');

        $this->assertDatabaseHas('reviews', [
            'user_id' => $user->id,
            'name' => 'Guest Person',
            'username' => 'happy_guest',
            'position' => 'member',
        ]);

        $this->actingAs($user)->get('/services')
            ->assertSee('@happy_guest')
            ->assertDontSee('private@example.com');
    }

    public function test_invalid_reviews_are_rejected_with_errors(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post('/reviews', $this->validReview([
            'username' => 'not a handle!',
            'url' => 'javascript:alert(1)',
            'review' => 'Too short',
        ]))
            ->assertRedirect(route('services').'#add-review')
            ->assertSessionHasErrors(['username', 'url', 'review']);

        $this->assertDatabaseCount('reviews', 0);
    }

    public function test_users_can_delete_their_own_review(): void
    {
        $user = User::factory()->create();
        $review = $this->reviewBy($user);

        $this->actingAs($user)->delete('/reviews/'.$review->id)->assertSessionHas('success');

        $this->assertModelMissing($review);
    }

    public function test_users_cannot_delete_someone_elses_review(): void
    {
        $review = $this->reviewBy(User::factory()->create());

        $this->actingAs(User::factory()->create())->delete('/reviews/'.$review->id)->assertSessionHas('error');

        $this->assertModelExists($review);
    }

    public function test_admins_can_delete_any_review(): void
    {
        $review = $this->reviewBy(User::factory()->create());
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)->delete('/reviews/'.$review->id)->assertSessionHas('success');

        $this->assertModelMissing($review);
    }

    public function test_delete_button_only_shows_for_the_author_or_an_admin(): void
    {
        $author = User::factory()->create();
        $this->reviewBy($author);

        $this->actingAs($author)->get('/services')->assertSee('class="review-delete"', false);
        $this->actingAs(User::factory()->create())->get('/services')->assertDontSee('class="review-delete"', false);
        $this->actingAs(User::factory()->create(['role' => 'admin']))->get('/services')->assertSee('class="review-delete"', false);
    }
}
