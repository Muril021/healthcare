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
}
