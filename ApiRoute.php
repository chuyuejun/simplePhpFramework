<?php
/*
 * 访问路由
 */
$route = \core\lib\action\RouteAction::getInstance();

$route->post('index/index', 'IndexController@index');
$route->post('index/cheShi', 'IndexController@cheShi');
$route->any('study/test', 'StudyTestController@test');