<?php

//use App\Http\Middleware\AddHeaders;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FilmController, UserController};

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

//Route::get('/', [UserController::class, 'index'])
//    ->name('index');
Route::get('/', function () {
    return redirect('/home');
});

Route::post('home/{id}/edit', [UserController::class, 'edit'])
    ->name('home.edit');

Route::patch('/home/{id}', [UserController::class, 'update'])
    ->name('home.update');

Route::delete('home/{id}', [UserController::class, 'destroy'])
    ->name('home.destroy');

Route::get('home/user/{id}', [UserController::class, 'show'])->middleware('myHeader')
    ->name('home.show');



Route::get('/movie', [FilmController::class, 'index'])
    ->name('movie.index');

Route::get('/movie/{id}',[FilmController::class, 'add'])
    ->name('movie.add');

Route::get('/favorites',[FilmController::class, 'showFavorites'])
    ->name('favorites');

Route::get('/noFavorites',[FilmController::class, 'showNoFavorites'])
    ->name('noFavorites');

Route::delete('favorites/{id}', [FilmController::class, 'destroy'])
    ->name('favorites.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('index');
