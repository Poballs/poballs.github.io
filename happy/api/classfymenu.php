<?php

    //引入公用配置文件
    require_once('../include/common.in.php');

    //初始化
    $tempArr = array();

    //跨域
    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Headers:token");

    //读取分类数据语句
    $sql = "SELECT id,classname as name FROM {$t_}class ORDER BY sort ASC";

    //执行语句
    $msql -> execute($sql);

    //抓取数据
    while($res = $msql -> fetch()){

        $tempArr[] = $res;

    }

    //list键
    $arr['list'] = $tempArr;

    echo json_encode($arr);

?>