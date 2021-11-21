<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\DoaController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RestoranController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'registrasi']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginposting', [DoaController::class, 'loginposting'])->name('loginposting');
Route::put('/edit/{user_id}', [AuthController::class, 'editprofile']);
Route::get('/user/{user_id}', [AuthController::class, 'getUser']);
// CRUD Resto beserta menunya
Route::post('/add/resto-dan-menu', [RestoranController::class, 'createRestoMenu']);
Route::put('/update/resto-dan-menu/{resto_id}', [RestoranController::class, 'editRestoMenu']);
Route::get('/resto/{id}', [RestoranController::class, 'getRestoMenu']);
Route::get('/search', [RestoranController::class, 'searchmenu']);
//update resto aja
Route::put('/update/{id}', [RestoranController::class, 'editResto']);

//get smeua menu
Route::get('/menu', [RestoranController::class, 'getAllmenu']);

//delete menu
Route::delete('/del/{resto_id}/{menu_id}', [RestoranController::class, 'delRestoMenu']);

//tambah menu berdasarkan  resto ID
Route::post('/add/menu/{resto_id}', [RestoranController::class, 'createMenu']);
Route::put('/update/menu/{resto_id}/{menu_id}', [RestoranController::class, 'editMenu']);
//edit password

Route::put('/update-pass/{user_id}', [AuthController::class, 'changePassword'])->name('update-pass');
