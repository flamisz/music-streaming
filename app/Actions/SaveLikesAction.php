<?php

namespace App\Actions;

use App\Models\Like;
use App\DataTransferObjects\StoreLikesData;

class SaveLikesAction
{
    public function __invoke(StoreLikesData $likesData)
    {
        foreach ($likesData->likes as $data) {
            Like::create([
                'artist_id' => $data->artistId,
                'artist_name' => $data->artistName,
            ]);
        }
    }
}
