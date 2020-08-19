<?php
namespace app\Controllers;

use core\app;
use core\lib\request;

class BaseController
{
    public $assign;

    public $request;

    const SUFFIX = '.html';

    public function __construct(request $request)
    {
        $this->request = $request;
    }

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file_path = APP . '/views/' . $file . self::SUFFIX;;
        if(is_file($file_path)){
            //使用twig模板引擎
            $loader = new \Twig_Loader_Filesystem(APP . '/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => PHPTEST . './log/twig',
            ));
            $twig->display($file . self::SUFFIX, $this->assign ? $this->assign : []);
            exit;
        }
        app::viewError();
    }

    public function render($file, $data)
    {
        $file_path = APP . '/views/' . $file . self::SUFFIX;
        if(is_file($file_path)){
            //使用twig模板引擎
            $loader = new \Twig_Loader_Filesystem(APP . '/views');
            $twig = new \Twig_Environment($loader, array(
                'cache' => PHPTEST . './log/twig',
                'debug' => DEBUG
            ));
            $twig->display($file . self::SUFFIX, $data);
            exit;
        }
        app::viewError();
    }

    public function returnSuccessResponse($data = [], $msg='')
    {
        $arr = [
            "code"    => 0,
            "message" => $msg? $msg : "success",
        ];
        $arr["data"] = $data;
        $this->addHeader();
        echo json_encode($arr, JSON_PARTIAL_OUTPUT_ON_ERROR);
        exit;
    }

    public function returnErrorResponse($status_code = 0, $message = '')
    {
        $arr = [
            'code'      => $status_code,
            'message'   => $message,
        ];
        $this->addHeader();
        echo json_encode($arr, JSON_PARTIAL_OUTPUT_ON_ERROR);
        exit;
    }

    public function addHeader($header = [])
    {
        if (count($header)) {
            foreach ($header as $key => $val) {
                header($key . ': ' . $val);
            }
        }
        header('Content-type: application/json');
    }


}