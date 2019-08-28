<?php

    //限制访问
    //限制报错
    error_reporting(0);

    //该页面不能被独立执行，必须通过入口文件index.php来执行
    if (!$root){
        die('Request Fail!');
    }

    ////////////////////////////////////////////////

?>
<div>
    <form action="index.php?go=class_add_do" method="post" enctype="multipart/form-data">
        <p>请输入分类名称：<input type="text" name="className" id="className"></p>
        <p><input type="submit" value="确定" /></p>
    </form>
</div>