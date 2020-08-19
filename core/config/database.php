<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 17:36
 */
return array(

    /*'DSN'=>'mysql:host=localhost;dbname=book',
    'USERNAME'=>'root',
    'PASSWD'=>'123456'*/
    // 必须配置项
    'database_type' => 'mysql',
    'database_name' => 'book',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8',

   /* // 可选参数
    'port' => 3306,

    // 可选，定义表的前缀
    'prefix' => 'PREFIX_',

    // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]*/
);