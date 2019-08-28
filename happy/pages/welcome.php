<?php
     //限制报错
     error_reporting(0);

     //该页面不能被独立执行，必须通过入口文件index.php来执行
     if (!$root){
         die('Request Fail!');
     }
?>

<div>
欢迎进入后台管理系统！
</div>