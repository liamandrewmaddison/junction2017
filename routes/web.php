<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/**
 * OAuth handler routes
 */
$router->post('/login', 'Auth\LoginProxy@attemptLogin');

/**
 * User Resource routes
 */
$router->group(['prefix' => 'users', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', 'UsersController@all');
    $router->get('/{id}', 'UsersController@getById');
    $router->put('/update/{id}', 'UsersController@update');
    $router->post('/create', 'UsersController@create');
    $router->delete('/delete/{id}', 'UsersController@delete');
});

/**
 * Shop Resource routes
 */
$router->group(['prefix' => 'shops', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', 'ShopsController@all');
    $router->get('/{id}', 'ShopsController@getById');
    $router->put('/update/{id}', 'ShopsController@update');
    $router->post('/create', 'ShopsController@create');
    $router->delete('/delete/{id}', 'ShopsController@delete');
});

/**
 * Product Resource routes
 */
$router->group(['prefix' => 'products', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', 'ProductsController@all');
    $router->get('/{id}', 'ProductsController@getById');
    $router->put('/update/{id}', 'ProductsController@update');
    $router->post('/create', 'ProductsController@create');
    $router->delete('/delete/{id}', 'ProductsController@delete');
});

/**
 * Cart Resource routes
 */
$router->group(['prefix' => 'carts', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', 'CartsController@all');
    $router->get('/{id}', 'CartsController@getById');
    $router->put('/update/{id}', 'CartsController@update');
    $router->post('/create', 'CartsController@create');
    $router->delete('/delete/{id}', 'CartsController@delete');
});