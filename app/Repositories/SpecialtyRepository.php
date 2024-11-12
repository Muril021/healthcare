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

    public function getSpecialtyById(string $id)
    {
        return $this->model->select($this->table.'.*')
            ->findOrFail($id);
    }

    public function getSpecialtyBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)
            ->first();
    }

    public function createSpecialty(array $data)
    {
        return $this->model->create($data);
    }

    public function updateSpecialty(array $data, string $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function deleteSpecialtyById(string $id)
    {
        return $this->model->findOrFail($id)
            ->delete();
    }
}
