<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 14:18
 */
namespace app\Controllers\api;

use app\Controllers\BaseController;

class IndexController extends BaseController
{


   public function index()
   {
//       $a = new request();
//       var_dump($a);exit;
       echo 'success';exit;
   }

    public function test()
    {
        echo 1234;
    }

}