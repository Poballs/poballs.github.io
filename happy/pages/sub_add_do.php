<?php

    //初始化
    $dst = '';

    //接收表单数据
    $cid = $_POST['cid'];

    $title = $_POST['title'];

    $file = $_FILES['file'];

    //处理数据
    if ($file['name']){
       $dst = upload($file);
    }

    //入库
    $sql = "INSERT INTO {$t_}sub (cid,title,ico) VALUES ($cid,'$title','$dst')";

    $msql -> execute($sql);

    $as = $msql -> aw();

    if ($as >0){
        echo '入库成功！';
    } else {
        die('入库失败！');
    }

?>