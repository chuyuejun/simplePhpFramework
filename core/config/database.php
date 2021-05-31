<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 17:36
 */
return [


    // 必须配置项
    'mysql' => [
        'database_type' => 'mysql',
        'database_name' => 'book',
        'server'        => env('DB_HOST', 'localhost'),
        'username'      => env('DB_USERNAME', 'root'),
        'password'      => env('DB_PASSWORD', '123456'),
        'charset'       => env('DB_CHARSET', 'utf8mb4'),
        'port'          => env('DB_PORT', 3306),
        'prefix'        => env('DB_PREFIX', ''),
    ],

   /* // 可选参数
    'port' => 3306,

    // 可选，定义表的前缀
    'prefix' => 'PREFIX_',

    // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]*/
];