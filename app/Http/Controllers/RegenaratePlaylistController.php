<?php

namespace App\Http\Controllers;

use App\Music\MusicGateway;
use App\Actions\CreateLikesAction;
use App\Actions\UpdatePlaylistAction;
use App\Http\Requests\StoreLikeRequest;
use App\DataTransferObjects\StoreLikesData;

class RegenaratePlaylistController extends Controller
{
    private $musicGateway;

    public function __construct(MusicGateway $musicGateway)
    {
        $this->musicGateway = $musicGateway;
    }

    public function __invoke(
        StoreLikeRequest $request,
        CreateLikesAction $storeLikesAction,
        UpdatePlaylistAction $updatePlaylistAction
    ) {
        // validate request
        // delete likes older than [SETTINGS] - 1 hour now
        // add new likes to the list
        // regenerate playlist by actual likes
        // play the playlist

        $storeLikesAction(StoreLikesData::fromRequest($request));
        $playlistId = $updatePlaylistAction();
        $this->musicGateway->playPlaylist($playlistId);

        return $playlistId;
    }
}
