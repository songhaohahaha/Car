<?php
class guarantee {
    function __construct()
    {
        $obj = new db();
        $this->mysql = $obj->mysql;
    }
    function index(){
        include 'App/views/header.html';
        $data = $this->mysql->query("select * from guarantee")->fetch_all(MYSQL_ASSOC);
        include 'App/views/guarantee.html';
        include "App/views/footer.html";

    }


}