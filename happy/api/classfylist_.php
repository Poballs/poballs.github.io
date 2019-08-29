<?php

     //跨域
     header("Access-Control-Allow-Origin:*");
     header("Access-Control-Allow-Headers:token");
 
     //引入公用文件
     require_once('../include/common.in.php');

     //获取id
     $id = intval($_GET['id']);

     //根据分类ID获取该分类下的数据
    $sql = "SELECT id,pname,pprice,poster FROM {$t_}product WHERE cid=$id ORDER BY id DESC LIMIT 0,10";

    $msql -> execute($sql);

    //抓取数据
    while($res = $msql->fetch()){

        $res['poster'] = $myhost.'mishop/'.$res['poster'];

        $tmpArr[] = $res;

    }

    //输出JSON
    echo json_encode($tmpArr);

?>