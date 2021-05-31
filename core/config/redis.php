<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 16:57
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */
    'redis_one' => [
        'host'     => env('REDIS_HOST', ''),
        'port'     => env('REDIS_PORT', 6379),
        'database' => env('REDIS_DATABASE', 0),
        'password' => env('REDIS_PASSWORD', ''),
    ],

    'redis_two' => [
        'host'     => env('REDIS_HOST', ''),
        'port'     => env('REDIS_PORT', 6379),
        'database' => env('REDIS_DATABASE', 2),
        'password' => env('REDIS_PASSWORD', ''),
    ],

];