<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2018/6/11
 * Time: 09:41
 */
namespace app\model;

class LinkModel extends BaseModel
{
    public $table = 'link';

    public function lists()
    {
        $ret =$this->select($this->table,'*');
        return $ret;
    }



}
