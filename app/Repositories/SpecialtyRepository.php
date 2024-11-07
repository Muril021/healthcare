<?php

namespace App\Repositories;

use App\Models\Specialty;

class SpecialtyRepository extends Repository
{
    public function __construct(Specialty $model)
    {
        parent::__construct($model);
    }

    public function getListSpecialties()
    {
        return $this->model->get();
    }

    public function getPaginatedListSpecialties()
    {
        return $this->model->paginate(10);
    }
}
