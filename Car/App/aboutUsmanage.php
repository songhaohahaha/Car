<?php
class aboutUsmanage{
    public $db;
    function __construct()
    {
        $obj = new db();
        $this->db=$obj->mysql ;
    }

    function index(){
        $title = '关于我们';

        include "App/views/aboutUsmanage.html";
    }
//    function insert(){
//        $data = $_POST;
//        $keys = array_keys($data);
//        $str = '(';
//
//        for($i=0;$i<count($keys);$i++){
//            $str .= $keys[$i] .',';
//        }
//        $str = substr($str,0,-1);
//        $str .= ') values (';
//        foreach ($data as $v){
//            $str .= "'{$v}',";
//        }
//        $str = substr($str,0,-1);
//        $str .=')';
//        $sql = "insert into shop $str";
//        var_dump($str);
//        $this->db->query($sql);
//        if ($this->db->affected_rows){
//            echo 'ok';
//            exit;
//        }
//        echo 'error';
//    }
    function insert()
    {
        /*$sname = $_POST['sname'];
        $stype = $_POST['stype'];
        $description = $_POST['description'];
        $thumb = $_POST['thumb'];
        $vol = $_POST['vol'];
        $heat = $_POST['heat'];
        $price = $_POST['price'];*/
        /*foreach(array_keys() as $v){

        }*/
        $data = $_POST;
        $str = '(';
        $keys = array_keys($data);
        /*print_r(array_keys($data));
        exit;*/
        for ($i = 0; $i < count($keys); $i++) {
            $str .= $keys[$i] . ',';
        }
        $str = substr($str, 0, -1);
        $str .= ') values (';

        foreach ($data as $v){
            $str .= "'{$v}',";
        }
        $str = substr($str, 0, -1);
        $str .= ')';

        echo $str;
        $sql = "insert into aboutUs {$str}";

        $this->db->query($sql);
        if ($this->db->affected_rows) {
            echo 'ok';
        }else {
            echo 'error';
        }
    }

    function show(){
        $mysql = new mysqli('localhost','root','','Car',3306);
//        pdo
        $mysql->query('set names utf8');
        $data = $mysql->query("select * from aboutUs")->fetch_all(MYSQL_ASSOC);
        echo json_encode($data);
    }

    function delete(){
        $ids = $_GET['id'];
        $mysql = new mysqli('localhost','root','','Car',3306);
//        pdo
        $mysql->query('set names utf8');
        $mysql->query("delete from aboutUs where aid = $ids");
        if ($mysql->affected_rows){
            echo 'ok';
            exit;
        }
        echo 'error';
    }

    function update(){
        $ids = $_GET['id'];
        $value = $_GET['value'];
        $info =$_GET['type'];
        $mysql = new mysqli('localhost','root','','Car',3306);
//        pdo
        $mysql->query('set names utf8');
        $mysql->query("update aboutUs set $info ='$value' where aid =$ids");
        if ($mysql->affected_rows){
            echo 'ok';
            exit;
        }
        echo 'error';
    }

    function upload(){
//        $_FILES['file'];
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            if(!file_exists('Public/upload')){
                mkdir('Public/upload');
            }
            $data = date('y-m-d');
            if(!file_exists('Public/upload/'.$data)){
                mkdir('Public/upload/'.$data);
            }
            $path = 'Public/upload/'.$data.'/'.$_FILES['file']['name'];
            if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
                echo '/Car/'.$path;
            }
        }
    }
}