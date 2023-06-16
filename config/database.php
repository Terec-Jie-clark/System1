<?php
return [
/*
|--------------------------------------------
------------------------------
| Default Database Connection Name
|--------------------------------------------
------------------------------
|
| Here you may specify which of the
database connections below you wish
| to use as your default connection for all
database work. Of course
| you may use many connections at once
using the Database library.
|
*/

'default' => env('DB_CONNECTION',
'mysql'),
/*
|--------------------------------------------
------------------------------
| Database Connections
|--------------------------------------------
------------------------------
|
| Here are each of the database
connections setup for your application.
| Of course, examples of configuring
each database platform that is
| supported by Laravel is shown below to
make development simple.
|
|
| All database work in Laravel is done
through the PHP PDO facilities
| so make sure you have the driver for
your particular database of
| choice installed on your machine
before you begin development.
|
*/
'migrations' => 'migrations',
'connections' => [
'mysql' => [

'driver' => 'mysql',
'host' => env('DB_HOST', null),
'port' => env('DB_PORT', null),
'database' => env('DB_DATABASE',
null),
'username' =>
env('DB_USERNAME', null),
'password' =>
env('DB_PASSWORD', null),
'unix_socket' => env('DB_SOCKET',
''),
'charset' => env('DB_CHARSET',
'utf8'),
'collation' => env('DB_COLLATION',
'utf8_unicode_ci'),
'prefix' => env('DB_PREFIX', ''),
// 'strict' =>
env('DB_STRICT_MODE', false),
// 'engine' => env('DB_ENGINE',null),
// 'timezone' =>
env('DB_TIMEZONE', '+00:00'),
],
'sqlsrv' => [
'driver' => 'sqlsrv',
'host' => env('DB_HOST1', null),
'port' => env('DB_PORT1', null),
'database' =>
env('DB_DATABASE1', null),
'username' =>
env('DB_USERNAME1', null),
'password' =>

env('DB_PASSWORD1', null),
'charset' => env('DB_CHARSET',
'utf8'),
'prefix' => env('DB_PREFIX', ''),
],
'testing' => [
'driver' => 'sqlite',
'database' => ':memory:',
'host' =>
database_path('testing.sqlite'),
'prefix' => env('DB_PREFIX', ''),
],
],
];