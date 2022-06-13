<?php

use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/AboutMe', [AboutMeController::class, 'index']);

Route::get('/Gallery', [GalleryController::class, 'index']);

Route::get('/Interests', [InterestsController::class, 'index']);

Route::get('/Blog', [BlogController::class, 'index']);

Route::get('/Blog/createPost', [BlogController::class, 'addPostView']);

if (isset($_SESSION['user'])) {
    Route::get('/User/logout', [UserController::class, 'logout']);
} else {
    Route::get('/User/login', [UserController::class, 'loginView']);
    Route::post('/User/login', [UserController::class, 'login']);

    Route::get('/User/registration', [UserController::class, 'registrationView']);
    Route::post('/User/registration', [UserController::class, 'registrate']);
}
