<?php

    //引入公用文件
    require_once('../include/common.in.php');

    //接收参数-tag
    $allowedTags = array('book','music','movie');
    if(!in_array($tag,$allowedTags)){
        die('TAG不合法');
    }

    //接收参数-PID
    $pid = intval($pid);

    //根据TAG从不同的表中获取数据
    if ($tag == 'book'){

        $sql = "SELECT b.id,b.cid,ccid,bookname,price,author,publicer,descript,c.title as ctitle, s.title as stitle,poster as dp FROM {$t_}book as b LEFT JOIN {$t_}sub as s ON (b.ccid=s.id) LEFT JOIN {$t_}class as c ON (b.cid=c.id) WHERE b.id=$pid LIMIT 1";

        $msql -> execute($sql);

        $res = $msql -> fetch();

        //初始化
        $tmpArr = array();

        //去掉简介中的标签
        $res['descript'] = strip_tags($res['descript']);

        //获取该产品的封面
        $sql = "SELECT url FROM {$t_}poster WHERE pid=$pid";
        $msql -> execute($sql);
        while($rex = $msql -> fetch()){
            $tmpArr[] = $rex;
        }
        $res['poster'] = $tmpArr;


        echo json_encode($res);

    }

    if ($tag == 'music'){

        $sql = "SELECT m.id,m.cid,ccid,musicname,singer,compose,writer,poster,price,title,url,words FROM {$t_}music as m LEFT JOIN {$t_}sub as s ON (m.ccid=s.id) WHERE m.id=$pid LIMIT 1";

        $msql -> execute($sql);

        $res = $msql -> fetch();

        echo json_encode($res);

    }


?>