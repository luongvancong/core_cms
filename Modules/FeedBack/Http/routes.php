<?php

Route::group(['middleware' => 'web', 'prefix' => 'feedback', 'namespace' => 'Modules\FeedBack\Http\Controllers'], function()
{
    Route::get('/', 'FeedBackController@index');
});
