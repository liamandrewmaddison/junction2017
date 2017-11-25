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
 * Users Resource routes
 */
$router->group(['prefix' => 'users', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', 'UsersController@all');
    $router->get('/{id}', 'UsersController@getById');
    $router->put('/update/{id}', 'UsersController@update');
    $router->post('/create', 'UsersController@create');
    $router->delete('/delete/{id}', 'UsersController@delete');
});
