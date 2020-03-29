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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Routes for Profiles 
Route::get('/profiles' , 'ProfilesController@index')->name('profiles');
Route::get('/profile/create' , 'ProfilesController@create')->name('profiles.create');
Route::post('/profile/new' , 'ProfilesController@store')->name('new.profile');



// Routes for Notes 
Route::get('/notes' , 'NotesController@index')->name('notes');
Route::get('/note/create' , 'NotesController@create')->name('notes.create');
Route::post('/note/new' , 'NotesController@store')->name('new.note');
Route::post('note/update/{id}' , 'NotesController@update')->name('note.update');
Route::get('/notes/delete/{id}' , 'NotesController@destroy')->name('notes.delete');
