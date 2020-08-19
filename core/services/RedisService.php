<?php
namespace core\services;

use core\lib\action;
use core\lib\conf;
use Predis\Client;

class RedisService
{
    private static $instance;

    private function __construct(){}

    public static function strategy($drive = 'redis_one')
    {
        //配置连接的IP、端口、以及相应的数据库
        $server = conf::all('redis')[$drive] ?? '';
        if (isset(self::$instance[$drive])) {
            return self::$instance[$drive];
        }
        self::$instance[$drive][] = new Client($server);
        return self::$instance[$drive];
    }

    private function __clone(){}

}