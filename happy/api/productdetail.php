<?php

     //引入公用配置文件
     require_once('../include/common.in.php');

     //初始化
     $tempArr = $arr = $arr2 = $arr3 = array();
 
     //跨域
     header("Access-Control-Allow-Origin:*");
     header("Access-Control-Allow-Headers:token");

     //接收id
     $id = $_GET['id'];

     //查询
     $sql = "SELECT id, pname, pprice, pdescript, pnotes, poster FROM {$t_}product WHERE id=$id LIMIT 1";

     //执行
     $msql -> execute($sql);

     //结果
     $res = $msql -> fetch();

     //把封面加入到$res['imgList']
     $sql = "SELECT photo FROM {$t_}poster WHERE pid=$id";
     $msql -> execute($sql);
     while($rex = $msql -> fetch()){
          $tempArr[] = 'http://www.fuhushi.com/web320/xieming/mishop/'.$rex['photo'];
     }

     $res['imgList'] = $tempArr;

     //返回json
     echo json_encode($res);
     


?>