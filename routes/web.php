<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceController;
use App\Models\Space;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ruangan
Route::get('/ruangan', [SpaceController::class, 'index'])->name('space');
Route::post('/ruangan/create', [SpaceController::class, 'store'])->name('space.store');
Route::post('/ruangan/{space:id}/edit', [SpaceController::class, 'edit'])->name('space.edit');
Route::delete('/ruangan/{space:id}/delete', [SpaceController::class, 'destroy'])->name('space.destroy');
