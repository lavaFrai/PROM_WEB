<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
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


Route::get('/book/all', [BookController::class, 'all']);
Route::get('/book/delete/{id}', [BookController::class, 'delete']);
Route::get('/book/change_availabilty/{id}', [BookController::class, 'changeAvailabilty']);
Route::any('/book/add', [BookController::class, 'add']);