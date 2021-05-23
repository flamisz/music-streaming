<?php

namespace App\Actions;

use App\Models\Like;
use Illuminate\Support\Str;
use App\Music\MusicGateway;

class UpdatePlaylistAction
{
    private $musicGateway;

    public function __construct(MusicGateway $musicGateway)
    {
        $this->musicGateway = $musicGateway;
    }

    public function __invoke()
    {
        $likes = Like::all();
        $tracks = [];

        foreach ($likes as $like) {
            $tracks[] =  $this->musicGateway->getArtistTopTracks($like->artist_id);
        }

        $playlistId = $this->musicGateway->createPlaylist(Str::random(20));
        $this->musicGateway->addItemsToPlaylist($playlistId, $tracks);

        return $playlistId;
    }
}
