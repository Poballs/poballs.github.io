<?php

    //开启session
    session_start();

    //限制报错
    error_reporting(0);

    //优化接收表单数据
    foreach(array('_GET','_POST') as $_request){

        foreach($$_request as $k =>$v){
            
            ${$k} = addslashes($v);  //$className = xxxx
        }

    }


    //数据库连接参数
    // $dbhost = 'localhost';
    // $dbuser = 'root';
    // $dbpwd = 'root';
    // $dbname = 'happy';

    $dbhost = 'localhost';
    $dbuser = 'nanxi1111';
    $dbpwd = 'web_shangyuan_test20445@!';
    $dbname = 'nanxi1111';


    //表前缀
    $t_ = 'happy_fkl_';

    //主机地址
    // $myhost = 'http://localhost/';

    $myhost = 'http://www.fuhushi.com/web320/xieming/';


    //数据库操作类
    include 'db.class.php';

    //公用函数
    require_once 'common.fn.php';

    //设置分类ID
    $BookId = 3;
    $MusicId = 4;
    $MovieId = 6;
    $CountryId = 7;

?>