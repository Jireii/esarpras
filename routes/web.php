<?php

use App\Http\Controllers\BookController;
use App\Models\Space;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// Sarpras
Route::get('/sarpras', [AssetController::class, 'index'])->name('asset');
Route::get('/sarpras/create', [AssetController::class, 'add'])->name('asset.add');
route::post('/sarpras/store', [AssetController::class, 'store'])->name('asset.store');
Route::get('/sarpras/{asset:id}/detail', [AssetController::class, 'detail'])->name('asset.detail');
Route::get('/sarpras/{asset:id}/edit', [AssetController::class, 'edit'])->name('asset.edit');
Route::put('/sarpras/{asset:id}/update', [AssetController::class, 'update'])->name('asset.update');
Route::delete('/sarpras/{asset:id}/delete', [AssetController::class, 'destroy'])->name('asset.destroy');

// Ruangan
Route::get('/ruangan', [SpaceController::class, 'index'])->name('space');
Route::post('/ruangan/create', [SpaceController::class, 'store'])->name('space.store');
Route::post('/ruangan/{space:id}/edit', [SpaceController::class, 'edit'])->name('space.edit');
Route::delete('/ruangan/{space:id}/delete', [SpaceController::class, 'destroy'])->name('space.destroy');

// Buku
Route::get('/buku', [BookController::class, 'index'])->name('book');
Route::get('/buku//create', [BookController::class, 'add'])->name('book.add');
Route::post('/buku//create', [BookController::class, 'store'])->name('book.store');
Route::get('/buku/{book:id}/detail', [BookController::class, 'detail'])->name('book.detail');
Route::get('/buku/{book:id}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::put('/buku/{book:id}/edit', [BookController::class, 'update'])->name('book.update');
Route::delete('/buku/{book:id}/delete', [BookController::class, 'destroy'])->name('book.destroy');

// Pemberitahuan
Route::get('/pemberitahuan', [NoticeController::class, 'index'])->name('notice');
Route::post('/pemberitahuan/create', [NoticeController::class, 'store'])->name('notice.store');
Route::post('/pemberitahuan/{notice:id}/edit', [NoticeController::class, 'edit'])->name('notice.edit');
Route::delete('/pemberitahuan/{notice:id}/delete', [NoticeController::class, 'destroy'])->name('notice.destroy');

// Profile
Route::get('/profil', [UserController::class, 'index'])->name('profile');
Route::get('/profil/{user:id}/edit', [AuthController::class, 'edit'])->name('profile.edit');
Route::put('/profil/{user:id}/edit', [AuthController::class, 'update'])->name('profile.update');

// Login
Route::get('/login', [AuthController::class, 'getLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User
Route::get('/pengguna', [UserController::class, 'userlist'])->name('user.list');
Route::get('/pengguna/{user:id}', [UserController::class, 'details'])->name('user.detail');
Route::get('/pengguna/{user:id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/pengguna/{user:id}/edit', [UserController::class, 'update'])->name('user.patch');
Route::delete('/pengguna/{user:id}/delete', [UserController::class, 'destroy'])->name('user.delete');
Route::get('/register', [AuthController::class, 'getRegister'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.store');

Route::get('/riwayatpengguna', [AuthController::class, 'loghistory'])->name('loghistory');
