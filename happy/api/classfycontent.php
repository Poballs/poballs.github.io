<?php

     //引入公用配置文件
     require_once('../include/common.in.php');

     //初始化
     $tempArr = $arr = $arr2 = $arr3 = array();
 
     //跨域
     header("Access-Control-Allow-Origin:*");
     header("Access-Control-Allow-Headers:token");

     //读取语句
    //  $sql = "SELECT p.id as pid, c.id as cid, pname, poster, classname FROM {$t_}product as p LEFT JOIN {$t_}class as c ON (p.cid = c.id)";

    //先读取分类数据
    $sql = "SELECT id, classname FROM {$t_}class ORDER BY sort ASC";

    //执行语句
    $msql -> execute($sql);

    //获取数据
    while($res = $msql->fetch()){

        //清空 $tempArr
        $tempArr = array();

        //分类ID
        $cid = $res['id'];

        //分类名称
        $cname = $res['classname'];

        //分类广告
        $cad = '//cdn.cnbj0.fds.api.mi-img.com/b2c-mimall-media/7e98be403a5f4277adba84acaecb9c76.jpg?bg=6D96C7';

            //读取该分类下的产品数据
            $sql = "SELECT id, pname as name, poster as img FROM {$t_}product WHERE cid=$cid";

            //执行语句
            $msql -> execute($sql,'x');

            //获取产品数据
            while($rex = $msql ->fetch('x')){

                //处理封面地址
                $rex['img'] = 'http://www.fuhushi.com/web320/xieming/mishop/'.$rex['img'];

                $tempArr[] = $rex;
            }
        
        //存入数组
        $arr['id'] =  $cid;
        $arr['titleImg'] = $cad;
        $arr['name'] = $cname;
        $arr['list'] = $tempArr;

        $arr2[] = $arr;

    }

    //返回最终的数据
    $arr3['list'] = $arr2;

    //输出json
    echo json_encode($arr3);



?>