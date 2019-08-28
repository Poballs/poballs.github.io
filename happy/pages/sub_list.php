
<?php

//语句
$sql = "SELECT s.id, cid, s.title as stitle, c.title as ctitle, ico FROM {$t_}sub as s LEFT JOIN {$t_}class as c ON (s.cid=c.id) ORDER BY s.id DESC";

//执行语句
$msql -> execute($sql);

// 抓取数据
while($res = $msql -> fetch()){
    $trs .= '
  <tr>
    <td>'.$res['id'].'</td>
    <td>'.$res['ctitle'].'</td>
    <td>'.$res['stitle'].'</td>
    <td><img src="'.$res['ico'].'"></td>
    <td><a href="index.php?go=sub_edit&id='.$res['id'].'">修改</a> | <a href="javascript:;" onclick="del('.$res['id'].','.$res['cid'].')">删除</a></td>
  </tr>';
}

?>

<table class="layui-table">
<colgroup>
<col width="150">
<col width="200">
<col width="200">
<col width="200">
<col>
</colgroup>
<thead>
<tr>
  <th>ID</th>
  <th>一级分类名称</th>
  <th>二级分类名称</th>
  <th>图标</th>
  <th>操作</th>
</tr> 
</thead>
<tbody>
<?php echo $trs; ?>
</tbody>
</table>


<script>
    //JavaScript代码区域
    layui.use('element', function() {
        var element = layui.element;

    });


    //删除
    function del(id,cid) {

        layui.use('layer', function(){

            var layer = layui.layer;
            
            layer.confirm('确定要删除吗？', {
                btn: ['确定','取消'], //按钮
                title:'提示'
                }, function(){
                    location.href = "index.php?go=sub_del&id="+id+"&cid="+cid
                }, function(){
               
            });


        }); 
    }
</script>