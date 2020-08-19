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
        //$dsn ='mysql:host=localhost;dbname=book';
        //$username='root';
        //$passwd='123456';
        /*$database =conf::all('database');

        try{
            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
        }catch (\PDOException $e){
            p($e->getMessage());
        }*/
        $option = conf::all('database');
        parent::__construct($option);

    }

}