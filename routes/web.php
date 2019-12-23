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

Auth::routes(['verify' => true]);

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/exim', 'PagesController@exim')->name('pages.exim');
Route::get('/export', 'PagesController@exportEmployee')->name('export.employee');
Route::post('/import', 'PagesController@importEmployee')->name('import.employee');
Route::get('/print', 'PagesController@printEmployee')->name('print.employee');

Route::resource('employee', 'EmployeeController');
Route::resource('position', 'PositionController');
Route::resource('project', 'ProjectController');
Route::get('/pages/client', 'PagesController@client')->name('pages.client');
Route::get('/pages/meeting', 'PagesController@meeting')->name('pages.meeting');

Route::get('/search/employee', 'SearchController@employee')->name('search.employee');