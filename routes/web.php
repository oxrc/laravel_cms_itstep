<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// This is just a comment.

Route::get('/', function () {
    return view('public.welcome');
})->name('homepage');

Route::resource('admin/tags', 'TagController')->middleware('auth');
Route::resource('admin/static-pages', 'StaticPageController')->middleware('auth');
Route::resource('admin/youtube-pages', 'YoutubePageController')->names([
    'index' => 'admin_youtube_pages',
    ])->middleware('auth');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('{path}', 'CustomPathController@loadPath')->where('path', '.*');
