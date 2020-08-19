<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 12:46
 */
namespace core\lib;


use core\app;
use core\lib\action\RouteAction;

class route
{
    //控制器
    public $ctrl;
    //方法
    public $action;

    public function __construct()
    {
        /**
         * 1.隐藏index.php
         * 2.获取url 参数部分
         * 3.返回对应控制器和方法
         */
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/')
        {
             //$path = $_SERVER['REQUEST_URI'];
             $path = parse_url($_SERVER['REQUEST_URI'])['path'];
             //分割成数组
             //$path = str_replace('?','/',$path);
             //$pathArr = explode('/', trim($path, '/'));
             $allRoute = RouteAction::getInstance()->allRoutes();
             switch ($_SERVER['REQUEST_METHOD']) {
                 case 'POST':
                 case 'GET':
                      $route = $allRoute[$_SERVER['REQUEST_METHOD']][$path] ?? '';
                      if (empty($route)) {
                          app::viewError();
                      }
                      $this->ctrl   = array_shift($route);
                      $this->action = array_pop($route);
                     break;
                 default:
                     throw new \Exception('Unsupported request method');
             }
//             if(isset($pathArr[0])){
//                 $this->ctrl = $pathArr[0];
//             }
//             unset($pathArr[0]);
//             //判断第二个存在不存在
//             if(isset($pathArr[1])) {
//                $this->action = $pathArr[1];
//                unset($pathArr[1]);
//             } else {
//                 $this->action = conf::get('ACTION','route');
//             }
//
//             //id/1/str/2/test/3
//             //统计数组中元素个数
//             $count= count($pathArr) + 2;
//             $i = 2;
//             while ($i < $count){
//                 //判断参数后面有无值
//                 if(isset($pathArr[$i+1])){
//                     $_GET[$pathArr[$i]] = $pathArr[$i+1];
//                 }
//                 $i = $i+2;
//             }

        } else {
            //默认
//            $this->ctrl   = conf::get('CTRL','route');
//            $this->action = conf::get('ACTION','route');
            app::viewError();
        }
    }

}

