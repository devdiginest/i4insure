<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//fullcalender
Route::get('/fullcalendar','CalenderController@index')->name('calender.index');
Route::post('/fullcalendar/create','CalenderController@create');
Route::post('/fullcalendar/update','CalenderController@update');
Route::post('/fullcalendar/delete','CalenderController@destroy');

Route::get('/customers','CustomerController@index')->name('customer.index');
