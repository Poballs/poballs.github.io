<?php

    //引入公用文件
    require('../include/common.in.php');

    //接收并处理参数
    $openid = trim($openid);

    $username = trim($myname);
    $iphone = trim($iphone);
    $address = trim($address);
    $poster = trim($poster);
    $file = $_FILES['file'];

    $dt = time();

    //上传头像
    $dst = upload($file);

    //数据入库
    $sql = "INSERT INTO {$t_}user(openid,username,iphone,address,poster,headphoto,regdate) VALUES ('$openid','$username','$iphone','$address','$poster','$dst',$dt)";

    $msql -> execute($sql);

    $as = $msql -> aw();

    if ($as>0){
        echo 'success';
    } else {
        echo 'fail';
    }

?>