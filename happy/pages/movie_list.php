
<?php

    //初始化
    $data = '';

    //语句
    $sql = "SELECT m.id, moviename, price, poster, dt, s.title as stitle, c.title as ctitle FROM {$t_}movie as m LEFT JOIN {$t_}sub as s ON (m.ccid=s.id) LEFT JOIN {$t_}class as c ON (m.cid=c.id) ORDER BY m.id DESC";

    //执行语句
    $msql -> execute($sql);

    //抓取数据
    while($res = $msql -> fetch()){

        //日期
        $date = date('Y-m-d',$res['dt']);

        //数据集合
        $data .= '
        <tr>
        <td>'.$res['id'].'</td>
        <td>'.$res['ctitle'].' / '.$res['stitle'].'</td>
        <td>'.$res['moviename'].'</td>
        <td>'.$res['price'].'</td>
        <td><img src="'.$res['poster'].'" style="width:50px;"></td>
        <td>'.$date.'</td>
        <td><a href="index.php?go=movie_view&id='.$res['id'].'">浏览</a> | <a href="index.php?go=movie_edit&id='.$res['id'].'">修改</a> | <a href="index.php?go=movie_del&id='.$res['id'].'">删除</a></td>
      </tr>

        ';
    }


?>

<table class="layui-table">
  <colgroup>
    <col width="100">
    <col width="150">
    <col width="300">
    <col width="100">
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>分类名</th>
      <th>产品名称</th>
      <th>产品价格</th>
      <th>封面</th>
      <th>上架日期</th>
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>

    <?php echo $data; ?>
   
  </tbody>
</table>