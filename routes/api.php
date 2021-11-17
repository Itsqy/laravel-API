<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RestoranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'daftar']);
Route::post('/login', [AuthController::class, 'login']);
Route::put('/edit/{user_id}', [AuthController::class, 'editprofile']);

// CRUD Resto beserta menunya
Route::post('/add/resto-dan-menu', [RestoranController::class, 'createRestoMenu']);
Route::get('/resto/{id}', [RestoranController::class, 'getRestoMenu']);

//get smeua menu
Route::get('/menu', [RestoranController::class, 'getAllmenu']);

//edit password

Route::put('/update-pass/{user_id}', [AuthController::class, 'updatePass'])->name('update-pass');
