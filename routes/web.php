<?php

use App\Http\Controllers\CommentController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/ai-news/{slug}', [PostController::class, 'index']);
Route::get('/ai-news/category/{slug}', [PostController::class, 'searchByCategory']);
Route::post('/ai-news/category/{slug}/load-more', [PostController::class ,'loadMorePostsByCategory']);
Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
