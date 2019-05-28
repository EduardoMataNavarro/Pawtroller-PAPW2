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

/*
    User
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/sign', 'Auth\LoginController@showLogin')->name('sign');

Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::post('/uploadphoto', 'userController@uploadPhoto')->name('uploadphoto');

Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/profile/{id}','userController@show')->name('profile');

Route::get('/logout','userController@logOut')->name('logout');

/*
    Pets
*/

Route::get('/pet/{id}','petController@show')->name('pet');

Route::post('/registerpet','petController@create')->name('registerpet');

Route::post('/uploadpetmedia','petController@uploadMedia')->name('uploadpetmedia');

Route::post('/editpet','petController@edit')->name('editpet');

Route::post('/changepetstatus','petController@changePetStatus')->name('changepetstatus');

Route::get('/lostpets','petController@showLostPets')->name('lostpets');

/* 
    Posts
*/
Route::get('/forum','postController@showPosts')->name('forum');

Route::get('/forum/category/{name}','postController@showPostsByCategory')->name('showpostbycat');

Route::get('/post/{id}','postController@showPost')->name('showpost');

Route::post('/createpost','postController@create')->name('createpost');

Route::post('/deletepost','postController@delete')->name('deletepost');

Route::post('/ratepost','postController@rate')->name('ratepost');

Route::get('/post/info/{id}','postController@getPostInfo')->name('getPostInfo');

Route::post('/editpost','postController@edit')->name('editpost');

/*
    Comments
*/
Route::post('/createcomment','commentController@create')->name('createcomment');
Route::post('/deletecomment','commentController@delete')->name('deletecomment');
Route::post('/ratecomment','commentController@rate')->name('ratecomment');

/*
    Perdido
*/
Route::post('/registerperdido','perdidoController@create')->name('registrarperdido');
