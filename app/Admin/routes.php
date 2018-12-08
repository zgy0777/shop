<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');//后台首页视图
    $router->get('/users','UsersController@index');//用户管理视图
    $router->get('/products', 'ProductsController@index');//商品管理视图
    $router->get('/products/create','ProductsController@create');//商品创建视图;
    $router->post('/products','ProductsController@store');//商品创建行为
    $router->get('products/{id}/edit', 'ProductsController@edit');//编辑商品视图
    $router->put('products/{id}', 'ProductsController@update');//更新商品行为

});
