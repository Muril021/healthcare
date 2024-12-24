@extends('layouts.main')
@section('title', 'Novo Horário')
@section('content')
    <div class="pb-5 w-75 mx-auto">
        <h1 class="h2 mt-3 mb-3">Novo horário</h1>
        <form action="{{ route('available_time.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label
                    for="exampleFormControlInput1"
                    class="form-label fw-bold"
                >
                    Especialidade
                    <span class="text-danger fw-bold">*</span>
                </label>
                <select
                    class="form-select form-select-sm specialty"
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
            <div class="mb-3">
                <label
                    for="exampleFormControlInput1"
                    class="form-label fw-bold"
                >
                    Médico
                    <span class="text-danger fw-bold">*</span>
                </label>
                <select
                    class="form-select form-select-sm doctor"
                    name="doctor_id"
                >
                    <option selected>Selecionar médico</option>
                </select>
            </div>
            <div class="mb-3">
                <label
                    for="exampleFormControlInput1"
                    class="form-label fw-bold"
                >
                    Data
                    <span class="text-danger fw-bold">*</span>
                </label>
                <input type="date" name="date">
            </div>
            <div class="mb-3">
                <label
                    for="exampleFormControlInput1"
                    class="form-label fw-bold"
                >
                    Horário(s)
                    <span class="text-danger fw-bold">*</span>
                </label>
                <p>
                    Segure a tecla <span class="fw-bold">Ctrl</span> e clique com o mouse
                    nas opções que deseja selecionar:
                </p>
                <select
                    class="form-select form-select-sm"
                    name="schedule_id[]"
                    size="10"
                    multiple
                >
                    @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->id }}">
                            {{ $schedule->formatted_schedule }}
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
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const specialtySelect = document.querySelector('.specialty');
            const doctorSelect = document.querySelector('.doctor');

            specialtySelect.addEventListener('change', function () {
                const specialtyId = this.value;

                doctorSelect.innerHTML = '<option selected>Selecionar médico</option>'

                if (specialtyId) {
                    fetch(`/medicos/doctors-by-specialty/${specialtyId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(doctor => {
                            const option = document.createElement('option');
                            option.value = doctor.id;
                            option.textContent = doctor.name;
                            doctorSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error(error));
                }
            });
        });
    </script>
@endpush
