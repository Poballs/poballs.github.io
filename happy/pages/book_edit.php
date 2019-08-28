<?php

    //初始化
    $options = '';

    //处理参数
    $id = intval($id);

    //产品
    $sql = "SELECT * FROM {$t_}book WHERE id=$id LIMIT 1";

    //执行
    $msql -> execute($sql);

    //获取数据
    $rex = $msql -> fetch();

    //处理日期
    $rex['dt'] = date('Y-m-d',$rex['dt']);

    //获取一级分类id
    $cid = $rex['cid'];

    //获取二级分类id
    $ccid = $rex['ccid'];

    /////////////////////////////////////////////////////////////////////////////////////

    //获取二级分类数据
    //分类
    $sql = "SELECT id, title FROM {$t_}sub WHERE cid=$BookId ORDER BY id DESC";

    //执行
    $msql -> execute($sql);

    //获取数据
    while($res = $msql -> fetch()){

        //获取当前分类的名称
        if ($res['id'] == $ccid){
            $currentCName = $res['title'];
        }

        $options .= '<option value="'.$res['id'].'">'.$res['title'].'</option>';

    }

    ////////////////////////////////////////////////////////////////////////////////

?>

<form class="layui-form" action="index.php?go=book_edit_do" method="post" enctype="multipart/form-data">
    
    <!--隐藏域ID-->
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />

    <div class="layui-form-item">
        <label class="layui-form-label">选择分类</label>
        <div class="layui-input-block" style="width:300px;">
            <select name="className" lay-verify="required">

                <option value="<?php echo $ccid; ?>"><?php echo $currentCName; ?></option>

                <?php echo $options; ?>
            </select>
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">产品名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo $rex['bookname'];?>">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">作者</label>
        <div class="layui-input-block">
            <input type="text" name="author" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo $rex['author'];?>">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">出版社</label>
        <div class="layui-input-block">
            <input type="text" name="publicer" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo $rex['publicer'];?>">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">产品封面</label>
        <div class="layui-input-block">

            <button type="button" class="layui-btn" id="test1" onclick="clickfile()">
                <i class="layui-icon">&#xe67c;</i>上传图片
            </button>

            <input type="file" name="poster" id="poster" class="layui-input" style="display:none;" accept="image/*" />

            <div class="layui-form-mid layui-word-aux">
                <img src="<?php echo $rex['poster']; ?>" alt="" style="width:50px;">
            </div>

        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">产品价格</label>
        <div class="layui-input-inline">
            <input type="number" name="price" required lay-verify="required" placeholder="请输入价格" autocomplete="off" class="layui-input" value="<?php echo $rex['price'];?>">
        </div>
        <div class="layui-form-mid layui-word-aux">元</div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">是否包邮</label>
        <div class="layui-input-inline">
            <input type="radio" name="freepost" value="1" title="是" <?php echo $rex['freepost'] ? 'checked':'';  ?> />
            <input type="radio" name="freepost" value="0" title="否" <?php echo $rex['freepost'] ? '':'checked';  ?> />
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">是否推荐</label>
        <div class="layui-input-inline">
            <input type="radio" name="isrecommend" value="1" title="是" <?php echo $rex['isrecommend'] ? 'checked':'';  ?> />
            <input type="radio" name="isrecommend" value="0" title="否" <?php echo $rex['isrecommend'] ? '':'checked';  ?> />
        </div>
    </div>


    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">产品描述</label>
        <div class="layui-input-block">

            <div id="editor">
                <?php echo $rex['descript']; ?>
            </div>
            
            <textarea id="text1" name="text1" style="width:100%; height:0px;"></textarea>

        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">上架日期</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input" style="width:272px;" id="dt" name="dt" placeholder="请选择日期" value="<?php echo $rex['dt']; ?>" autocomplete="off" />
        </div>
    </div>


    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/wangEditor.min.js"></script>

<script>
    //Demo
    layui.use('form', function() {
        var form = layui.form;

        //监听提交
        // form.on('submit(formDemo)', function(data) {
        //     layer.msg(JSON.stringify(data.field));
        //     return false;
        // });
    });

    //日历
     layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
            elem: '#dt' //指定元素
        });
    });

    //wangEditor编辑器
    var E = window.wangEditor
    var editor = new E('#editor')
    
    editor.customConfig.uploadImgServer = '/upload'

    //获取textarea节点
    var $text1 = $('#text1')

    //同步到textarea
    editor.customConfig.onchange = function (html) {
        // 监控变化，同步更新到 textarea
        $text1.val(html)
    }
     
    editor.create()

    // 初始化 textarea 的值
    $text1.val(editor.txt.html())


    //点击上传
    function clickfile(){

        var poster = document.getElementById("poster");

        poster.click();

    }

</script>
