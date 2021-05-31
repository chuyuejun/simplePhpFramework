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
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = parse_url($_SERVER['REQUEST_URI'])['path'];
            //分割成数组
            $allRoute = RouteAction::getInstance()->allRoutes();
            switch ($_SERVER['REQUEST_METHOD']) {
                case 'POST':
                case 'GET':
                    $route = $allRoute[$_SERVER['REQUEST_METHOD']][$path] ?? '';
                    if (empty($route)) {
                        app::viewError();
                    }
                    $this->ctrl = array_shift($route);
                    $this->action = array_pop($route);
                    break;
                default:
                    throw new \Exception('Unsupported request method');
            }

        } else {
            //默认
            app::viewError();
        }
    }

}

