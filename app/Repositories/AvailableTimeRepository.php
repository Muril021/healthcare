<?php

namespace App\Repositories;

use App\Models\AvailableTime;

class AvailableTimeRepository extends Repository
{
    public function __construct(AvailableTime $model)
    {
        parent::__construct($model);
    }

    public function getPaginatedListAvailableTimes()
    {
        return $this->model->orderBy('id', 'desc')
            ->paginate(10);
    }

    public function createAvailableTimes(array $data)
    {
        return $this->model->insert($data);
    }

    public function deleteById(string $id)
    {
        return $this->model->findOrFail($id)
            ->delete();
    }
}
