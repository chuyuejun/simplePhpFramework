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

    public function test(request $request)
    {
       // $redis = RedisService::strategy();
       // $res = $redis->setex('abc', 100, 'ceshi');
        $a = $request->post('a', 'ci');
        $b = $request->get('d');
        $this->assign('a', $a);
        $this->assign('b', $b);
        $this->display('index');
        //return $this->render('index');
        //$res = $redis->get('abc');t
        //var_dump($res);exit;
        return $this->returnSuccessResponse(['a' =>'dwd']);
    }


    public function get_sum($n) {
        if ($n == 1) {
            return  1;
        }
        return $n + $this->get_sum($n-1);
    }






}