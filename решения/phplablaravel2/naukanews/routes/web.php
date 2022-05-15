<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::get('/', [IndexController::class,'welcome'])
    ->middleware('guest')
    ->name('WelcomePage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/main', [IndexController::class, 'index'])
    ->middleware('auth')
    ->name('MainPage');

Route::get('/rubric/{id}', [IndexController::class, 'rubrika'])
    ->middleware('auth')
    ->name('RubricsPage');

Route::get('/article/{id}', [IndexController::class, 'statya'])
    ->middleware('auth')
    ->name('ArticlePage');

Route::delete('/article/delete/{article}', [IndexController::class, 'delete_article'])
    ->middleware('auth')
    ->name('ArticleDelete');

Route::get('/add-article', [IndexController::class, 'add_article'])
    ->middleware('auth')
    ->name('ArticleAdd');

Route::post('/add-article',[IndexController::class,'add_article_post'])
    ->middleware('auth')
    ->name('ArticleAddPost');
