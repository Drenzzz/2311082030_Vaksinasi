<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;

Route::get('/', function () {
    return redirect()->route('pendaftar.index');
});

// Route untuk CRUD Pendaftar
Route::resource('pendaftar', PendaftarController::class);

// Route untuk fitur Soft Delete
Route::get('pendaftar-trash', [PendaftarController::class, 'trash'])->name('pendaftar.trash');
Route::patch('pendaftar-restore/{id}', [PendaftarController::class, 'restore'])->name('pendaftar.restore');
Route::delete('pendaftar-force-delete/{id}', [PendaftarController::class, 'forceDelete'])->name('pendaftar.force-delete');
