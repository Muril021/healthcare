<?php

namespace App\Http\Controllers;

use App\Factories\NotifyFactory as Notify;
use App\Http\Requests\SpecialtyRequest;
use App\Services\SpecialtyService;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function __construct(
        public SpecialtyService $specialtyService
    )
    {
        $this->specialtyService = $specialtyService;
    }

    public function getSpecialties($view = 'index')
    {
        try {
            $specialties = $this->specialtyService->getPaginatedListSpecialties();

            if ($view === 'list') {
                return view('specialty.list', compact('specialties'));
            }

            return view('specialty.index', compact('specialties'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getSpecialtyBySlug(string $slug)
    {
        try {
            $specialty = $this->specialtyService->getSpecialtyBySlug($slug);

            return view('specialty.show', compact('specialty'));
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
            return view('specialty.create');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecialtyRequest $request)
    {
        try {
            $data = $request->only(array_keys($request->rules()));

            $this->specialtyService->createSpecialty($data);

            Notify::makeSuccess('Salvo com sucesso.');
            return redirect()->route('specialty.index');
        } catch (\Throwable $th) {
            //throw $th;
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
        try {
            $specialty = $this->specialtyService->getSpecialtyById($id);

            return view('specialty.edit', compact('specialty'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecialtyRequest $request, string $id)
    {
        try {
            $data = $request->only(array_keys($request->rules()));

            $this->specialtyService->updateSpecialty($data, $id);

            Notify::makeSuccess('Atualizado com sucesso.');
            return redirect()->route('specialty.index');
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
            $this->specialtyService->deleteSpecialtyById($id);

            return redirect()->route('specialty.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
