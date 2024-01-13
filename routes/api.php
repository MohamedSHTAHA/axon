<?php

use App\Http\Controllers\API\CustomersController;
use App\Http\Controllers\API\PhoneNumbersController;
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


Route::post('login', [UsersController::class, 'login'])->middleware('guest:api');


Route::group([
    // 'middleware' => 'auth:api'
], function () {



    // Route::group(['prefix' => 'phone_numbers'], function () {

    //     Route::get('/', [PhoneNumbersController::class, 'index']);
    //     Route::post('/store', [PhoneNumbersController::class, 'store']);
    // });

    Route::get('/customers', [CustomersController::class, 'index']);

});
