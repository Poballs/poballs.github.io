<?php

    //封面
    $posters = $_FILES['file'];

    //文件名
    $names = $posters['name'];

    //临时文件名
    $tmp_name = $posters['tmp_name'];

    //初始化
    $dst = '';

    $values = '';
    
    $result = true;

    foreach($names as $key => $value){

        //名称
        $name = $value;

        //临时名
        $tempName = $tmp_name[$key];

        //新数组
        $newArr['name'] = $name;
        $newArr['tmp_name'] = $tempName;

        //上传
        $dst .= upload($newArr).',';

    }

    //去掉最后的逗号
    $dst = substr($dst,0,-1);

    //转成数组
    $dstArr = explode(',',$dst);

    foreach($dstArr as $url){

       $values .= "($pid,'$url'),";

    }


    if ($values){
   
        //去掉末尾逗号
        $values = substr($values,0,-1);

        //执行入库操作
        //入库
        $sql = "INSERT INTO {$t_}poster (pid,url) VALUES $values";

        //执行入库
        $msql -> execute($sql);

        //结果
        $as = $msql->aw();

        if ($as>0){
            echo '入库成功！';
        } else {
            echo '新增失败！';
        }


    }

$msql -> error();

?>