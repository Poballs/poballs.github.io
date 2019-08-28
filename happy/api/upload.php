<?php

    //引入公用文件
    require('../include/common.in.php');

    //接收图片
    $photo = $_FILES['file'];

    //上传文件
    $dst = upload($photo);

    if ($dst){
        echo '图片上传成功！'.$dst;
    } else {
        echo '图片上传失败！';
    }

?>