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

class StudyTestController extends BaseController
{

    public $server;
    public $node;

    public function test(request $request){


        return $this->returnSuccessResponse(['a' =>'dwd']);
        $a = $request->post('a', 'ci');
        $b = $request->get('d');

        $this->assign('a', 1);
        $this->assign('b', 2);
        $this->display('index');

      echo __LINE__;exit;
        var_dump($a, $b);exit;

        echo __LINE__;exit;
        $s=new StudyTestController();
        $s->addServer('192.168.1.2:12341');
        $s->addServer('192.168.1.3:12342');
        $s->addServer('192.168.1.4:12343');
        $s->addServer('192.168.1.5:12344');
        $s->addServer('192.168.1.6:12345');

        echo $s->getServer('我在哪里');
        /*结果192.168.1.3:12342*/

        echo '<br>';
        /*删除这台服务器*/
       // $s->dropServer('192.168.1.3:12342');
        echo $s->getServer('我在哪里');
        echo '<br>';
        echo __LINE__;exit;
    }

    /**
     * 我们需要得到的散列值是一个正整数，所以我们可以使用times33或者crc32来获得
     */
    public function hashing($str){

     return sprintf('%u',crc32($str));
    }


    /**
     * 添加服务器
     */
    public function addServer($server){

      if(!isset($this->server[$server])){
         $this->addNode($server);
       }
    }

    /**
     * 添加虚拟节点
     */
    public function addNode($server){
      /**
       * 每个添加32个虚拟节点，服务器少你可以添加更多，分布相对均匀以防数据倾斜
       */
       for($i=0;$i<32;$i++) {

            $key_node = $this->hashing($server.$i);
            $this->server[$server][] = $key_node;
            $this->node[$key_node] = $server;
        }
        /**
         * 变成有序的整数数组
         */
        ksort($this->node,SORT_NUMERIC);
    }

   /*删除服务器*/
   public function dropServer($server) {

     foreach($this->server[$server] as $v) {
         unset($this->node[$v]);
      }
         unset($this->server[$server]);
   }

    /*调度服务器*/
    public function getServer($str){

        $key_str=$this->hashing($str);
        /**
         * 第一个节点
         *
         * current() 函数返回数组中的当前元素的值。
         */
        $server=current($this->node);
        foreach($this->node as $k=>$v) {
            /*
             * k  散列值
             * v  对应的服务器
             */
            if($k >= $key_str) {
               $server = $v;
               break;
           }
        }
        /*
         * reset() 函数将内部指针指向数组中的第一个元素，并输出。
         */
        reset($this->node);
        return $server;
     }



}