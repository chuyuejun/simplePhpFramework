<?php
/*
 * 访问路由
 */
$route = \core\lib\action\RouteAction::getInstance();


//$route->post('index/index', 'IndexController@index');
//$route->post('index/phpTest', 'IndexController@test');
//$route->any('study/test', 'StudyTestController@test');
$route->group([
    'namespace'  => 'api',
    'prefix'     => 'app',
    'middleware' => [

    ],
], function ($route) {
    $route->post('index/index', 'IndexController@index');
    $route->post('index/phpTest', 'IndexController@test');
    $route->any('study/test', 'StudyTestController@test');
});
