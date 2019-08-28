<?php

    //初始化
    $dstPath = '';

    //接收表单数据
    $file = $_FILES['poster'];

    //处理数据
    $className = intval($className);
    $title = trim($title);

    if ($file['name']){

         //1.上传文件
        $dstPath = upload($file);
    }

    //2.日期
    $dt = strtotime($dt);



    //入库
    $sql = "INSERT INTO {$t_}movie (cid, ccid, moviename,descript, poster, hx,price,director,roles,country,mlong,dt) VALUES ($MovieId,$className,'$title', '$text1','$dstPath','$url',$price,'$director','$roles','$country',$mlong,$dt)";

    //执行入库
    $msql -> execute($sql);

    //结果
    $as = $msql -> aw();
    if ($as>0){
        echo '入库成功！';
    } else {
        echo '入库失败！';
        $msql -> error();
    }


?>