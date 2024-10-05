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

Route::view('/', 'step1')->name('step1');
Route::view('/step2', 'step2')->name('step2');
Route::get ('/step3', 'IsTestController@step3')->name('step3');
Route::view('/step4', 'step4')->name('step4');
Route::view('/step5', 'step5')->name('step5');
Route::view('/step6', 'step6')->name('step6');
Route::get('/result', 'IsTestController@result')->name('result');
Route::get('/export', 'IsTestController@export')->name('export');
Route::get('/test','IsTestController@step4s')->name('test');
Route::get('/test2','IsTestController@step5')->name('test2');
