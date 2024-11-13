<?php

namespace App\Services;

use App\Repositories\ScheduleRepository;

class ScheduleService extends Service
{
    public function __construct(ScheduleRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getListSchedules()
    {
        return $this->repository->getListSchedules();
    }
}
