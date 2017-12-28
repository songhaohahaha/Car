<?php
class home {
    function __construct()
    {
        $obj = new db();
        $this->mysql = $obj->mysql;
    }
    function index(){
        include 'App/views/header.html';
        $data = $this->mysql->query("select * from lunbo")->fetch_all(MYSQL_ASSOC);
        $data1 = $this->mysql->query("select * from page")->fetch_all(MYSQL_ASSOC);
        $data2 = $this->mysql->query("select * from consult")->fetch_all(MYSQL_ASSOC);
        include 'App/views/index.html';
        include "App/views/footer.html";

    }


}