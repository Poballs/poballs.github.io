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
    $sql = "INSERT INTO {$t_}book (cid, ccid, bookname, poster, price, author, publicer, descript, freepost, recommend, dt) VALUES ($BookId,$className,'$title','$dstPath',$price,'$author','$publicer','$text1',$freepost,$isrecommend,$dt)";

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