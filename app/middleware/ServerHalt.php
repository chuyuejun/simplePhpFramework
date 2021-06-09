<?php
/**
 * 服务器维护暂停访问
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2019/8/22
 * Time: 19:59
 */
namespace app\middleware;

use Closure;
use core\contracts\middleware;
use core\lib\request;

class ServerHalt
{
    /**
     * Handle an incoming request.
     *
     * @param  \core\lib\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Closure $next)
    {
        echo __LINE__;exit;
        var_dump($next);exit;
        return $next;
        /*
         * 验证是否有非法参数
         */
        $path = explode('/', $request->path())[0] ?? '';
        if (!empty($path)) {

        }
        return $next($request);
    }


}