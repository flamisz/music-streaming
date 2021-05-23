<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Music\MusicGateway;
use App\Music\FakeMusicGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegeneratePlaylistTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->musicGateway = new FakeMusicGateway;
        $this->app->instance(MusicGateway::class, $this->musicGateway);
    }

    /** @test */
    public function it_plays_the_new_playlist()
    {
        $likes = ['likes' => [
            ['id' => 123, 'name' => 'Tame Impala']
        ]];
        $response = $this->postJson('/api/likes', $likes);

        $response->assertStatus(200);
    }
}
