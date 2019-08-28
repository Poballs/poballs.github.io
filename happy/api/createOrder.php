<?php

    require('../include/common.in.php');

    //初始化
    $result = "";

    //时间戳
    $dt = time();


    if ($orderData){

        $data = stripslashes($orderData);

        $data = json_decode($data,true);

        //遍历数组，并入库
        foreach($data as $item){

            $result .= "(".$item['cid'].",".$item['ccid'].",".$item['pid'].",'".$item['openid']."',".$item['count'].",".$dt."),";
        
        }
        
        //去掉末尾逗号
        $result = substr($result,0,-1); //(1,3,5,6,),(),()

        //语句
        $sql = "INSERT INTO {$t_}order (cid,ccid,pid,openid,counts,dt) VALUES $result";

        //执行语句
        $msql -> execute($sql);

        //结果
        $as = $msql -> aw();

        if ($as>0){
            $rex = 'success';
        } else {
            $rex = 'fail';
        }

        //返回json
        echo json_encode($rex);

        $msql -> error();
    }

?>