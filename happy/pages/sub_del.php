<?php

//删除产品
function delProduct($tableName,$id){

    //全局化变量
    global $t_, $msql;

    //获取封面地址
    $sql = "SELECT poster FROM {$t_}{$tableName} WHERE ccid=$id";
 
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
    $sql = "DELETE FROM {$t_}{$tableName} WHERE ccid=$id";
    $msql->execute($sql);
    $as = $msql ->aw();
    if ($as>0){
        echo '删除记录成功！<br />';
    }

}

//接收一级分类ID
$cid = intval($_GET['cid']);

//接收二级分类ID
$id = intval($_GET['id']);


/**
 * 删除图书记录
 */
if ($cid == $BookId) {

    delProduct('book',$id);

}
/**
 * 删除音乐记录
 */
if ($cid == $MusicId){

    delProduct('music',$id);

}
/**
 * 删除电影记录
 */
if ($cid == $MovieId){

    delProduct('movie',$id);

}

//删除二级分类
$sql = "DELETE FROM {$t_}sub WHERE id=$id";

$msql -> execute($sql);

$as = $msql -> aw();

if ($as >0){
    echo '删除二级分类成功！<br />';
}

