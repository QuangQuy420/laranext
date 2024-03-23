<?php

namespace App\Services\PostLike;

use App\Models\PostLike;
use App\Services\BaseService;

class PostLikeService extends BaseService
{
    public function __construct(PostLike $model)
    {
        $this->model = $model;
    }

    public function getById(int $id)
    {
        return $this->model->getLikedUser($id)->get();
    }
}
