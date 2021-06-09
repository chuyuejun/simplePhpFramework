<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 11:57
 */

namespace core;

use app\middleware\CorsMiddleware;
use app\middleware\ServerHalt;
use core\lib\action\RouteAction;
use core\lib\log;
use core\lib\request;
use core\lib\route;
use core\support\Collection;

class app
{
    public static $classMap = [];

    public $assign;

    public static function run()
    {
        //日志
        log::init();
        //加载路由
        $route = new route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        //加载中间件
        //全局中间件
//        $middleware = RouteAction::getInstance()->get_middleware();
//        $pipe_arr = [ServerHalt::class];
//        $callback = array_reduce($pipe_arr, function ($stack, $pipe) {
//            return function () use ($stack, $pipe) {
//                return (new $pipe)->handle($stack);
//            };
//        }, function() {
//            echo "(6)请求向路由器传递，返回响应.".'<br>';
//        });
//        call_user_func($callback);
        $ctrlFile = APP . '/Controllers/' . str_replace('\\', '/', $ctrlClass) . '.php';
        $controllerClass = '\\' . MODULE . '\Controllers\\' . $ctrlClass;
        if (is_file($ctrlFile)) {
            $request = new request();
            include $ctrlFile;
            $ctrl = new $controllerClass($request);
            // 获取所有类方法
            $classAll = self::get_this_class_methods($ctrl);
            if (!in_array($action, $classAll)) {
                self::viewError();
                exit;
            }
            $ctrl->$action($request);
            log::log('controller:' . $ctrlClass . '   ' . 'action:' . $action);
        } else {
            self::viewError();
            exit;
        }
    }

    /**
     * @desc 仅仅获取这个类的方法，不要父类的
     * @param class int Y N 类名
     * @return array3 array 本类的所有方法构成的一个数组
     */
    public static function get_this_class_methods($class)
    {
        // 判断是否存在父类
        if ($parent_class = get_parent_class($class)) {
            return array_diff(get_class_methods($class), get_class_methods($parent_class));
        }
        return get_class_methods($class);
    }


    static public function load($class)
    {
        //自动加载类库
        if (isset(self::$classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = PHPTEST . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }


    /*
     * 404页面
     */
    public static function viewError()
    {
        $a = new app();
        $a->display('404.html');
        exit;
    }

    public function display($file)
    {
        $file_path = APP . '/views/' . $file;
        if (is_file($file_path)) {
            //使用twig模板引擎 extract
            $loader = new \Twig_Loader_Filesystem(APP . '/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => PHPTEST . './log/twig',
            ));
            $template = $twig->load($file);
            $template->display($this->assign ? $this->assign : []);
        }
    }


}