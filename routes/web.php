<?php

use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CreateBlogController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\TestController;
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

Route::get('/Contacts', [ContactsController::class, 'index']);
Route::post('/Contacts/send', [ContactsController::class, 'send']);

Route::get('/Test', [TestController::class, 'index']);
Route::post('/Test/send', [TestController::class, 'send']);

Route::get('/Blog', [BlogController::class, 'index']);
Route::get('/Blog/detailedPost/{id}', [BlogController::class, 'detailedBlog']);

Route::get('/Education', [EducationController::class, 'index']);

if (isset($_SESSION['user'])) {
    Route::get('/User/logout', [UserController::class, 'logout']);

    Route::get('/CreateBlog/create', [CreateBlogController::class, 'createView']);
    Route::post('/CreateBlog/create', [CreateBlogController::class, 'create']);

    Route::post('/Comment/sendComment', [CommentController::class, 'sendComment']);

    Route::get('/CreateBlog/editPost/{id}', [CreateBlogController::class, 'editPost']);
    Route::post('/CreateBlog/edit', [CreateBlogController::class, 'edit']);

    Route::get('/Blog/delete/{id}', [BlogController::class, 'delete']);
} else {
    Route::get('/User/login', [UserController::class, 'loginView']);
    Route::post('/User/login', [UserController::class, 'login']);

    Route::get('/User/registration', [UserController::class, 'registrationView']);
    Route::post('/User/registration', [UserController::class, 'registrate']);
}
