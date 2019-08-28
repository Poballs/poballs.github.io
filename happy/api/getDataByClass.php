<?php

    //初始化
    $tmpArr = array();
    $where = '';

    //引入公用文件
    require_once('../include/common.in.php');

    //接收分类ID
    $ccid = intval($ccid);

    //接收tag
    $tag = trim($tag);

    //接收搜索词
    $keywords = trim($keywords);


    //根据不同的tag，从不同的表中获取数据
    if ($tag == 'book'){

        if ($keywords){
            $where = " AND publicer = '$keywords' ";
        } 

        //每屏显示的记录数
        $recordsNums = 3;

        //开始读取的位置
        $start = $pos ? intval($pos) : 0;

        if ($ccid == 50){ // 热销图书

        } else if ($ccid == 60) { //新书上架

            $sql = "SELECT id,cid,ccid,bookname,author,publicer,dt,descript,price,poster FROM {$t_}book ORDER BY id DESC LIMIT $start,$recordsNums";

        } else  if ($ccid == 70){ //9.9包邮

            $sql = "SELECT id,cid,ccid,bookname,author,publicer,dt,descript,price,poster FROM {$t_}book WHERE freepost=1 ORDER BY id DESC LIMIT $start,$recordsNums";

        } else {

            $sql = "SELECT id,cid,ccid,bookname,author,publicer,dt,descript,price,poster FROM {$t_}book WHERE 1 AND ccid=$ccid $where ORDER BY id DESC LIMIT $start,$recordsNums";

        }

        $msql -> execute($sql);

        while($res = $msql -> fetch()){

            //处理日期
            $res['date'] = date('Y-m-d',$res['dt']);

            //处理简介
            $descript = strip_tags($res['descript']);
            $res['about'] = mb_substr($descript,0,45,'utf-8');

            //处理评论
            $sql = "SELECT AVG(stars) as s, count(*) as total FROM {$t_}recommend WHERE ccid=".$res['ccid']." AND pid=".$res['id'];
            $msql -> execute($sql,'xxx');
            $rex = $msql -> fetch('xxx');

            $res['stars'] = $rex['s'] ? $rex['s'] : 5;
            $res['total'] = $rex['total'] ? $rex['total'] : 0;


            $tmpArr[] = $res;

        }

        //返回json
        echo json_encode($tmpArr);

    }

    if ($tag == 'music'){

        if ($ccid){
            $where = "AND ccid=$ccid";
        }

        $start = $start ? intval($start) : 0;
        $recordsNums = 10;

        $sql = "SELECT id,cid,ccid,musicname,poster,singer,compose,writer,price FROM {$t_}music WHERE 1 $where ORDER BY id DESC LIMIT $start,$recordsNums";

        $msql -> execute($sql);

        while($res = $msql -> fetch()){

            //处理评论
            $sql = "SELECT AVG(stars) as s, count(*) as total FROM {$t_}recommend WHERE ccid=".$res['ccid']." AND pid=".$res['id'];
            $msql -> execute($sql,'xxx');
            $rex = $msql -> fetch('xxx');

            $res['stars'] = $rex['s'] ? $rex['s'] : 5;
            $res['total'] = $rex['total'] ? $rex['total'] : 0;

            $tmpArr[] = $res;

        }

        echo json_encode($tmpArr);


    }

    if ($tag == 'movie'){


    }



?>