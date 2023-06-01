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
// VERSION
$router->get('/', function () use ($router) {
    return $router->app->version();
});

// unsecure routes 


// $router->group(['prefix' => 'api'], function () use ($router) {
//     $router->get('/users',['uses' => 'UserController@getUsers']);
// })  


//SIMPLE ROUTES



/* Same to index controller  
    $router->get('/studentsList',['uses' => 'UserController@getAllUsers']); */ 

//<-- get all users
// $router->get('/studentsList',['uses' => 'UserController@getAllUsers']);
$router->get('/authors', 'UserController@index'); //<-- get all users
$router->get('/authors/{id}', 'UserController@showId'); // get user by id
$router->post('/authors', 'UserController@add'); // create new user record
$router->put('/authors/{id}', 'UserController@update'); // update user record
$router->delete('/authors/{id}', 'UserController@delete'); // delete record


// Job routes

$router->get('/job', 'JobController@index'); // show all genre
$router->get('/job/{jobId}' , 'JobController@show'); // show genre by id
$router->post('/job' , 'JobController@addJob'); // add job type
$router->delete('/job/{id}' , 'JobController@delete'); // delete job type