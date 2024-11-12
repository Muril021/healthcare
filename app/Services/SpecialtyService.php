<?php

namespace App\Services;

use App\Repositories\SpecialtyRepository;

class SpecialtyService extends Service
{
    public function __construct(SpecialtyRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getListSpecialties()
    {
        return $this->repository->getListSpecialties();
    }

    public function getPaginatedListSpecialties()
    {
        return $this->repository->getPaginatedListSpecialties();
    }

    public function getSpecialtyById(string $id)
    {
        return $this->repository->getSpecialtyById($id);
    }

    public function getSpecialtyBySlug(string $slug)
    {
        return $this->repository->getSpecialtyBySlug($slug);
    }

    public function createSpecialty(array $data)
    {
        return $this->repository->createSpecialty($data);
    }

    public function updateSpecialty(array $data, string $id)
    {
        return $this->repository->updateSpecialty($data, $id);
    }

    public function deleteSpecialtyById(string $id)
    {
        return $this->repository->deleteSpecialtyById($id);
    }
}
