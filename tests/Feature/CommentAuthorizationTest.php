<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Word;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_delete_comment(): void
    {
        $user = User::factory()->create();
        $word = Word::factory()->create(['user_id' => $user->id]);
        $comment = Comment::factory()->create([
            'word_id' => $word->id,
            'user_id' => $user->id,
        ]);

        $response = $this->delete("/words/{$word->spell}/comments/{$comment->id}");

        $response->assertRedirect('/login');
        $this->assertDatabaseHas('comments', ['id' => $comment->id]);
    }

    public function test_user_can_delete_own_comment(): void
    {
        $user = User::factory()->create();
        $word = Word::factory()->create(['user_id' => $user->id]);
        $comment = Comment::factory()->create([
            'word_id' => $word->id,
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->delete("/words/{$word->spell}/comments/{$comment->id}");

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Comment deleted successfully.');
        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
    }

    public function test_user_cannot_delete_other_users_comment(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();
        $word = Word::factory()->create(['user_id' => $owner->id]);
        $comment = Comment::factory()->create([
            'word_id' => $word->id,
            'user_id' => $owner->id,
        ]);

        $response = $this->actingAs($otherUser)->delete("/words/{$word->spell}/comments/{$comment->id}");

        $response->assertForbidden();
        $this->assertDatabaseHas('comments', ['id' => $comment->id]);
    }

    public function test_admin_can_delete_any_comment(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $word = Word::factory()->create(['user_id' => $user->id]);
        $comment = Comment::factory()->create([
            'word_id' => $word->id,
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($admin)->delete("/words/{$word->spell}/comments/{$comment->id}");

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Comment deleted successfully.');
        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
    }

    public function test_comment_policy_allows_owner_to_delete(): void
    {
        $user = User::factory()->create();
        $comment = Comment::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($user->can('delete', $comment));
    }

    public function test_comment_policy_denies_non_owner_to_delete(): void
    {
        $owner = User::factory()->create();
        $otherUser = User::factory()->create();
        $comment = Comment::factory()->create(['user_id' => $owner->id]);

        $this->assertFalse($otherUser->can('delete', $comment));
    }

    public function test_comment_policy_allows_admin_to_delete(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $comment = Comment::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($admin->can('delete', $comment));
    }
}
