<?php

namespace App\Services;

use App\Repositories\DoctorRepository;

class DoctorService extends Service
{
    public function __construct(DoctorRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getListDoctors()
    {
        return $this->repository->getListDoctors();
    }

    public function getPaginatedListDoctors()
    {
        return $this->repository->getPaginatedListDoctors();
    }

    public function getListDoctorsBySpecialtyId(string $specialtyId)
    {
        return $this->repository->getListDoctorsBySpecialtyId($specialtyId);
    }

    public function getDoctorById(string $id)
    {
        return $this->repository->getDoctorById($id);
    }

    public function createDoctor($data)
    {
        return $this->repository->createDoctor($data);
    }

    public function updateDoctorById(string $id, array $data)
    {
        return $this->repository->updateDoctorById($id, $data);
    }

    public function deleteDoctorById(string $id)
    {
        return $this->repository->deleteDoctorById($id);
    }
}
