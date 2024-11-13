<?php

namespace App\Repositories;

use App\Models\Schedule;

class ScheduleRepository extends Repository
{
    public function __construct(Schedule $model)
    {
        parent::__construct($model);
    }

    public function getListSchedules()
    {
        return $this->model->get();
    }
}
