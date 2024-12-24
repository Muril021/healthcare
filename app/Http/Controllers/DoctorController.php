<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use App\Services\DoctorService;
use App\Services\SpecialtyService;
use App\Factories\NotifyFactory as Notify;

class DoctorController extends Controller
{
    public function __construct(
        private DoctorService $doctorService,
        private SpecialtyService $specialtyService
    ) {
        $this->doctorService = $doctorService;
        $this->specialtyService = $specialtyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $doctors = $this->doctorService->getPaginatedListDoctors();

            return view('doctor.index', compact('doctors'));
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

            return view('doctor.create', compact('specialties'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->rules()));

            $this->doctorService->createDoctor($data);

            Notify::makeSuccess('Salvo com sucesso.');
            return redirect()->route('doctor.index');
        } catch (\Throwable $th) {

        }
    }

    /**
     * Display the specified resource.
     */
    public function getListDoctorsBySpecialtyId(string $specialtyId)
    {
        try {
            $doctors = $this->doctorService
                ->getListDoctorsBySpecialtyId($specialtyId);

            return response()->json($doctors);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $doctor = $this->doctorService->getDoctorById($id);
            $specialties = $this->specialtyService->getListSpecialties();

            return view('doctor.edit', compact('doctor', 'specialties'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, string $id)
    {
        try {
            $data = $request->only(array_keys($request->rules()));

            $this->doctorService->updateDoctorById($id, $data);

            Notify::makeSuccess('Atualizado com sucesso.');
            return redirect()->route('doctor.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->doctorService->deleteDoctorById($id);

            return redirect()->route('doctor.index');
        } catch (\Throwable $th) {

        }
    }
}
