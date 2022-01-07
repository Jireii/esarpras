<?php

use App\Models\Space;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\NoticeController;

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

// Sarpras
Route::get('/sarpras', [AssetController::class, 'index'])->name('aset');
Route::get('/sarpras/create', [AssetController::class, 'create'])->name('asset.create');
route::post('/sarpras/store', [AssetController::class, 'store'])->name('asset.store');

// Ruangan
Route::get('/ruangan', [SpaceController::class, 'index'])->name('space');
Route::post('/ruangan/create', [SpaceController::class, 'store'])->name('space.store');
Route::post('/ruangan/{space:id}/edit', [SpaceController::class, 'edit'])->name('space.edit');
Route::delete('/ruangan/{space:id}/delete', [SpaceController::class, 'destroy'])->name('space.destroy');

// Pemberitahuan
Route::get('/pemberitahuan', [NoticeController::class, 'index'])->name('notice');
Route::post('/pemberitahuan/create', [NoticeController::class, 'store'])->name('notice.store');
Route::post('/pemberitahuan/{notice:id}/edit', [NoticeController::class, 'edit'])->name('notice.edit');
Route::delete('/pemberitahuan/{notice:id}/delete', [NoticeController::class, 'destroy'])->name('notice.destroy');
