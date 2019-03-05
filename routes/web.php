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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminpanel', 'HomeController@adminpanel')->name('adminpanel');

Route::get('/configuration/{search?}', 'UserController@config')->name('config');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::post('/user/updateotro', 'UserController@updateotro')->name('user.updateotro');
Route::get('/user/send/{search?}', 'UserController@send')->name('user.send');
Route::get('/user/messages/{id}', 'UserController@messages')->name('user.messages');
Route::get('/perfil/{id}', 'UserController@profile')->name('profile');
Route::get('/messages/recived/{id}', 'UserController@recived')->name('user.recived');
Route::get('/activos/{search?}/{select?}/{order?}', 'UserController@listarusuarios')->name('listarusuarios');
Route::get('/inactivos/{search?}/{select?}/{order?}', 'UserController@listarusuariosinactivos')->name('listarusuariosinactivos');
Route::get('/user/delete/{id}', 'UserController@user_delete')->name('user_delete');

Route::post('/messages/save', 'MensajesController@save')->name('messages.save');
Route::get('/messages/delete/{id_mensaje}', 'MensajesController@delete')->name('message.delete');
Route::get('/messages/{id}', 'MensajesController@leido');
Route::get('/reenviar/{id}', 'MensajesController@reenviarmensaje')->name("reenviar.mensaje");


//generar pdf
Route::get('/user/descargar-users/{activo}', 'UserController@pdf')->name('users.pdf');
//generar pdf logs
Route::get('/user/descargar-logs', 'UserController@pdf_logs')->name('users.pdf_logs');
//generar pdf ckeditor
Route::get('/user/descargar-curriculum/{id}', 'UserController@pdf_ckedit')->name('users.pdf_ckedit');

//logs
Route::get('/adminpanel/logs', 'UserController@verlogs')->name('user.logs');


//curriculum
Route::get('/user/curriculum/{id}', 'CkeditorController@curriculum')->name('ckeditor');
Route::post('/user/curriculum/save', 'CkeditorController@save')->name('ck.save');
Route::get('/user/curriculum/ckContent/{id}', 'CkeditorController@getContenido')->name('ck.contenido');
Route::post('/user/curriculum/update', 'CkeditorController@update')->name('ck.update');


//ver usuarios eliminados
Route::get('/adminpanel/eliminados', 'UserController@ver_usuarios_eliminados')->name('ver_usuarios_eliminados');
