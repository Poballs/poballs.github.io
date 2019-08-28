<?php

    //获取code
    $code = $_GET['code'];

    //根据code换openid
    $res = file_get_contents('https://api.weixin.qq.com/sns/jscode2session?appid=wx8a71f700743ee1d9&secret=d71ab552730f9cedda539aab85391321&js_code='.$code.'&grant_type=authorization_code');

    echo $res;


?>