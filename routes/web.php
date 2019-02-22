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
Route::get('/',function(){
    return view('index');
})->name('index');

Route::get('/contacto',function(){
    return view('contact');
})->name('contact');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/configuration', 'UserController@config')->name('config');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/send/{search?}', 'UserController@send')->name('user.send');
Route::get('/user/messages/{id}', 'UserController@messages')->name('user.messages');
Route::get('/perfil/{id}', 'UserController@profile')->name('profile');
Route::get('/messages/recived/{id}', 'UserController@recived')->name('user.recived');


Route::post('/messages/save', 'MensajesController@save')->name('messages.save');
Route::get('/messages/delete/{id_mensaje}', 'MensajesController@delete')->name('message.delete');
Route::get('/messages/{id}', 'MensajesController@leido');