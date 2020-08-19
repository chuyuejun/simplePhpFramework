<?php
namespace core\lib\action;

use core\lib\conf;
use Predis\Client;

class RedisAction
{
    //私有属性，用于保存实例
    private static $instance;
    //构造方法私有化，防止外部创建实例
    private function __construct(){}
    //公有方法，用于获取实例
    public static function getInstance($server = '')
    {
        //判断实例有无创建，没有的话创建实例并返回，有的话直接返回
        if(!(self::$instance instanceof Client)) {
            self::$instance = new Client($server);
        }
        return self::$instance;
    }
    //克隆方法私有化，防止复制实例
    private function __clone(){}
}