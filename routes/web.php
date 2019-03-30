<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', ['as' => 'index', 'uses' => 'Frontend\Home\HomeController@getIndex']);

// Test
Route::get('/test', 'TestController@index');

Route::get('/test/data-grid', 'TestController@dataGrid');
Route::get('/test/component', 'TestController@testComponent');
Route::post('/test/component', 'TestController@submitComponent');
Route::get('/test/custom-field', 'TestController@getRecordIncludeCustomPostField');
Route::get('/test/auto-login', 'TestController@autoLogin');
Route::get('/test/website', 'TestController@website');