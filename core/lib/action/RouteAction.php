<?php
namespace core\lib\action;

class RouteAction
{

    protected $routes = [];

    //私有属性，用于保存实例
    private static $instance;
    //构造方法私有化，防止外部创建实例
    private function __construct(){}
    //公有方法，用于获取实例
    public static function getInstance(){
        //判断实例有无创建，没有的话创建实例并返回，有的话直接返回
        if(!(self::$instance instanceof self)){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //克隆方法私有化，防止复制实例
    private function __clone(){}

    /**
     * Register a new GET route with the router.
     *
     * @param  string  $uri
     * @param  \Closure|array|string|callable|null  $action
     * @return \Illuminate\Routing\Route
     */
    public function get($uri, $action = null)
    {
        return $this->addRoute('GET', $uri, $action);
    }

    /**
     * Register a new POST route with the router.
     *
     * @param  string  $uri
     * @param  \Closure|array|string|callable|null  $action
     * @return \Illuminate\Routing\Route
     */
    public function post($uri, $action = null)
    {
        return $this->addRoute('POST', $uri, $action);
    }

    /**
     * Register a new route responding to all verbs.
     *
     * @param  string  $uri
     * @param  \Closure|array|string|callable|null  $action
     * @return \Illuminate\Routing\Route
     */
    public function any($uri, $action = null)
    {
        $this->get($uri, $action);
        $this->post($uri, $action);
        return true;
    }

    /**
     * Add a route to the underlying route collection.
     *
     * @param  array|string  $methods
     * @param  string  $uri
     * @param  \Closure|array|string|callable|null  $action
     * @return \Illuminate\Routing\Route
     */
    public function addRoute($methods, $uri, $action)
    {
        if (empty($action) || empty($uri) || empty($methods))
            throw new \Exception('Parameter cannot be empty');

        $action = explode('@', $action);
        if (count($action) != 2)
            throw new \Exception('Parameter error');
        $this->routes[$methods]['/' . $uri] = $action;
        return $this->routes;
    }


    public function allRoutes() {
        return $this->routes;
    }


}