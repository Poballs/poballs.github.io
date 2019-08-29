
<?php

    //初始化
    $options = '';

    //获取一级分类
    $sql = "SELECT id,title FROM {$t_}class";
    $msql -> execute($sql);
    while($res = $msql -> fetch()){

        $options .= '<option value="'.$res['id'].'">'.$res['title'].'</option>';

    }


?>

<form method="post" action="index.php?go=sub_add_do" enctype="multipart/form-data">

    <div>选择一级分类：
        <select name="cid" id="cid">
            <option value="">请选择分类</option>
            <?php echo $options; ?>
        </select>
    </div>

    <div>选择分类名称：
        <input type="text" name="title" id="title" />
    </div>

    <div>上传分类图标
        <input type="file" name="file" id="file" />
    </div>

    <div>

        <input type="submit" value="确定" />

    </div>

</form>