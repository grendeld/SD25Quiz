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

Route::get('/', 'ProgramsController@show');

Route::get('/admin', 'AdminsController@show');

Route::get('/admin/add', function(){ return view('newadmin'); });

Route::post('/admin/add', 'AdminsController@create');

Route::get('/program', 'ProgramsController@show');

Route::get('/program/add', function(){ return view('newProgram'); });

Route::post('/program/add', 'ProgramsController@create');

Route::get('/program/{program}', 'ProgramsController@showedit');

Route::patch('/program/{program}/edit', 'ProgramsController@edit');

Route::get('/program/{program}/delete', 'ProgramsController@delete');
Route::post('/module','ModulesController@deleteMod');
Route::get('/program/{program}/module/{module}/edit', 'ModulesController@showEdit');
Route::patch('/{program}/{module}', 'ModulesController@edit');
Route::post('/program/{program}/module/{module}/delete', 'ProgramsController@deleteModule');

Route::post('/program/{program}/newModule', 'ModulesController@NewModule');
Route::get('/student', 'StudentsController@show');
// Route::get('/student/add', 'StudentsController@create');
//Route::post('imageUploadForm', 'StudentsController@upload' );
Route::get('/student/add', function(){ return view('newStudent');});
Route::post('/student/add', 'StudentsController@create');