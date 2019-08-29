<?php

    //引入公用文件
    require_once('../include/common.in.php');

    //初始化
    $option = '';

    //接收分类ID
    $cid = $_GET['cid'];

    //根据分类ID读取产品ID和产品名称
    $sql = "SELECT id, pname FROM {$t_}product WHERE cid=$cid";

    //执行
    $msql -> execute($sql);

    //获取数据
    while ($res = $msql -> fetch()){

        $option .= '<option value="'.$res['id'].'">'.$res['pname'].'</option>';

    }

    echo $option;


?>