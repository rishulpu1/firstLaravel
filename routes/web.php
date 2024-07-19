<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\http\Controllers\PostController;

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

//User related routes
Route::get('/',[UserController::class,'showCorrectHomePage'])->name('login');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

//Blog post related routes
Route::get('/create-post',[PostController::class, 'showCreateForm'])->middleware('auth');
Route::get('/post/{post}',[PostController::class, 'viewSinglePost']);
Route::post('/create-post',[PostController::class, 'storeNewPost']);

//Profile  related routes
Route::get('/profile/{user:username}',[UserController::class, 'profile']);