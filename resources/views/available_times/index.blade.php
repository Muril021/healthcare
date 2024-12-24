@extends('layouts.main')
@section('title', 'Horários Disponíveis')
@section('content')
    <div class="w-75 mx-auto">
        <div class="d-flex justify-content-between mt-3 mb-3">
            <h1 class="h2 mt-3">Horários disponíveis</h1>
            <div class="d-flex align-items-center">
                <a
                    href="{{ route('available_time.create') }}"
                    class="btn btn-success fw-bold"
                    role="button"
                >
                    <i class="fa-solid fa-plus"></i>
                    Novo horário
                </a>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Especialidade</th>
                    <th scope="col">Médico</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Data</th>
                    <th scope="col">Remover</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($availableTimes as $availableTime)
                    <tr>
                        <th scope="row">{{ $availableTime->id }}</th>
                        <td>{{ $availableTime->specialty->name }}</td>
                        <td>{{ $availableTime->doctor->name }}</td>
                        <td>{{ $availableTime->schedule->formatted_schedule }}</td>
                        <td>{{ $availableTime->formatted_date }}</td>
                        <td>
                            <form
                                action="{{
                                    route('available_time.destroy', $availableTime->id)
                                }}"
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
            {{ $availableTimes->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
