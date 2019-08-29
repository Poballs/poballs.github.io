<?php

//删除产品
function delProduct($tableName,$cid){

    //全局化变量
    global $_, $msql;

    //获取封面地址
    $sql = "SELECT poster FROM {$_}{$tableName} WHERE cid=$cid";
    $msql->execute($sql);
    while ($res = $msql->fetch()) {

        //封面地址
        $poster = $res['poster'];

        //删除封面文件
        if (file_exists($poster)) {
            @unlink($poster);
        }
    }

    //删除记录
    $sql = "DELETE FROM {$_}{$tableName} WHRE cid=$cid";
    $msql->execute($sql);
    $as = $msql ->aw();
    if ($as>0){
        echo '删除记录成功！<br />';
    }


}

//接收一级分类ID
$id = intval($_GET['id']);


/**
 * 删除图书记录
 */
if ($id == 3) {

    delProduct('book',$id);

}
/**
 * 删除音乐记录
 */
if ($id == 4){

    delProduct('music',$id);

}
/**
 * 删除电影记录
 */
if ($id == 6){

    delProduct('movie',$id);

}

//删除二级分类
$sql = "DELETE FROM {$t_}sub WHERE cid=$id";

$msql -> execute($sql);

$as = $msql -> aw();

if ($as >0){
    echo '删除二级分类成功！<br />';
}


//删除一级分类
$sql = "DELETE FROM {$t_}class WHERE id=$id";

$msql -> execute($sql);

$as = $msql -> aw();

if ($as >0){
    echo '删除一级分类成功！<br />';
}
