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

Route::get('/', function () {
    return view('pages.landing');
});

Route::get('login', function(){
    return view('pages.login-signup');
});

Route::get('/profile', function(){
    return view('pages.profile');
});

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
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
