<?php

    //获取产品id
    $id = intval($_GET['id']);

    //根据该ID获取记录的全部数据
    $sql = "SELECT b.id, bookname, s.title as stitle, c.title as ctitle, price, author, publicer,descript,dt,poster, freepost, recommend FROM {$t_}book as b LEFT JOIN {$t_}class as c ON (b.cid=c.id) LEFT JOIN {$t_}sub as s ON (b.ccid=s.id) WHERE b.id=$id LIMIT 1";


    //执行语句
    $msql -> execute($sql);

    //结果
    $res = $msql -> fetch();


    //处理数据
    $res['dt'] = date('Y-m-d',$res['dt']);

?>

<div>

    <div>ID:<?php echo $res['id']; ?></div>
    <div>分类：<?php echo $res['ctitle'].' / '.$res['stitle']; ?></div>
    <div>名称：<?php echo $res['bookname']; ?></div>
    <div>价格：<?php echo $res['price']; ?></div>
    <div>简介：<?php echo $res['descript']; ?></div>

    <div>封面：<img src="<?php echo $res['poster']; ?>"></div>
    <div>上架日期：<?php echo $res['dt']; ?></div>

    <div>作者：<?php echo $res['author']; ?></div>
    <div>出版社：<?php echo $res['publicer']; ?></div>

    <div>是否包邮：<?php echo $res['freepost'] ? '9.9元 包邮' : '不包邮'; ?></div>
    <div>是否推荐：<?php echo $res['recommend'] ? '推荐' : '不推荐'; ?></div>







</div>