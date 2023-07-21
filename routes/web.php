<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MidjourneyController;
use App\Http\Controllers\PromptController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;



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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/midjourney/', [MidjourneyController::class, 'index']);
Route::get('/midjourney/category/{slug}', [PromptController::class, 'searchByCategory']);
Route::get('/midjourney/prompt', [PromptController::class, 'index']);
Route::get('/midjourney/posts', [MidjourneyController::class, 'posts']);
Route::post('/midjourney/category/{slug}/load-more', [PromptController::class, 'loadMorePromptsByCategory']);
Route::post('/midjourney/prompt/load-more', [PromptController::class, 'loadMorePrompts']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{slug}.html', [PostController::class, 'index']);
Route::get('/archive/{slug}', [PostController::class, 'searchByMonth']);
Route::post('/archive/{slug}/load-more', [PostController::class, 'loadMorePostsByMonth']);
Route::get('/tag/{slug}', [PostController::class, 'searchByTag']);
Route::post('/tag/{slug}/load-more', [PostController::class, 'loadMorePostsByTag']);
Route::get('/{slug}', [PostController::class, 'searchByCategory'])->where('slug', '^((?!\.+).)*$');
Route::post('/{slug}/load-more', [PostController::class, 'loadMorePostsByCategory']);


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
});
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


