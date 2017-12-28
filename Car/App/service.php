<?php
class service {
    function __construct()
    {
        $obj = new db();
        $this->mysql = $obj->mysql;
    }
    function index(){
        include 'App/views/header.html';
        $data = $this->mysql->query("select * from service")->fetch_all(MYSQL_ASSOC);
        $datas = $this->mysql->query("select * from found")->fetch_all(MYSQL_ASSOC);
        include 'App/views/service.html';
        include "App/views/footer.html";

    }


}