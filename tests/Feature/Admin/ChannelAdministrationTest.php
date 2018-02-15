<?php

namespace Tests\Feature;

use App\User;
use App\Channel;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class ChannelAdministrationTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->withExceptionHandling();
    }

    /** @test */
    public function an_administrator_can_access_the_channel_administration_section()
    {
        $administrator = factory('App\User')->create();
        config(['council.administrators' => [$administrator->email]]);
        $this->signIn($administrator);
        $this->actingAs($administrator)
             ->get('/admin/channels')
             ->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function an_administrator_can_edit_an_existing_channel()
    {
        $this->signInAdmin();
        $this->patch(
            route('admin.channels.update', ['channel' => create('App\Channel')->slug]),
            $updatedChannel = [
                'name' => 'altered',
                'description' => 'altered channel description',
                'archived' => true
            ]
        );
        $this->get(route('admin.channels.index'))
            ->assertSee($updatedChannel['name'])
            ->assertSee($updatedChannel['description']);
    }

    /** @test */
    public function archive_channel_should_not_influence_existing_thread()
    {
        $this->signInAdmin();
        $channel = create('App\Channel');

        $thread = create('App\Thread', ['channel_id' => $channel->id]);

        $path = $thread->path();

        $channel->update([
            'archived' => true
        ]);

        $this->assertEquals($path, $thread->fresh()->path());
    }

    /** @test */
    public function non_administrators_cannot_access_the_channel_administration_section()
    {
        $regularUser = factory(User::class)->create();
        $this->actingAs($regularUser)
             ->get(route('admin.channels.index'))
             ->assertStatus(Response::HTTP_FORBIDDEN);
        $this->actingAs($regularUser)
             ->get(route('admin.channels.create'))
             ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function a_channel_requires_a_name()
    {
        $this->createChannel(['name' => null])
             ->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_channel_requires_a_description()
    {
        $this->createChannel(['description' => null])
             ->assertSessionHasErrors('description');
    }

    /** @test */
    public function an_administrator_can_mark_the_existing_thread_as_archived()
    {
        $this->signInAdmin();
        $channel = create('App\Channel');

        $this->patch(
            route('admin.channels.update', ['channel' => $channel->slug]),
        $updatedChannel = [
            'name' => 'altered',
            'description' => 'altered channel description',
             'archived' => true,
         ]
        );
        $this->assertTrue($channel->fresh()->archived);
    }

    protected function createChannel($overrides = [])
    {
        $administrator = factory('App\User')->create();
        config(['council.administrators' => [$administrator->email]]);
        $this->signIn($administrator);
        $channel = make(Channel::class, $overrides);
        return $this->post('/admin/channels', $channel->toArray());
    }
}
