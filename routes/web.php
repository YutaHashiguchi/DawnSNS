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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', function () {
  return redirect('login');
});

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name("login");
Route::get('/logout', 'Auth\LoginController@logout')->name("logout");

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top', 'PostsController@index');
Route::post('/create', 'PostsController@create');

Route::get('profile/{id}', 'UsersController@profile');
Route::post('/profile_update', 'UsersController@profileUpdate');

Route::get('/delete/{id}', 'PostsController@delete');
Route::post('/update', 'PostsController@update');

Route::get('/search', 'UsersController@search');
Route::post('/search', 'UsersController@search');

Route::get('/follow-list', 'FollowsController@followList');
Route::get('/follower-list', 'FollowsController@followerList');



Route::post('/follow', 'FollowsController@follow');
Route::post('/unfollow', 'FollowsController@unfollow');
