
<?php

    //语句
    $sql = "SELECT id,title FROM {$t_}class ORDER BY id DESC";

    //执行语句
    $msql -> execute($sql);

    // 抓取数据
    while($res = $msql -> fetch()){
        $trs .= '
      <tr>
        <td>'.$res['id'].'</td>
        <td>'.$res['title'].'</td>
        <td><a href="index.php?go=class_edit&id='.$res['id'].'">修改</a> | <a href="javascript:;" onclick="del('.$res['id'].')">删除</a></td>
      </tr>';
    }

?>

<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>分类名称</th>
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
        function del(id) {

            layui.use('layer', function(){

                var layer = layui.layer;
                
                layer.confirm('确定要删除吗？', {
                    btn: ['确定','取消'], //按钮
                    title:'提示'
                    }, function(){
                        location.href = "index.php?go=class_del&id="+id
                    }, function(){
                   
                });


            }); 
        }
    </script>