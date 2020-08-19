<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/8
 * Time: 11:48
 */

function p($val)
{
    if(is_bool($val)){
        var_dump($val);
    }elseif (is_null($val)){
        var_dump(NULL);
    }else{
        echo "<pre style='position:relative;z-index:1000;padding:10px;
        border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;
        line-height:18px;opacity:0.9;'>". print_r($val,true) . "</pre>";
    }


}



















