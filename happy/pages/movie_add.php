<?php

//初始化
$options = $countries = '';

//图书分类
$sql = "SELECT id, title FROM {$t_}sub WHERE cid=$MovieId ORDER BY id DESC";

//执行
$msql->execute($sql);

//获取数据
while ($res = $msql->fetch()) {

    $options .= '<option value="' . $res['id'] . '">' . $res['title'] . '</option>';
}

///////////////////////////////////////////////////////////////////////////////////////////////////

//国家
$sql = "SELECT id, title FROM {$t_}sub WHERE cid=$CountryId ORDER BY id DESC";

//执行
$msql->execute($sql);

//获取数据
while ($res = $msql->fetch()) {

    $countries .= '<option value="' . $res['id'] . '">' . $res['title'] . '</option>';
}

?>

<form class="layui-form" action="index.php?go=movie_add_do" method="post" enctype="multipart/form-data">

    <div class="layui-form-item" style="display:flex;">

        <div>
            <label class="layui-form-label">选择分类</label>
            <div class="layui-input-block" style="width:300px;">
                <select name="className" id="className" lay-verify="required">
                    <option value=""></option>
                    <?php echo $options; ?>
                </select>
            </div>
        </div>
        <!-- <div>
            <label class="layui-form-label">二级分类</label>
            <div class="layui-input-block" style="width:300px;">
                <select name="subName" id="subName" lay-verify="required">
                    <option value=""></option>
                </select>
            </div>
        </div> -->
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">产品名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">导演</label>
        <div class="layui-input-block">
            <input type="text" name="director" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">主演</label>
        <div class="layui-input-block">
            <input type="text" name="roles" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">封面</label>
        <div class="layui-input-block">

            <button type="button" class="layui-btn" id="test1" onclick="clickfile()">
                <i class="layui-icon">&#xe67c;</i>上传图片
            </button>

            <input type="file" name="poster" id="poster" class="layui-input" style="display:none;" accept="image/*" />

        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">价格</label>
        <div class="layui-input-inline">
            <input type="number" name="price" required lay-verify="required" placeholder="请输入价格" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">元</div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">片长</label>
        <div class="layui-input-inline">
            <input type="number" name="mlong" required lay-verify="required" placeholder="请输入价格" autocomplete="off" class="layui-input">
        </div>
        <div class="layui-form-mid layui-word-aux">分钟</div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">国家</label>
        <div class="layui-input-block"  style="width:300px; position:relative;z-index:999999">

            <select name="country" id="country" lay-verify="required">
                <option value=""></option>
                <?php echo $countries; ?>
            </select>

        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">资源地址</label>
        <div class="layui-input-block">
        <input type="text" name="url" required lay-verify="required" placeholder="请输入资源地址" autocomplete="off" class="layui-input">
        </div>
    </div>



    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">产品描述</label>
        <div class="layui-input-block">

            <div id="editor">
                <p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p>
            </div>
            <textarea id="text1" name="text1" style="width:100%; height:0px;"></textarea>

        </div>
    </div>



    <div class="layui-form-item">
        <label class="layui-form-label">上架日期</label>
        <div class="layui-input-block">
            <input type="text" class="layui-input" autocomplete="off" style="width:272px;" id="dt" name="dt" placeholder="请选择日期">
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
    layui.use('laydate', function() {
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
    editor.customConfig.onchange = function(html) {
        // 监控变化，同步更新到 textarea
        $text1.val(html)
    }

    editor.create()

    // 初始化 textarea 的值
    $text1.val(editor.txt.html())


    //点击上传
    function clickfile() {

        var poster = document.getElementById("poster");

        poster.click();

    }


    $(function() {

        //联动菜单
        $("#className").change(function() {

            console.log(111);

        })

    })
</script>