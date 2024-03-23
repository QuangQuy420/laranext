<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    protected Model $model;

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $model = $this->getById($id);
        $model->update($data);
        return $model;
    }

    public function delete(int $id)
    {
        $model = $this->getById($id);
        $model->delete();
        return $model;
    }

    protected function initDefaultData(): static
    {
        return $this;
    }

    public function new()
    {
        $this->model = $this->model->newInstance();
        $this->initDefaultData();
        return $this->model;
    }

    protected function formatInputData(array &$inputs): void
    {
        // Format data here
    }

    protected function setModelFields(array $inputs): void
    {
        // Set model fields here
    }
}
