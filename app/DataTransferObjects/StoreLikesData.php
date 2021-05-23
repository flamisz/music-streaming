<?php

namespace App\DataTransferObjects;

use App\Actions\DeleteOldLikesAction;
use App\DataTransferObjects\LikeData;
use App\Http\Requests\StoreLikeRequest;
use Spatie\DataTransferObject\DataTransferObject;

class StoreLikesData extends DataTransferObject
{
    /** @var \App\DataTransferObjects\LikeData[] */
    public array $likes = [];

    public static function fromRequest(StoreLikeRequest $request): StoreLikesData
    {
        $likesArray = $request->input('likes');
        $likes = [];

        foreach ($likesArray as $like) {
            $likes[] = LikeData::fromArray($like);
        }

        return new self([
            'likes' => $likes,
        ]);
    }
}
