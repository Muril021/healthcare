<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth', 'role:admin'])
    ->prefix('/medicos')
    ->group(function () {
        Route::get(
            '',
            [DoctorController::class, 'index']
        )->name('doctor.index');

        Route::get(
            '/criar',
            [DoctorController::class, 'create']
        )->name('doctor.create');

        Route::post(
            '',
            [DoctorController::class, 'store']
        )->name('doctor.store');

        Route::get(
            '/{id}/editar',
            [DoctorController::class, 'edit']
        )->name('doctor.edit');

        Route::put(
            '/{id}',
            [DoctorController::class, 'update']
        )->name('doctor.update');

        Route::delete(
            '/{id}',
            [DoctorController::class, 'destroy']
        )->name('doctor.destroy');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
    ->group(function () {
        Route::get(
            '/profile',
            [ProfileController::class, 'edit']
        )->name('profile.edit');

        Route::patch(
            '/profile',
            [ProfileController::class, 'update']
        )->name('profile.update');

        Route::delete(
            '/profile',
            [ProfileController::class, 'destroy']
        )->name('profile.destroy');
    });

require __DIR__.'/auth.php';
