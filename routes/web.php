<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AlatKopiController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('home'))->name('home');
Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
Route::get('/funfact', fn() => view('funfact'))->name('funfact');
Route::get('/about', fn() => view('about'))->name('about');

//alat kopi
Route::get('/alatkopi', [AlatKopiController::class, 'index'])->name('alat');
Route::get('/alatkopi/{id}', [AlatKopiController::class, 'show'])->name('alat_kopi.show');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| EVENT USER VIEW
|--------------------------------------------------------------------------
*/
Route::get('/event', [EventController::class, 'index'])->name('event.index');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['role:admin'])->group(function () {

    // DASHBOARD ADMIN
    Route::get('/admin/dashboard', fn() => view('admin.dashAdmin'))->name('admin.dashboard');

    // ALAT KOPI
    Route::get('/alat-kopi/create', [AlatKopiController::class, 'create'])->name('admin.alat_kopi.create');
    Route::post('/alat-kopi', [AlatKopiController::class, 'store'])->name('admin.alat_kopi.store');
    Route::get('/alat-kopi', [AlatKopiController::class, 'index'])->name('alat_kopi.index');

    // EVENT

    Route::get('/event/create', [EventController::class, 'create'])->name('admin.event.create');
    Route::get('/event/index', [EventController::class, 'adminIndex'])->name('admin.event.index');
    Route::get('/admin/event/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
    Route::post('/event/store', [EventController::class, 'store'])->name('admin.event.store');
    Route::delete('/admin/event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');

    // FORUM ADMIN
    Route::get('/admin/forum', [ForumController::class, 'adminIndex'])->name('admin.forum.index');
    Route::get('/admin/forum/create', [ForumController::class, 'create'])->name('admin.forum.create');
    Route::post('/admin/forum/store', [ForumController::class, 'store'])->name('admin.forum.store');
    Route::get('/admin/forum/{id}/edit', [ForumController::class, 'edit'])->name('admin.forum.edit');
    Route::put('/admin/forum/{id}', [ForumController::class, 'update'])->name('admin.forum.update');
    Route::delete('/admin/forum/{id}', [ForumController::class, 'destroy'])->name('admin.forum.delete');
});

/*
|--------------------------------------------------------------------------
| FORUM USER
|--------------------------------------------------------------------------
*/
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');

/*
|--------------------------------------------------------------------------
| COMMENT
|--------------------------------------------------------------------------
|
| Semua user yang LOGIN boleh komentar.
| Tidak pakai role:user supaya Admin tidak error (kalau mau test komentar).
|
|--------------------------------------------------------------------------
*/
Route::post('/forum/{forum}/comment', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comment.store');
