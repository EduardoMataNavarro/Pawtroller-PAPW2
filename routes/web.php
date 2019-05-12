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

Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/profile/{id}','userController@show')->name('profile');

Route::get('/logout','userController@logOut')->name('logout');

/*
    Pets
*/

Route::get('/pet/{id}','petController@show')->name('pet');

Route::post('/registerpet','petController@create')->name('registerpet');

Route::post('/editpet','petController@edit')->name('editpet');

Route::get('/lostpets','petController@showLostPets')->name('lostpets');

/* 
    Posts
*/
Route::get('/posts','postController@showPosts')->name('posts');

Route::get('/post/{id}','postController@showPost')->name('showpost');

Route::post('/createpost','postController@create')->name('createpost');

Route::post('/deletepost','postController@delete')->name('deletepost');

/*
    Comments
*/
Route::post('/createcomment','commentController@create')->name('createcomment');
Route::post('/deletecomment','commentController@delete')->name('deletecomment');

/*
    Perdido
*/
Route::post('/registerperdido','perdidoController@create')->name('registrarperdido');


/*
Route::get('/forum', function(){
    return view('pages.forum');
});

Route::get('/post', function(){
    return view('pages.post');
});

Route::get('/lostPets', function(){
    return view('pages.lostFriends');
});

Route::get('/pet', function(){
    return view('pages.pet');
});*/
