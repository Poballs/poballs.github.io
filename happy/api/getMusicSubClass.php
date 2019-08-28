<?php

    //初始化
    $tmpArr = array();

    //引入公用文件
    require_once('../include/common.in.php');

    //获取图书二级分类数据
    $sql = "SELECT id,title,ico FROM {$t_}sub WHERE cid=$MusicId";

    //执行语句
    $msql -> execute($sql);

    //获取数据
    while($res = $msql->fetch()){

        $tmpArr[] = $res;

    }

    //输出JSON
    if (count($tmpArr)>0){

        echo json_encode($tmpArr);

    }


?>