<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
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


Route::get('/login', [LoginController::class, 'loginView']);
Route::post('/login', [LoginController::class, 'logIn']);
Route::group(['middleware'=>'loginAuth'], function(){
    Route::get('/', function () {return view('dapanel');});
    Route::get('/addUser', [UserController::class, 'addUser']);
    Route::get('/listUsers', [UserController::class, 'listUsers']);
    Route::post('/addUser', [UserController::class, 'createUser']);
});
