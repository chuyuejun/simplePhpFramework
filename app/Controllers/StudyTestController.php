<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2019/3/1
 * Time: 15:41
 */
namespace app\Controllers;

use core\app;
use core\lib\request;
use core\services\RedisService;

class StudyTestController extends BaseController
{

    public $server;
    public $node;

    public function test(request $request)
    {
        $redis = RedisService::strategy();

        $res = $redis->setex('abc', 100, 'ceshi');
        //$res = $redis->get('abc');
        var_dump($res);exit;

        return $this->returnSuccessResponse(['a' =>'dwd']);
        $a = $request->post('a', 'ci');
        $b = $request->get('d');
    }







}