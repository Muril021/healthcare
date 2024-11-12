@extends('layouts.main')
@section('title', $specialty->name)
@section('content')
    <div class="w-75 mx-auto mt-4">
        <div class="row">
            <h1 class="fw-bold pb-2">{{ $specialty->name }}</h1>
            <div class="content fs-4">
                {!! nl2br(e($specialty->description)) !!}
            </div>
        </div>
    </div>
@endsection
