<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class LikeData extends DataTransferObject
{
    public string $artistId;

    public string $artistName;

    public static function fromArray($like): LikeData
    {
        return new self([
            'artistId' => $like['id'],
            'artistName' => $like['name'],
        ]);
    }
}
