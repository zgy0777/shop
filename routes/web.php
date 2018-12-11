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

//Route::get('/','PagesController@root')->name('root');
Route::redirect('/', '/products')->name('root');
Route::get('/products','ProductsController@index')->name('products.index');


Auth::routes();

//邮箱验证中间件
Route::group(['middleware' => 'auth'],function(){
    //邮箱验证提示
    Route::get('/email_verify_notice','PagesController@emailVerifyNotice')->name('email_verify_notice');
    //邮件验证
    Route::get('/email_verification/verify','EmailVerificationController@verify')->name('email_verification.verify');
    //用户主动发送邮件
    Route::get('/email_verification/send','EmailVerificationController@send')->name('email_verification.send');



    //测试中间件
    Route::group(['middleware' => 'email_verified'],function(){
        //用户地址
        Route::get('/user_addresses','UserAddressController@index')->name('user_addresses.index');
        Route::get('/user_addresses/create','UserAddressController@create')->name('user_addresses.create');
        Route::post('/user_address/store','UserAddressController@store')->name('user_addresses.store');
        Route::get('/user_addresses/{user_address}','UserAddressController@edit')->name('user_addresses.edit');
        Route::put('/user_addresses/{user_address}','UserAddressController@update')->name('user_addresses.update');
        Route::delete('user_addresses/{user_address}','UserAddressController@destroy')->name('user_addresses.destroy');
        Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
        Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');
        Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');
        //购物车
        Route::post('cart','CartController@add')->name('cart.add');
        Route::get('cart','CartController@index')->name('cart.index');
        Route::delete('/cart/{sku}','CartController@remove')->name('cart.remove');
        //个人用户中心
        Route::post('orders', 'OrdersController@store')->name('orders.store');
        Route::get('orders','OrdersController@index')->name('orders.index');
        Route::get('orders/{order}','OrdersController@show')->name('orders.show');

    });
});

Route::get('/products/{product}','ProductsController@show')->name('products.show');
