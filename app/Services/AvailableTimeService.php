<?php

namespace App\Services;

use App\Repositories\AvailableTimeRepository;

class AvailableTimeService extends Service
{
    public function __construct(AvailableTimeRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getPaginatedListAvailableTimes()
    {
        return $this->repository->getPaginatedListAvailableTimes();
    }

    public function createAvailableTimes(array $data)
    {
        $scheduleIds = $data['schedule_id'];
        unset($data['schedule_id']);

        $availableTimes = [];

        foreach ($scheduleIds as $scheduleId) {
            $availableTimes[] = [
                ...$data,
                'schedule_id' => $scheduleId
            ];
        }

        // dd($availableTimes);
        return $this->repository->createAvailableTimes($availableTimes);
    }

    public function deleteById(string $id)
    {
        return $this->repository->deleteById($id);
    }
}
