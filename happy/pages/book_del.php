<?php

    //接收ID
    $id = $_GET['id'];

    //在删除产品记录之前，删除封面文件
    $sql = "SELECT poster,url FROM {$t_}book as b INNER JOIN {$t_}poster as p ON (b.id=p.pid) WHERE b.id=$id";
    $msql -> execute($sql);

    while($res = $msql -> fetch()){

        if (file_exists($res['url'])){
            @unlink($res['url']);
        }

        if (file_exists($res['poster'])){
            @unlink($res['poster']);
        }

    }
   
    ////////////////////////////////////////////////////////////

    //删除图书
    $sql = "DELETE FROM {$t_}book WHERE id=$id";

    //执行语句
    $msql -> execute($sql);

    //结果
    $as = $msql -> aw();

    if ($as >0){
        echo '删除图书成功！';
    } else {
        echo '删除图书失败!';
    }

    //删除封面
    $sql = "DELETE FROM {$t_}poster WHERE pid=$id";
    //执行语句
    $msql -> execute($sql);

    //结果
    $as = $msql -> aw();

    if ($as >0){
        echo '删除封面成功！';
    } else {
        echo '删除封面失败!';
    }

    $msql -> error();



?>