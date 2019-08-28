<?php

    //接收参数ID和新值
    $id = $_POST['id'];
    
    $className = $_POST['className'];

   
    //修改语句
    $sql = "UPDATE {$t_}class SET title='$className' WHERE id=$id";
   

    //执行
    $msql -> execute($sql);

    //结果
    $as = $msql -> aw();

    if ($as >0){

        echo '修改成功！';
        
    } else {

        die('修改失败！');
    }

?>