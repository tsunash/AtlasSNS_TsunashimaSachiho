<?php

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
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::group(['middleware' => 'auth'],function(){

Route::get('/top','PostsController@index');
Route::post('/post','PostsController@postCreate');
Route::post('/edit','PostsController@edit');
Route::get('/delete/{id}','PostsController@delete');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');
Route::post('/search','UsersController@search');

Route::post('/follow','FollowsController@follow');
Route::post('/remove','FollowsController@remove');

Route::get('/follow-list','FollowsController@followList');
Route::get('/follower-list','FollowsController@followerList');

route::get('/logout','UsersController@logout');

});
