<?php

    //接收表单数据
    $vip = $_GET['vip'];
    $age = $_GET['age'];
    $name = $_GET['name'];
    $sex = $_GET['sex'];
    $hobby = json_decode($_GET['hobby']);

    //返回
    print_r($hobby);


?>