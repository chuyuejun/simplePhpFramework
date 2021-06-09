<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 17:59
 */
namespace core\lib;
use core\lib\conf;

class log
{
    static $class;
    /**
     * 日志
     */
    public static function init(){
        //确定存储方式
        $drive = conf::get('DRIVE', 'log');
        $class = '\core\lib\drive\log\\' . $drive;
        self::$class = new $class;

    }

    public static function log($name, $file = 'log')
    {
        self::$class->log($name, $file);
    }
}