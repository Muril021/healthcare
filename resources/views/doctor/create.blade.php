@extends('layouts.main')
@section('title', 'Novo Médico')
@section('content')
    <div class="pb-5 w-75 mx-auto">
        <h1 class="h2 mt-3 mb-3">Novo médico</h1>
        <form action="{{ route('doctor.store') }}" method="POST">
            @csrf
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
                        <option value="{{ $specialty->id }}">
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
