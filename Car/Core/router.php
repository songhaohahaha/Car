<?php
class router{
//    static 静态的 类似于js中的 Array.isArray();构造函数的方法；不是实例化出来的方法，调用的时候用  router::run();
    static function run(){
//        $_SERVER['PATH_INFO']路径信息
        if(!isset($_SERVER['PATH_INFO']) || $_SERVER['PATH_INFO']=='/'){
            $model = 'admin';
            $fn = 'index';
        }else{
            $pathinfo = explode('/',substr($_SERVER['PATH_INFO'],1));
            $model = $pathinfo[0];
            $fn = isset($pathinfo[1])?$pathinfo[1]:'index';
        }
//      判断有没有这个模块
        if(file_exists("App/{$model}.php")){
            include 'App/'.$model.'.php';
            if(class_exists($model)){
                $page = new $model();
                if(method_exists($page,$fn)){
                    $page->$fn();
                }else{
                    include "App/views/404.html";
                }
            }else{
                include "App/views/404.html";
            }
        }else{
            include "App/views/404.html";
        }
    }
}