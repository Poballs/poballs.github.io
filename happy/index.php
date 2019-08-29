<?php
//引入公用函数
include 'include/common.in.php';

if (!$_SESSION['ADMIN']) {

    //跳转到登录页面
    jump('login.php');

    die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>快乐小屋后台管理系统</title>
    <link rel="stylesheet" href="layui/css/layui.css">
    <script src="layui/layui.js"></script>
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">快乐小屋</div>
            <!-- 头部区域（可配合layui已有的水平导航） -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item"><a href="">控制台</a></li>
                <li class="layui-nav-item"><a href="">商品管理</a></li>
                <li class="layui-nav-item"><a href="">用户</a></li>
                <li class="layui-nav-item">
                    <a href="javascript:;">其它系统</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">邮件管理</a></dd>
                        <dd><a href="">消息管理</a></dd>
                        <dd><a href="">授权管理</a></dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                        <?php echo $_SESSION['ADMIN']; ?>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="">基本资料</a></dd>
                        <dd><a href="">安全设置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="exit.php">退了</a></li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree" lay-filter="test">

                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;">一级分类管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="index.php?go=class_add">新增分类</a></dd>
                            <dd><a href="index.php?go=class_list">分类列表</a></dd>
                        </dl>
                    </li>

                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;">二级分类管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="index.php?go=sub_add">新增分类</a></dd>
                            <dd><a href="index.php?go=sub_list">分类列表</a></dd>
                        </dl>
                    </li>



                    <li class="layui-nav-item layui-nav-itemed">
                        <a href="javascript:;">图书管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="index.php?go=book_add">新增图书</a></dd>
                            <dd><a href="index.php?go=book_list">产品列表</a></dd>
                        </dl>
                    </li>


                    <li class="layui-nav-item layui-nav-itemed">
                        <a href="javascript:;">音乐管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="index.php?go=music_add">新增音乐</a></dd>
                            <dd><a href="index.php?go=music_list">产品列表</a></dd>
                        </dl>
                    </li>


                    <li class="layui-nav-item layui-nav-itemed">
                        <a href="javascript:;">影片管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="index.php?go=movie_add">新增影片</a></dd>
                            <dd><a href="index.php?go=movie_list">产品列表</a></dd>
                        </dl>
                    </li>


                    <li class="layui-nav-item">
                        <a href="javascript:;">订单管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;">订单列表</a></dd>
                        </dl>
                    </li>

                    <li class="layui-nav-item">
                        <a href="javascript:;">用户管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;">用户列表</a></dd>
                        </dl>
                    </li>

                    <li class="layui-nav-item">
                        <a href="javascript:;">收藏管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;">收藏列表</a></dd>
                        </dl>
                    </li>


                    <li class="layui-nav-item ">
                        <a href="javascript:;">封面管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="index.php?go=poster_list">封面列表</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">

                <?php
                //定义root
                $root = 'mishop';

                //接收go参数，选择要加载的文件
                $go = $_GET['go'] ? $_GET['go'] : 'welcome';

                include 'pages/' . $go . '.php';  //默认加载欢迎页：pages/welcome.php

                ?>

            </div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            © layui.com - 底部固定区域
        </div>
    </div>

    <script>
        //JavaScript代码区域
        layui.use('element', function() {
            var element = layui.element;

        });
    </script>

</body>

</html>