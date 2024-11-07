@extends('layouts.main')
@section('title', 'Nossos Médicos')
@section('content')
    <div class="w-75 mx-auto">
        <div class="d-flex justify-content-between">
            <h1 class="h2 mt-3 mb-3">Nossos médicos</h1>
            <div class="d-flex align-items-center">
                <a
                    href="{{ route('doctor.create') }}"
                    class="btn btn-success fw-bold"
                    role="button"
                >
                    <i class="fa-solid fa-plus"></i>
                    Novo médico
                </a>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CRM</th>
                    <th scope="col">Especialidade</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <th scope="row">{{ $doctor->id }}</th>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->crm_number }}</td>
                        <td>{{ $doctor->specialty->name }}</td>
                        <td>
                            <a
                                class="btn btn-primary"
                                href="{{ route('doctor.edit', $doctor->id) }}"
                            >
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form
                                action="{{ route('doctor.destroy', $doctor->id) }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger"
                                >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $doctors->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
