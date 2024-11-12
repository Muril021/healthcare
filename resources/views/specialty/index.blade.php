@extends('layouts.main')
@section('title', 'Especialidades')
@section('content')
    <div class="w-75 mx-auto">
        <div class="d-flex justify-content-between">
            <h1 class="h2 mt-3 mb-3">Especialidades</h1>
            <div class="d-flex align-items-center">
                <a
                    href="{{ route('specialty.create') }}"
                    class="btn btn-success fw-bold"
                    role="button"
                >
                    <i class="fa-solid fa-plus"></i>
                    Nova especialidade
                </a>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Médicos</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialties as $specialty)
                    <tr>
                        <th scope="row">{{ $specialty->id }}</th>
                        <td>{{ $specialty->name }}</td>
                        <td class="ps-4">
                            {{ count($specialty->doctors) }}
                        </td>
                        <td>
                            <a
                                class="btn btn-primary"
                                href="{{ route('specialty.edit', $specialty->id) }}"
                            >
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form
                                action="{{ route('specialty.destroy', $specialty->id) }}"
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
            {{ $specialties->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
