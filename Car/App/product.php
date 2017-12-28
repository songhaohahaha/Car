<?php
class product {
    function __construct()
    {
        $obj = new db();
        $this->mysql = $obj->mysql;
    }
    function index(){
        include 'App/views/header.html';
        $data = $this->mysql->query("select * from found")->fetch_all(MYSQL_ASSOC);
        $datas = $this->mysql->query("select * from product")->fetch_all(MYSQL_ASSOC);
        include 'App/views/product.html';
        include "App/views/footer.html";

    }


}