<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route User
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/store', [UserController::class, 'store']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::post('/users/{id}', [UserController::class, 'update']);
Route::get('/users/{id}/delete', [UserController::class, 'destroy']);

//Route Category
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::post('/category/{id}', [CategoryController::class, 'update']);
Route::get('/category/{id}/delete', [CategoryController::class, 'destroy']);

//Route Category
Route::get('/article', [ArticleController::class, 'index']);
Route::get('/article/create', [ArticleController::class, 'create']);
Route::post('/article/store', [ArticleController::class, 'store']);
Route::get('/article/{id}/edit', [ArticleController::class, 'edit']);
Route::post('/article/{id}', [ArticleController::class, 'update']);
Route::get('/article/{id}/delete', [ArticleController::class, 'destroy']);
