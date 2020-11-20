<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\PagesController@index');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
//  Route::get('/user', 'App\Http\Controllers\UserController@index');
//  Route::get('/user', 'App\Http\Controllers\PagesController@user');

Route::resource('posts', 'App\Http\Controllers\PostsController');
Route::resource('user', 'App\Http\Controllers\UserController');

Auth::routes();
 
//  Route::get('/admin', 'App\Http\Controllers\Auth\LoginController@admin')->name('admin');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/admin', [App\Http\Controllers\Auth\LoginController::class, 'admin'])->name('admin'); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\PostsController::class, 'search'])->name('search');


