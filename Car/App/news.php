<?php
class news {
    function __construct()
    {
        $obj = new db();
        $this->mysql = $obj->mysql;
    }
    function index(){
        include 'App/views/header.html';
        $data = $this->mysql->query("select * from news")->fetch_all(1);
        include 'App/views/news.html';
        include "App/views/footer.html";

    }


}