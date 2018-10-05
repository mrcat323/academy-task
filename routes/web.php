<?php

Route::get('/', 'MainController@index');

Route::get('/students/list', 'StudentsController@index');

Route::get('/students/show/{id}', 'StudentsController@show');

Route::get('/students/edit/{id}', 'StudentsController@edit');

Route::get('/students/create', 'StudentsController@create');

Route::post('/students/delete', 'StudentsController@destroy')->name('student.delete');

Route::post('/students/edit/push', 'StudentsController@update')->name('student.update');

Route::post('/students/store', 'StudentsController@store')->name('student.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// tags
Route::get('/courses/list', 'CoursesController@index');
Route::get('/courses/view/{id}', 'CoursesController@show');
Route::get('/courses/edit/{id}', 'CoursesController@edit');
Route::get('/courses/create', 'CoursesController@create');
Route::post('/courses/store', 'CoursesController@store');
Route::post('/courses/edit/push', 'CoursesController@update');
Route::post('/courses/delete', 'CoursesController@destroy');
