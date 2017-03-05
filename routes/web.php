<?php




/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes for admin area
|
*/

require_once dirname(__FILE__) . '/admin_routes.php';



/*
|--------------------------------------------------------------------------
| Authentication Web Routes
|--------------------------------------------------------------------------
*/
require_once dirname(__FILE__) . '/auth_routes.php';

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