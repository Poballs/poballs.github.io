<?php

    //引入公用文件
    require_once('include/common.in.php');

    //销毁SESSION
    $_SEESION['ADMIN'] = '';

    //跳转
    jump('login.php');
    
?>