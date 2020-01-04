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

Route::get('/list', 'ListController@homePage');
Route::post('/addItem', 'ListController@addNewItem');
Route::post('/deleteItem', 'ListController@deletItem');
Route::post('/editItem', 'ListController@editItem');
Route::get('/searchItem', 'ListController@searchItem');
