<?php
/**
 * Created by PhpStorm.
 * User: chuyuejun
 * Date: 2021/6/2
 * Time: 14:18
 */
namespace core\contracts;

interface middleware
{
    /**
     * @param Closure $next
     * @return mixed
     */
    public function handle(Closure $next);
}