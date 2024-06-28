<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [UserController::class, 'showRegisterForm'])->name('formregister');
Route::post('register', [UserController::class, 'register'])->name('register');

Route::get('login', [UserController::class, 'showLoginForm'])->name('formlogin');
Route::post('login', [UserController::class, 'login'])->name('login');

Route::post('logout', [UserController::class, 'logout'])->name('logout');


Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/view', [PegawaiController::class, 'index'])->name('index');

    Route::get('/add', [PegawaiController::class, 'tambah'])->name('tambah');
    Route::post('/add/store', [PegawaiController::class, 'store'])->name('store');

    Route::get('/edit{id}', [PegawaiController::class, 'edit'])->name('edit');
    Route::post('/edit/update/{id}', [PegawaiController::class, 'update'])->name('update');

    Route::get('/hapus/{id}', [PegawaiController::class, 'hapus'])->name('hapus');
    Route::post('/hapus/destroy', [PegawaiController::class, 'destroy'])->name('destroy');
});
