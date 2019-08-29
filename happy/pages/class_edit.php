<?php

    //限制访问
    //限制报错
    error_reporting(0);

    //该页面不能被独立执行，必须通过入口文件index.php来执行
    if (!$root){
        die('Request Fail!');
    }

    ////////////////////////////////////////////////

    //根据ID获取分类名称
    $id = intval($_GET['id']);

    if (!$id){
        die('缺少参数!');
    }

    //语句
    $sql = "SELECT title FROM {$t_}class WHERE id=$id LIMIT 1";

    //执行语句
    $msql -> execute($sql);

    //获取结果
    $res = $msql -> fetch();

?>
<div>
    <form action="index.php?go=class_edit_do" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<?php echo $id; ?>" />

        <p>请重新输入分类名称：<input type="text" name="className" id="className" value="<?php echo $res['title']; ?>" /> </p>
       
        <p><input type="submit" value="确定" /></p>
    </form>
</div>