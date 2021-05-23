<?php

namespace App\Http\Controllers;

use App\Actions\CreateLikesAction;
use App\Http\Requests\StoreLikeRequest;
use App\DataTransferObjects\StoreLikesData;

class RegenaratePlaylistController extends Controller
{
    public function __invoke(StoreLikeRequest $request, CreateLikesAction $storeLikesAction)
    {
        // validate request
        // delete likes older than [SETTINGS] - 1 hour now
        // add new likes to the list
        // regenerate playlist by actual likes
        // play the playlist

        $storeLikesAction(StoreLikesData::fromRequest($request));
    }
}
