<?php
class about {
    function __construct()
    {
        $obj = new db();
        $this->mysql = $obj->mysql;
    }
    function index(){
        include 'App/views/header.html';
        $data = $this->mysql->query("select * from aboutUs")->fetch_all(MYSQL_ASSOC);
        include 'App/views/about.html';
        include "App/views/footer.html";
    }



}