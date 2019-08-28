<?php

    //限制访问
    //限制报错
    error_reporting(0);

    //该页面不能被独立执行，必须通过入口文件index.php来执行
    if (!$root){
        die('Request Fail!');
    }

    ////////////////////////////////////////////////

    //接收表单数据
    $className = trim($_POST['className']);

    if (!$className){

        die('请填写分类名称！');

    }
    //入库
    $sql = "INSERT INTO {$t_}class(title) VALUES ('$className')";

    //执行语句
    $msql -> execute($sql);

    //获取执行结果
    if ($msql->aw() > 0){
        echo '入库成功！';
        echo '<a href="index.php?go=class_add">继续新增</a>';
    } else {
        echo '入库失败！';
    }


?>