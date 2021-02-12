<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/login', 'WebController@login')->name('login');
Route::get('/register', 'WebController@register')->name('register');
Route::get('/', 'WebController@homepage')->name('homepage');
Route::get('/article/{id}', 'WebController@article')->name('article');
Route::get('/category/{id}', 'WebController@category')->name('category');
Route::get('/about-us', 'WebController@aboutus')->name('aboutus');

Route::get('/user', 'AdminController@user')->name('adminuser')->middleware('admin');
Route::get('/user/{id}/posts', 'AdminController@userpost')->name('adminuserpost')->middleware('admin');
Route::get('/user/{uid}/posts/{pid}/delete', 'AdminController@userpostdelete')->name('adminuserpostdelete')->middleware('admin');
Route::get('/user/{id}/delete', 'AdminController@userdelete')->name('adminuserdelete')->middleware('admin');

Route::get('/profile', 'UserController@profile_get')->name('userprofile')->middleware('user');
Route::post('/profile', 'UserController@profile_post')->name('userprofilepost')->middleware('user');
Route::get('/blog', 'UserController@blog')->name('userblog')->middleware('user');
Route::get('/blog/{id}/delete', 'UserController@delete')->name('userblogdelete')->middleware('user');
Route::get('/blog/create', 'UserController@blogcreate')->name('userblogcreate')->middleware('user');
Route::post('/blog/create/post', 'UserController@blogcreatepost')->name('userblogcreatepost');
