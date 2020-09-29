<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::namespace('Api')->group(function(){

    Route::prefix('auth')->group(function(){

        Route::post('login', 'AuthController@login');
        Route::post('signup', 'AuthController@signup');

    });
    Route::prefix('product')->group(function(){

        Route::get('create', 'ProductController@index');
        Route::post('store', 'ProductController@store');

    });

    Route::group([
        'middleware'=>['auth:api']
    ], function(){


        Route::get('index', 'AuthController@index');
        Route::post('logout', 'AuthController@logout');
        Route::get('test', 'AuthController@test');


    });
    Route::get('blade', function () {
        return view('child');
    });


    // Route::post('webhook', 'WebhookController')->name('webhook');


    /////////////////////////added///////////////////



    Route::group([
        'middleware'=>['auth:api']
    ], function ()
    {

        Route::get('product', [
            'as'    =>    'product.index',
            'uses'     =>    'ProductController@index'
        ]);
        Route::post('product', [
            'as'    =>    'product.store',
            'uses'     =>   'ProductController@store'
        ]);


    Route::get('/update/product/{id}', [
        'as'    =>    'product.update',
        'uses'     =>    'ProductController@update'
    ]);
    Route::post('/update/product/{id}', [
        'as'    =>    'product.edit',
        'uses'     =>    'ProductController@edit'
    ]);
    Route::get('/product/delete/{id}', [
        'as'    =>    'product.delete',
        'uses'     =>    'ProductController@destroy'
    ]);
});

// Sell Routes
Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('sales', [
        'as'    =>    'sales.index',
        'uses'     =>    'SaleController@index'
    ]);
    Route::post('/cart', [
        'as'    =>    'sale.store',
        'uses'     =>    'SaleController@store'
    ]);
    Route::get('/update/product/{id}', [
        'as'    =>    'product.update',
        'uses'     =>    'ProductController@update'
    ]);
    Route::post('/sale/delete/{id}', [
        'as'    =>    'sale.delete',
        'uses'     =>    'SaleController@destroy'
    ]);
    Route::get('/product/delete/{id}', [
        'as'    =>    'product.delete',
        'uses'     =>    'ProductController@destroy'
    ]);
});
    /////////////////////////////////////////////

});
