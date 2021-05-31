<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 11:44
 */

/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
define('PHPTEST', realpath(' /'));
define('CORE', PHPTEST . './core');
define('APP', PHPTEST . './app');
define('MODULE', 'app');
define('DEBUG', true);
//设置时区(prc 中国)
date_default_timezone_set('prc');
//加载composer类库
require_once 'vendor/autoload.php';

if (DEBUG) {
    $whoops = new \Whoops\Run;
    //自定义错误标题
    $errorTitle = '框架出错了';
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    //配置错误等级,debug开启返回错误信息
    ini_set('display_error', 'On');
} else {
    ini_set('display_error', 'Off');
}

//封装的打印方法
require CORE . '/common/function.php';
//引入核心文件
require CORE . '/app.php';
//实现类自动加载
spl_autoload_register('\core\app::load');
//加载路由配置
require PHPTEST . 'route/apiRoute.php';

\core\app::run();





