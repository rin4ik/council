<?php

namespace Tests\Feature;

use App\Thread;
use Tests\TestCase;

class PinThreadsTest extends TestCase
{
    /** @test */
    public function administrators_can_pin_threads()
    {
        $this->signInAdmin();
        $thread = create('App\Thread');
        $this->post(route('pinned-threads.store', $thread));
        $this->assertTrue($thread->fresh()->pinned, 'Failed asserting that the thread was pinned.');
    }

    /** @test */
    public function administrators_can_unpin_threads()
    {
        $this->signInAdmin();
        $thread = create('App\Thread', ['pinned' => true]);
        $this->delete(route('pinned-threads.destroy', $thread));
        $this->assertFalse($thread->fresh()->pinned, 'Failed asserting that the thread was unlocked.');
    }

    /** @test */
    public function pinned_threads_are_listed_first()
    {
        $thread = create(Thread::class, [], 3);
        $ids = $thread->pluck('id');
        $this->signInAdmin();
        $response = $this->getJson(route('threads'));
        $response->assertJson([
           'data' => [
               ['id' => $ids[0]],
               ['id' => $ids[1]],
               ['id' => $ids[2]],
           ]
       ]);
        $this->post(route('pinned-threads.store', $thread[2]));
        $response = $this->getJson(route('threads'));
        $response->assertJson([
           'data' => [
               ['id' => $ids[2]],
               ['id' => $ids[0]],
               ['id' => $ids[1]],
           ]
       ]);
    }
}
