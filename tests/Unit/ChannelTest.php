<?php

namespace Tests\Unit;

use App\Channel;
use Tests\TestCase;

class ChannelTest extends TestCase
{
    /** @test*/
    public function a_channel_consists_of_threads()
    {
        $channel = create('App\Channel');
        $thread = create('App\Thread', ['channel_id' => $channel->id]);
        $this->assertTrue($channel->threads->contains($thread));
    }

    /** @test */
    public function a_channel_can_be_archived()
    {
        $channel = create('App\Channel');
        $this->assertFalse($channel->fresh()->archived);
        $channel->archive();
        $this->assertTrue($channel->archived);
    }

    /** @test */
    public function archived_channels_are_excluded_by_default()
    {
        create('App\Channel');
        create('App\Channel', ['archived' => true]);
        $this->assertEquals(1, Channel::count());
    }
}
