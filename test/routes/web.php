<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController};
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

Route::get('/', [UserController::class, 'index'])
    ->name('index');

Route::post('home/{id}/edit', [UserController::class, 'edit'])
    ->name('home.edit');

Route::patch('/home/{id}', [UserController::class, 'update'])
    ->name('home.update');

Route::delete('home/{id}', [UserController::class, 'destroy'])
    ->name('home.destroy');
//Route::get('articles', [ArticleController::class, 'index'])
//    ->name('articles.index');

//Route::get('articles/{id}', [ArticleController::class, 'show'])
//    ->name('articles.show');

// BEGIN (write your solution here)
//Route::get('articles/create', 'ArticleCategoryController@store')
//    ->name('articles.store');
// END

//Route::get('article_categories', [ArticleCategoryController::class, 'index'])
//    ->name('article_categories.index');
//
//Route::get('article_categories/{id}', [ArticleCategoryController::class, 'show'])
//    ->name('article_categories.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
