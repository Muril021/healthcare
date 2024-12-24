<?php

namespace App\Http\Controllers;

use App\Factories\NotifyFactory as Notify;
use App\Http\Requests\AvailableTimeRequest;
use App\Services\AvailableTimeService;
use App\Services\DoctorService;
use App\Services\ScheduleService;
use App\Services\SpecialtyService;
use Illuminate\Http\Request;

class AvailableTimeController extends Controller
{
    public function __construct(
        private AvailableTimeService $availableTimeService,
        private SpecialtyService $specialtyService,
        private DoctorService $doctorService,
        private ScheduleService $scheduleService
    ) {
        $this->availableTimeService = $availableTimeService;
        $this->specialtyService = $specialtyService;
        $this->doctorService = $doctorService;
        $this->scheduleService = $scheduleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $doctors = $this->doctorService->getListDoctors();
            $availableTimes = $this->availableTimeService
                ->getPaginatedListAvailableTimes();

            return view(
                'available_times.index',
                compact('doctors', 'availableTimes')
            );
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $specialties = $this->specialtyService->getListSpecialties();
            $schedules = $this->scheduleService->getListSchedules();

            return view(
                'available_times.create',
                compact('specialties', 'schedules')
            );
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AvailableTimeRequest $request)
    {
        // dd($request->all());
        try {
            $data = $request->only(array_keys($request->rules()));

            $this->availableTimeService->createAvailableTimes($data);

            Notify::makeSuccess('Salvo com sucesso.');
            return redirect()->route('available_time.index');
        } catch (\Throwable $th) {
            logger()->error($th->getMessage(), ['trace' => $th->getTraceAsString()]);
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->availableTimeService->deleteById($id);

            return redirect()->route('available_time.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
