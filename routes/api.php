<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PelangganController;
use App\Http\Controllers\API\MobilController;
use App\Http\Controllers\API\SewaController;
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
// pelanggan
route::get('v1/customer', [PelangganController::class, 'index'])->middleware('auth:api');
route::post('v1/customer', [PelangganController::class, 'add'])->middleware('auth:api');
route::delete('v1/customer/{id}', [PelangganController::class, 'destroy'])->middleware('auth:api');
route::patch('v1/customer/{id}', [PelangganController::class, 'update'])->middleware('auth:api');

// mobil
route::get('v1/mobil', [MobilController ::class, 'index']);
route::post('v1/mobil', [MobilController::class, 'add']->middleware('auth:api'));
route::delete('v1/mobil/{id}', [MobilController::class, 'destroy'])->middleware('auth:api');
route::patch('v1/mobil/{id}', [MobilController::class, 'update'])->middleware('auth:api');

// mobil
route::get('v1/sewa', [SewaController::class, 'index']);
route::post('v1/sewa', [SewaController::class, 'add'])->middleware('auth:api');
route::delete('v1/sewa/{id}', [SewaController::class, 'destroy'])->middleware('auth:api');
route::patch('v1/sewa/{id}', [SewaController::class, 'update'])->middleware('auth:api');


Route::group(['middleware'=> 'api', 'prefix' => 'auth'], function ($router){
    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);
    });