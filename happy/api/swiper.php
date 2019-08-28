<?php

    //引入公用文件
    require_once('../include/common.in.php');

    //初始化
    $tmpArr = array();

    //语句
    $sql = "SELECT photo FROM {$t_}poster ORDER BY id DESC LIMIT 0,5";

    //执行语句
    $msql -> execute($sql);

    //抓取数据
    while($res = $msql -> fetch()){

        $tmpArr[] = $res;

    }

    //输出json
    echo json_encode($tmpArr);

?>