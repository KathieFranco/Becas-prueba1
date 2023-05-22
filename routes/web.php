<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BecaController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoritoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix('/', function () {
   return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/tips', function () {
        return view('tips');
    })->name('tips');
    Route::get('/user/favs', function () {
        return view('profile.favoritos');
    })->name('profile.favoritos');
});


Route::get('/', [BecaController::class, 'index'])->name('welcome');
Route::get('/create', [BecaController::class, 'create'])->name('becas.create');
Route::post('/', [BecaController::class, 'store'])->name('becas.store');
Route::get('/{beca}', [BecaController::class, 'show'])->name('becas.show');
Route::get('/{beca}/edit', [BecaController::class, 'edit'])->name('becas.edit');
Route::patch('/{beca}', [BecaController::class, 'update'])->name('becas.show');
Route::delete('/{beca}', [BecaController::class, 'destroy'])->name('welcome');

Route::post('/tips', [CommentController::class, 'store'])->name('tips');
Route::get('/tips', [CommentController::class, 'index'])->name('tips');
Route::get('/dashboard', [BecaController::class, 'listado'])->name('dashboard');

Route::resource('/user/favs', FavoritoController::class);

Route::post('/dashboard/filtrar', [BecaController::class, 'filtrar'])->name('dashboard.filtrar');
Route::get('/dashboard/reset', [BecaController::class, 'reset'])->name('dashboard.reset');