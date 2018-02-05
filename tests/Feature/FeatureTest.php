<?php

namespace Tests\Feature;

use Tests\TestCase;

class FeatureTest extends TestCase
{
    /** @test */
    public function user_earns_points_when_they_create_a_thread()
    {
        $thread = create('App\Thread');
        $this->assertEquals(10, $thread->creator->reputation);
    }

    /** @test */
    public function user_earns_points_when_they_reply_to_thread()
    {
        $thread = create('App\Thread');
        $reply = $thread->addReply(
    [
        'user_id' => create('App\User')->id,
        'body' => 'reply'
    ]
    );
        $this->assertEquals(2, $reply->owner->reputation);
    }

    /** @test */
    public function a_user_earns_points_when_their_reply_is_marked_as_best(Type $var = null)
    {
        $thread = create('App\Thread');
        $reply = $thread->addReply(
            [
                'user_id' => create('App\User')->id,
                'body' => 'reply'
            ]
            );
        $thread->markBestReply($reply);
        $this->assertEquals(52, $reply->owner->reputation);
    }
}
