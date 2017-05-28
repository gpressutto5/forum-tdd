<?php

namespace Tests\Feature;

use Mockery\Exception;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FavoritesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_can_not_favority_anything()
    {
        $this->withExceptionHandling()
            ->post('replies/1/favorites')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_favority_any_reply()
    {
        $reply = create('App\Reply');
        $this->signIn()
            ->post('replies/' . $reply->id . '/favorites');
        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    function an_authenticated_user_may_only_favorite_a_reply_once()
    {
        $reply = create('App\Reply');
        $this->signIn();

        try {
            $this->post('replies/' . $reply->id . '/favorites');
            $this->post('replies/' . $reply->id . '/favorites');
        } catch (\Exception $e) {
            $this->fail('Did not expected to insert the same record twice.');
        }

        $this->assertCount(1, $reply->favorites);
    }
}
