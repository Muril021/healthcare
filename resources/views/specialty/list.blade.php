@extends('layouts.main')
@section('title', 'Nossas Especialidades')
@section('content')
    <div class="w-75 mx-auto">
        @foreach ($specialties as $specialty)
            <div class="card mt-4" id="{{ $specialty->id }}">
                <div class="card-items d-flex justify-content-between">
                    <div class="card-body fw-bold">
                        {{ $specialty->name }}
                    </div>
                    <div class="d-flex align-items-center me-3">
                        <a
                            href="{{ route('specialty.show', $specialty->slug) }}"
                            class="btn btn-primary btn-sm fw-bold"
                        >
                            Saiba mais
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mt-4">
            {{ $specialties->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
