<?php

//语句
$sql = "SELECT p.id, pid, bookname,url FROM {$t_}poster as p 
LEFT JOIN {$t_}book as g ON (p.pid=g.id)
ORDER BY p.id DESC";

//执行语句
$msql->execute($sql);

// 抓取数据
while ($res = $msql->fetch()) {
    $trs .= '
  <tr>
    <td>' . $res['id'] . '</td>
    <td>' . $res['pid'] . $res['bookname'] . '</td>
    <td><img src="' . $res['url'] . '" style="width:50px;"></td>
    <td><a href="javascript:;" onclick="rem(' . $res['id'] . ')">删除</a></td>
  </tr>';
}

?>

<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col width="200">
        <col>
    </colgroup>
    <thead>
        <tr>
            <th>ID</th>
            <th>产品名称</th>
            <th>缩略图</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php echo $trs; ?>
    </tbody>
</table>

<script>
    //删除
    function rem(id) {

        layui.use('layer', function() {

            var layer = layui.layer;

            layer.confirm('确定要删除吗？', {
                btn: ['确定', '取消'], //按钮
                title: '提示'
            }, function() {
                location.href = "index.php?go=poster_del&id=" + id
            }, function() {

            });


        });
    }
</script>