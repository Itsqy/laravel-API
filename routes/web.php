<?php

use App\Http\Controllers\WEB\DoaController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DoaController::class, 'doa'])->name('doa');
Route::get('/login', [DoaController::class, 'login'])->name('login');
Route::get('/apionline', [DoaController::class, 'apionline'])->name('apionline');
Route::get('/post-data', [DoaController::class, 'postdata'])->name('post');
Route::get('/kategori', [DoaController::class, 'kategori'])->name('kategori');
Route::get('/edit/{user_id}', [DoaController::class, 'edit'])->name('edit');
Route::post('posting', [DoaController::class, 'posting'])->name('posting');
Route::post('add-kategori', [DoaController::class, 'addkategori'])->name('add');
Route::post('loginposting', [DoaController::class, 'loginposting'])->name('logpost');
Route::put('editposting/{user_id}', [DoaController::class, 'editposting'])->name('editpost');
