<?php
include 'Loader.php';


class App{
    static function run(){
        //提取请求uri
        $request_uri = $_SERVER['REQUEST_URI'];
        //去掉开始的'/'字符
        if ($request_uri != '/'){
            $request_uri = substr($request_uri,1);
        }

        //加载路由文件
        $route = '';
        include '../route/web.php';

        //获取路由中定义的控制器和方法
        $controller_action = $route[$request_uri]['controller_action'];
        $controller_action_arr = explode('@',$controller_action);
        $controller = $controller_action_arr[0];
        $action = $controller_action_arr[1];

        $class = $route[$request_uri]['namespace'] . '\\' . $controller;

        //var_dump($class);

        spl_autoload_register('Loader::autoload');

        $a = new $class();
        $a->$action();



    }
}