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

// Tin tức
Route::group(['prefix' => 'tin-tuc', 'namespace' => 'Frontend\Post'], function() {
    Route::get('/', ['as' => 'post', 'uses' => 'PostController@getIndex']);
    Route::get('/danh-muc/{id}-{slug}', ['as' => 'post.category', 'uses' => 'PostCategoryController@getIndex']);
    Route::get('/{id}-{slug}', ['as' => 'post.detail', 'uses' => 'PostDetailController@getDetail']);
});

// Pages
Route::get('/page/{slug}', ['as' => 'page.detail', 'uses' => 'Frontend\Page\PageController@getDetail']);

// Chuyến xe
Route::group(['prefix' => 'trip', 'namespace' => 'Frontend\Trip'], function() {
    Route::get('/tim-kiem', ['as' => 'trip.filter', 'uses' => 'TripFilterController@getIndex']);
    Route::get('/chuyen-xe-tu-{slug}/{id}', ['as' => 'trip.detail', 'uses' => 'TripDetailController@getDetail'])->where(['startPlace' => '[a-z]+', 'endPlace' => '[a-z]+']);
    Route::get('/chon-cho.html', ['as' => 'trip.choncho', 'uses' => 'TripChoiceSeatController@getDetail']);
});

// Order
Route::post('/order', ['as' => 'order.submit', 'uses' => 'Frontend\TripOrders\TripOrderController@postOrder']);
Route::get('/order/payment/{id}', ['as' => 'order.payment', 'uses' => 'Frontend\TripOrders\TripOrderPaymentController@getPayment']);

// Test
Route::get('/test', 'TestController@index');
Route::get('/test/payment', 'TestController@payment');
Route::get('/test/payment/return-url', 'TestController@paymentReturnUrl');
// Route::get('/test/mail', 'TestController@mail');
// Route::get('/test/mail/raw', 'TestController@mailRaw');

// Check order info
Route::get('/check-order-info', ['as' => 'checkOrderInfo.index', 'uses' => 'Frontend\CheckOrderInfo\CheckOrderInfoController@getIndex']);
Route::post('/check-order-info', 'Frontend\CheckOrderInfo\CheckOrderInfoController@postIndex');