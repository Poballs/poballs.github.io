<?php

    //接收ID
    $id = $_GET['id'];

    //在删除产品记录之前，删除封面文件
    $sql = "SELECT poster FROM {$t_}movie WHERE id=$id";
    $msql -> execute($sql);
    $res = $msql -> fetch();

    if (file_exists($res['poster'])){
        @unlink($res['poster']);
    }

    ////////////////////////////////////////////////////////////

    //删除
    $sql = "DELETE FROM {$t_}movie WHERE id=$id";

    //执行语句
    $msql -> execute($sql);

    //结果
    $as = $msql -> aw();

    if ($as >0){
        echo '删除成功！';
    } else {
        echo '删除失败!';
    }




?>