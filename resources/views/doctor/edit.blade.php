@extends('layouts.main')
@section('title', 'Editar Médico')
@section('content')
    <div class="pb-5 w-75 mx-auto">
        <h1 class="h2 mt-3 mb-3">Editar médico</h1>
        <form action="{{ route('doctor.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label
                    for="exampleFormControlInput1"
                    class="form-label fw-bold"
                >
                    Nome
                    <span class="text-danger fw-bold">*</span>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    name="name"
                    value="{{ old('name', $doctor->name) }}"
                >
            </div>
            <div class="mb-3">
                <label
                    for="exampleFormControlInput1"
                    class="form-label fw-bold"
                >
                    CRM
                    <span class="text-danger fw-bold">*</span>
                </label>
                <input
                    type="text"
                    class="form-control"
                    id="exampleFormControlInput1"
                    name="crm_number"
                    value="{{ old('crm_number', $doctor->crm_number) }}"
                >
            </div>
            <div class="mb-3">
                <label
                    for="exampleFormControlInput1"
                    class="form-label fw-bold"
                >
                    Especialidade
                    <span class="text-danger fw-bold">*</span>
                </label>
                <select
                    class="form-select form-select-sm"
                    name="specialty_id"

                >
                    <option selected>Selecionar especialidade</option>
                    @foreach ($specialties as $specialty)
                        <option
                            value="{{ $specialty->id }}"
                            {{ $specialty->id == $doctor->specialty_id ? 'selected' : '' }}
                        >
                            {{ $specialty->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                Salvar
            </button>
        </form>
    </div>
@endsection
