<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


use App\Events\ExampleEvent;
use Illuminate\Support\Facades\Event;

$router->get('/', function () use ($router) {
    return view('index');
});

$router->get('/chat', function () use ($router) {
    broadcast(new ExampleEvent());
    Event::dispatch(new ExampleEvent());
});




$router->group([
    'prefix' => 'auth'
], function ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('refresh', 'AuthController@refresh');
    $router->post('me', 'AuthController@me');
});
