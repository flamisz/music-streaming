<?php

namespace App\Actions;

use App\Models\Like;
use App\DataTransferObjects\StoreLikesData;
use App\Actions\SaveLikesAction;

class CreateLikesAction
{
    private $deleteOldLikes;

    private $saveLikesAction;

    public function __construct(
        DeleteOldLikes $deleteOldLikes,
        SaveLikesAction $saveLikesAction
    ) {
        $this->deleteOldLikes = $deleteOldLikes;
        $this->saveLikesAction = $saveLikesAction;
    }

    public function __invoke(StoreLikesData $likesData)
    {
        ($this->deleteOldLikes)();
        ($this->saveLikesAction)($likesData);
    }
}
