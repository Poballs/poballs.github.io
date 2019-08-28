<?php

    //初始化
    // $isUpload = true;
    $upload = '';

    //接收表单数据
    $poster = $_FILES['poster'];

    //处理数据

    //1.是否上传文件
    if ($poster['name']){ //选了新文件
        $dstPath = upload($poster);
        $dstPath = $dstPath ? $dstPath : '';

        //添加更新封面字段
        $upload = "poster='$dstPath',";

    } else {
        $isUpload = false;
    }
    
    //2.日期
    $dt = strtotime($dt);

    //3.判断是否新上传
    // if ($isUpload){
        
    // }

    //修改语句
    $sql = "UPDATE {$t_}book SET ccid=$className,bookname='$title',".$upload."price=$price,author='$author',publicer='$publicer',descript='$text1',freepost=$freepost,recommend=$isrecommend,dt=$dt WHERE id=$id";


    //执行语句
    $msql -> execute($sql);


    $msql -> error();

    //结果
    $as = $msql -> aw();
    if ($as>0){
        echo '修改成功！';
    } else {
        echo '修改失败！';
    }


?>