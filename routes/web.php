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

Route::resource('metrics', 'MetricController');
Route::resource('data_points', 'DataPointController');
Route::get('data_point/table', 'DataPointController@dataPointTable');
Route::get('data_point/chart', 'DataPointController@dataPointChart');
