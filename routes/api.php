<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article');
Route::get('/articles/{notice}/{id}', [ArticleController::class, 'notice'])->name('articles');
Route::get('/last/articles', [ArticleController::class, 'lastArticles'])->name('last.articles');
Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
