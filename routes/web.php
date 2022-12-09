<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('blog', 'BlogController');
Route::get('index', [App\Http\Controllers\BlogController::class, 'index'])->name('index');
Route::any('create', [App\Http\Controllers\BlogController::class, 'create'])->name('create');
Route::any('store', [App\Http\Controllers\BlogController::class, 'store'])->name('store');
Route::any('edit/{id}', [App\Http\Controllers\BlogController::class, 'edit'])->name('edit');
Route::any('update/{id}', [App\Http\Controllers\BlogController::class, 'update'])->name('update');
Route::any('destroy/{id}', [App\Http\Controllers\BlogController::class, 'destroy'])->name('destroy');

