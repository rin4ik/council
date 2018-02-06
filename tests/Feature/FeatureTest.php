<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Reputation;

class FeatureTest extends TestCase
{
    /** @test */
    public function user_earns_points_when_they_create_a_thread()
    {
        $thread = create('App\Thread');
        $this->assertEquals(Reputation::THREAD_WAS_PUBLISHED, $thread->creator->reputation);
    }

    /** @test */
    public function user_lose_points_when_they_delete_a_thread()
    {
        $this->signIn();
        $thread = create('App\Thread', ['user_id' => auth()->id()]);
        $this->assertEquals(Reputation::THREAD_WAS_PUBLISHED, $thread->creator->reputation);
        $this->delete($thread->path());
        $this->assertEquals(0, $thread->creator->fresh()->reputation);
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
        $this->assertEquals(Reputation::REPLY_POSTED, $reply->owner->reputation);
    }

    /** @test */
    public function user_loses_points_when_they_delete_their_reply()
    {
        $this->signIn();
        $reply = create('App\Reply', ['user_id' => auth()->id()]);

        $this->assertEquals(Reputation::REPLY_POSTED, $reply->owner->reputation);
        $this->delete("/replies/{$reply->id}");
        $this->assertEquals(0, $reply->owner->fresh()->reputation);
    }

    /** @test */
    public function a_user_earns_points_when_their_reply_is_marked_as_best()
    {
        $thread = create('App\Thread');
        $reply = $thread->addReply(
            [
                'user_id' => create('App\User')->id,
                'body' => 'reply'
            ]
            );

        $thread->markBestReply($reply);
        $total = Reputation::REPLY_POSTED + Reputation::BEST_REPLY_AWARDED;
        $this->assertEquals($total, $reply->owner->reputation);
    }
     /** @test */
     public function a_user_earns_points_when_their_reply_is_favorited()
     {
         $this->signIn();
         $thread = create('App\Thread');
       $reply =  $thread->addReply(
             [
                 'user_id' => auth()->id(),
                 'body' => 'reply'
             ]
             );
 
         $this->post("replies/{$reply->id}/favorites");
         $total = Reputation::REPLY_POSTED + Reputation::REPLY_FAVORITED;
         $this->assertEquals($total, $reply->owner->fresh()->reputation);
     }
          /** @test */
          public function a_user_loses_points_when_their_reply_is_unfavorited()
          {
              $this->signIn();
            $thread = create('App\Thread');
            $reply =  $thread->addReply(
                  [
                      'user_id' => auth()->id(),
                      'body' => 'reply'
                  ]
                  );
      
              $this->post("replies/{$reply->id}/favorites");
              $total = Reputation::REPLY_POSTED + Reputation::REPLY_FAVORITED;
              $this->assertEquals($total, $reply->owner->fresh()->reputation);
              $this->delete("replies/{$reply->id}/favorites");
              $this->assertEquals(Reputation::REPLY_POSTED, $reply->owner->fresh()->reputation);
              
          }
}
