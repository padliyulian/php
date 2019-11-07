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

Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/exim', 'PagesController@exim')->name('pages.exim');
Route::get('/export', 'PagesController@exportEmployee')->name('export.employee');
Route::post('/import', 'PagesController@importEmployee')->name('import.employee');
Route::get('/print', 'PagesController@printEmployee')->name('print.employee');

Route::resource('employee', 'EmployeeController');
Route::resource('position', 'PositionController');
Route::resource('project', 'ProjectController');

Route::get('/search/employee', 'SearchController@employee')->name('search.employee');

// Route::get('/employee', 'EmployeeController@index');
// Route::get('/employee/create', 'EmployeeController@create');
// Route::get('/employee/{employee}', 'EmployeeController@show');

// Route::post('/employee', 'EmployeeController@store');
// Route::delete('/employee/{employee}', 'EmployeeController@destroy');
// Route::get('/employee/{employee}/edit', 'EmployeeController@edit');
// Route::patch('/employee/{employee}', 'EmployeeController@update');