<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login',[AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login',[AuthController::class, 'processLogin'])->middleware('guest');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/home-user',function(){
    return 'Logged in as user';
})->middleware('auth:web');

Route::get('/home-teacher',function(){
    return 'Logged in as teacher';
})->middleware('auth:teacher');

Route::get('/home',function(){
    return 'page for all';
})->middleware('auth');
