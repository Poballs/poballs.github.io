<?php

    //引入公用文件
    require('../include/common.in.php');

    //接收参数
    $openid = trim($openid);

    //判断openid合法性
    if (!preg_match('/^[a-zA-Z0-9_-]{28}$/',$openid)){
        die();
    }

    //根据OPENID查询该用户的数据
    $sql = "SELECT username,iphone,headphoto,address FROM {$t_}user WHERE openid = '$openid' LIMIT 1";
    $msql -> execute($sql);
    $res = $msql -> fetch();

    //输出JSON
    echo json_encode($res);


?>