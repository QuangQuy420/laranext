<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Services\BaseService;

class PostService extends BaseService
{
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function getAllFromUser($userId)
    {
        return $this->model->getAllInfoPost($userId)->get();
    }
}
