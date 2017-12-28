<?php
class call {
    function __construct()
    {
        $obj = new db();
        $this->mysql = $obj->mysql;
    }
    function index(){
        include 'App/views/header.html';
        include 'App/views/call.html';
        include "App/views/footer.html";

    }


}