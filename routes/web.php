<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/publications/search', [PublicationController::class, 'search'])->name('publication.search');
Route::get('/login', [LoginController::class, 'show'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/lagout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/setting', [InformationsController::class, 'index'])->name('setting.index');
Route::resource('profiles', ProfilController::class);
Route::resource('publication', PublicationController::class);
