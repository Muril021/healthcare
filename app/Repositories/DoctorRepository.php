<?php

namespace App\Repositories;

use App\Models\Doctor;

class DoctorRepository extends Repository
{
    public function __construct(Doctor $model)
    {
        parent::__construct($model);
    }

    public function getListDoctors()
    {
        return $this->model->get();
    }

    public function getPaginatedListDoctors()
    {
        return $this->model->paginate(10);
    }

    public function getListDoctorsBySpecialtyId(string $specialtyId)
    {
        return $this->model
            ->where('specialty_id', $specialtyId)
            ->get();
    }

    public function getDoctorById(string $id)
    {
        return $this->model->where('id', $id)
            ->first();
    }

    public function createDoctor(array $data)
    {
        return $this->model->create($data);
    }

    public function updateDoctorById(string $id, array $data)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function deleteDoctorById(string $id)
    {
        return $this->model->findOrFail($id)
            ->delete();
    }
}
