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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::resource('student', 'StudentController');

Route::get('/user/{id}', 'UserController@show');
Route::patch('/user/{id}', 'UserController@update');
Route::post('/user-change-password/{id}', 'UserController@changePassword');

Route::get('/home', 'HomeController@index');
Route::get('/home/kabupaten/{id}', 'AjaxController@kabupaten');

//For Login Sosmed
Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
Route::get('/callback/{provider}', 'SocialAuthController@callback');


Route::group(['middleware' => ['auth', 'role:admin']], function () {
	Route::resource('soal', 'SoalController');
	Route::resource('student', 'StudentController');
	Route::get('/user', 'UserController@index');
	Route::get('/anak', 'AnakController@index');
});


Route::group(['middleware' => ['auth', 'role:pengurus']], function () {
	Route::get('/anak/create', 'AnakController@create');
	Route::post('/anak', 'AnakController@store');
	Route::delete('/anak/{id}', 'AnakController@destroy');
	Route::get('/anak/{id}', 'AnakController@show');
	Route::get('/anak-list-pengurus', 'AnakController@indexPengurus');
	Route::get('/list-anak', 'AnakController@listAnak');
	Route::get('/anak/foto-keterangan-anak/{id}', 'AnakController@fotoKeterangan');
	Route::get('/anak/foto-keterangan/create/{id}', 'AnakController@createFotoKeterangan');
	Route::post('/foto_keterangan', 'AnakController@storeFotoKeteranganAnak');
});
