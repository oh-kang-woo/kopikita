<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AlatKopiController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/funfact', function () {
    return view('funfact');
})->name('funfact');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/alatkopi', function () {
    return view('alat');
})->name('alat');

// ================== USER EVENT VIEW ==================
Route::get('/event', [EventController::class, 'index'])->name('event.index');

// ================== ADMIN CRUD EVENT ==================
Route::get('/event/admin', [EventController::class, 'adminIndex'])->name('admin.event.index');
Route::get('/event/create', [EventController::class, 'create'])->name('admin.event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('admin.event.store');
Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
Route::put('/event/{id}', [EventController::class, 'update'])->name('admin.event.update');
Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('admin.event.delete');



// ================== ALAT KOPI ==================
// Tampilkan semua alat kopi (publik)
Route::get('/alat-kopi', [AlatKopiController::class, 'index'])->name('alat_kopi.index');

// Form untuk menambah alat kopi (admin)
Route::get('/alat-kopi/create', [AlatKopiController::class, 'create'])->name('admin.alat_kopi.create');

// Simpan data alat kopi (admin)
Route::post('/alat-kopi', [AlatKopiController::class, 'store'])->name('admin.alat_kopi.store');

// Search alat kopi
Route::get('/alat-kopi/search', [AlatKopiController::class, 'search'])->name('artikel.search');

Route::get('/alat-kopi/{id}', [AlatKopiController::class, 'show'])->name('alat_kopi.show');
