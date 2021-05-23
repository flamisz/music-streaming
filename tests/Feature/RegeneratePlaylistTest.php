<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery\MockInterface;
use App\Music\SpotifyMusicGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegeneratePlaylistTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_plays_the_new_playlist()
    {
        $this->mock(SpotifyMusicGateway::class, function (MockInterface $mock) {
            $mock->shouldReceive('getArtistTopTracks')->once();
            $mock->shouldReceive('createPlaylist')->once();
            $mock->shouldReceive('addItemsToPlaylist')->once();
            $mock->shouldReceive('playPlayList')->once();
        });

        $likes = ['likes' => [
            ['id' => 123, 'name' => 'Tame Impala']
        ]];

        $response = $this->postJson('/api/likes', $likes);

        $response->assertStatus(200);
    }
}
