<?php
/**
 * Created by PhpStorm.
 * User: fmaple
 * Date: 2018/5/11
 * Time: 14:04
 */

namespace app\middleware;

use Closure;
use http\Client\Request;
use http\Client\Response;

class CorsMiddleware
{
//    private $headers;
//    private $allow_origin;

    public function handle(Closure $next)
    {
        echo __LINE__;
        return $next;
//        $this->headers = [
//            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE',
//            'Access-Control-Allow-Headers' => $request->header('Access-Control-Request-Headers') ?? '',
//            'Access-Control-Allow-Credentials' => 'true',//允许客户端发送cookie
//            'Access-Control-Max-Age' => 1728000 //该字段可选，用来指定本次预检请求的有效期，在此期间，不用发出另一条预检请求。
//        ];
//
//        $this->allow_origin = [
//            'http://localhost',
//            'http://localhost:8080',
//            'https://localhost:8080',
//            'http://localhost:8081',
//            'https://localhost:8081',
//            'http://localhost:8282',
//            'null',
//            '*',
//        ];
//        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
////        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '*';
//
//        if (false !== mb_strpos($origin, '127.0.0.1')) {
//            $origin = '*';
//        }
//
//        //如果origin不在允许列表内，直接返回403
//        if (!in_array($origin, $this->allow_origin) && !empty($origin)) {
//            return new Response('Forbidden', 403);
//        }
//
//        //如果是复杂请求，先返回一个200，并allow该origin
//        if ($request->isMethod('options'))
//            return $this->setCorsHeaders(new Response('OK', 200), $origin);
//        //如果是简单请求或者非跨域请求，则照常设置header
//        $response = $next($request);
//        $methodVariable = array($response, 'header');
//        //这个判断是因为在开启session全局中间件之后，频繁的报header方法不存在，所以加上这个判断，存在header方法时才进行header的设置
//        if (is_callable($methodVariable, false, $callable_name)) {
//            return $this->setCorsHeaders($response, $origin);
//        }
//        return $response;
    }

    /**
     * @param $response
     * @return mixed
     */
//    public function setCorsHeaders($response, $origin)
//    {
//        foreach ($this->headers as $key => $value) {
//            $response->header($key, $value);
//        }
//        if (in_array($origin, $this->allow_origin)) {
//            $response->header('Access-Control-Allow-Origin', $origin);
//        } else {
//            $response->header('Access-Control-Allow-Origin', '');
//        }
//        return $response;
//    }

}