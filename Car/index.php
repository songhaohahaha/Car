<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 14:14
 */
include 'Core/Debug.php';
include 'Core/router.php';
include 'Core/db.php';
//把请求分发到不同的地方;
router::run();
?>