<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 16:05
 */
namespace core\lib;

use core\lib\conf;
use Medoo\Medoo;

class model extends Medoo
{
    //连接数据库
    public function __construct()
    {
        $option = conf::all('database');
        parent::__construct($option);
    }

}