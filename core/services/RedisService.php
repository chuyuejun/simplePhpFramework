<?php
namespace core\services;

use core\lib\action;
use core\lib\conf;

class RedisService
{
    private function __construct(){}

    public static function strategy($server = '')
    {
        //配置连接的IP、端口、以及相应的数据库
        if (empty($server)) {
            $server = conf::all('redis');
        }
        return action\RedisAction::getInstance($server);
    }

    private function __clone(){}

}