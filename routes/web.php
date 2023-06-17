<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PromptController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/ai-news/{slug}', [PostController::class, 'index']);
Route::get('/ai-news/category/{slug}', [PostController::class, 'searchByCategory']);
Route::post('/ai-news/category/{slug}/load-more', [PostController::class, 'loadMorePostsByCategory']);
Route::get('/midjourney/category/{slug}', [PromptController::class, 'searchByCategory']);
Route::post('/midjourney/category/{slug}/load-more', [PromptController::class, 'loadMorePromptsByCategory']);
Route::get('/midjourney/', [PromptController::class, 'index']);
Route::post('/midjourney/load-more', [PromptController::class, 'loadMorePrompts']);

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
    Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
    Route::get('/auth/facebook', [LoginController::class, 'redirectToFacebook'])->name('facebook.login');
    Route::get('/auth/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
});
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
