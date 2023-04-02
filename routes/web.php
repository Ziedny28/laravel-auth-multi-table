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

Route::middleware(['guest'])->group(function(){
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/login',[AuthController::class, 'processLogin']);
});

Route::get('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/home-user',function(){
    return 'Logged in as user';
})->middleware('auth:web');

Route::get('/home-teacher',function(){
    return 'Logged in as teacher';
})->middleware('auth:teacher');

Route::get('/home',function(){
    return 'page for all';
})->middleware('auth');
