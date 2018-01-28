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
    return view('welcome');
});

/* Administracion */
Route::get('users','Usuarios@usersAdmin')->name('usersAdmin');

Route::post('users/add','Usuarios@addUser')->name('addUser');

Route::post('users/delete','Usuarios@deleteUser')->name('deleteUser');

/* Doctores */
Route::get('medicos','Medicos@medicosAdmin')->name('medicsAdmin');

Route::post('medicos/edit','Medicos@addMedico')->name('medicsEdit');
