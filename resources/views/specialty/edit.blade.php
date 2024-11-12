@extends('layouts.main')
@section('title', 'Editar Especialidade')
@section('content')
    <div class="pb-5 w-75 mx-auto">
        <h1 class="h2 mt-3 mb-3">Editar especialidade</h1>
        <form
            action="{{ route('specialty.update', $specialty->id) }}"
            method="POST"
        >
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
                    value="{{ old('name', $specialty->name) }}"
                >
            </div>
            <div class="mb-3">
                <label
                    for="exampleFormControlInput1"
                    class="form-label fw-bold"
                >
                    Descrição
                    <span class="text-danger fw-bold">*</span>
                </label>
                <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    style="height: 300px"
                    name="description"
                >{{ $specialty->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">
                Salvar
            </button>
        </form>
    </div>
@endsection