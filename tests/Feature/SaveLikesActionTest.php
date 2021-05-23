<?php

namespace Tests\Feature;

use App\Actions\SaveLikesAction;
use App\DataTransferObjects\LikeData;
use App\DataTransferObjects\StoreLikesData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaveLikesActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_saves_likes_into_db()
    {
        $data = [
            'artist_id' => 1,
            'artist_name' => 'test artist'
        ];

        $like = new LikeData([
            'artistId' => $data['artist_id'],
            'artistName' => $data['artist_name']
        ]);

        $storeLikesData = new StoreLikesData([
            'likes' => [$like]
        ]);

        $this->assertDatabaseMissing('likes', $data);

        (new SaveLikesAction)($storeLikesData);

        $this->assertDatabaseHas('likes', $data);
    }
}
