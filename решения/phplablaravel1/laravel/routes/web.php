<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/show',[IndexController::class, 'show'])->name('resumes');

Route::delete('/show/delete/{person}',[IndexController::class,'delete_resume'])->name('resumeDelete');

Route::get('/resume/{id}',[IndexController::class, 'index'])->name('resumeShow');

Route::get('/resume',[IndexController::class, 'izb'])->name('resumeShowMy');

Route::get('/add-content',[IndexController::class, 'create'])->name('add-content');

Route::post('/add-content',[IndexController::class, 'store'])->name('resumeStore');

Route::get('/first',[IndexController::class,'first'])->name('first');

Route::get('/second',[IndexController::class,'second'])->name('second');

Route::get('/third',[IndexController::class,'third'])->name('third');

Route::get('/fourth',[IndexController::class,'fourth'])->name('fourth');

Route::get('/resumeage',[IndexController::class,'resumeage'])->name('resumeAge');

Route::get('/resumestaff',[IndexController::class,'resumestaff'])->name('resumeStaff');
