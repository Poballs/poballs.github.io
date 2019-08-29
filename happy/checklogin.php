<?php

    //引入公用文件
    require_once('include/common.in.php');

    //接收前端表单数据
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];

    //处理数据
    $pwd = substr(sha1(md5($pwd)),3,25);


    //查找数据库表中是否有该用户名和密码
    $sql = "SELECT id FROM {$t_}admin WHERE username='$uname' AND pwd='$pwd' LIMIT 1";

    //执行语句
    $msql -> execute($sql);

    //获取数据
    $res = $msql -> fetch();

    if (!$res['id']){

        die('fail');

    } else {
        
        //创建SESSION
        $_SESSION['ADMIN'] = $uname;

        echo 'pass';
    }

?>