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

use App\Models\todo;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', array('uses' => 'HomeController@postIndex'));

Route::get('/home/new', array('as' => 'new', 'uses' => 'HomeController@getNew'));
Route::post('/home/new', array('uses' => 'HomeController@postNew'));

Route::get('/home/delete/{task}', array('as' => 'delete', 'uses' => 'HomeController@getDelete'));

Route::get('/home/edit/{task}', array('as' => 'edit', 'uses' =>'HomeController@getEdit'));
Route::post('/home/save/{task}', array('as' => 'save', 'uses' => 'HomeController@save'));

Route::bind('task', function($value, $route) {
    return todo::where('id', $value)->first();
});

