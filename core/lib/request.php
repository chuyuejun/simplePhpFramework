<?php
namespace core\lib;

class request
{
    private $post = [];

    private $get = [];

    public function __construct()
    {
        $this->post = $_POST;
        $this->get  = $_GET;
    }


    public function get($key, $value = '')
    {
        return isset($this->get[$key]) ? $this->get[$key] : $value;
    }

    public function post($key, $value = '')
    {
        return isset($this->post[$key]) ? $this->post[$key] : $value;
    }
}