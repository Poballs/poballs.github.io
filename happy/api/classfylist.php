<?php

    //跨域
    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Headers:token");

    //引入公用文件
    require_once('../include/common.in.php');

    //语句
    $sql = "SELECT id,ico,classname FROM {$t_}class";

    $msql -> execute($sql);

    //抓取数据
    while($res = $msql->fetch()){

        //处理图标地址
        $res['ico'] = $myhost.'mishop/'.$res['ico'];

        $tmpArr[] = $res;

    }


    //输出json
    echo json_encode($tmpArr);


?>