<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录后台管理系统</title>

    <!--引入jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="css/component.css" />

    <!--引入layer-->
    <script src="layer/layer.js"></script>

</head>

<body>
    <!-- <form>

        <div class="container">

            <div>用户名：<input type="text" name="username" id="username" /></div>
            <div>密码：<input type="password" name="pwd" id="pwd" /></div>
            <div><input type="submit" value="登录" /></div>

        </div>

    </form> -->

    <div class="container demo-1">
        <div class="content">
            <div id="large-header" class="large-header">
                <canvas id="demo-canvas"></canvas>
                <div class="logo_box">
                    <h3>欢迎你</h3>
                    <form action="#" name="f" method="post">
                        <div class="input_outer">
                            <span class="u_user"></span>
                            <input name="username" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户" id="username" autocomplete="off">
                        </div>
                        <div class="input_outer">
                            <span class="us_uer"></span>
                            <input name="pwd" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;" value="" type="password" placeholder="请输入密码" id="pwd">
                        </div>
                        <div class="mb2">
                            <input type="submit" value="登录" class="act-but submit" style="color: #FFFFFF" />
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            $(function() {

                $("form").submit(function() {

                    //获取用户名
                    var uname = $("#username").val().trim();

                    //密码
                    var pwd = $("#pwd").val().trim();

                    //正则表达式
                    var reg = /^[A-Za-z]{4,12}$/;

                    //验证
                    if (!reg.test(uname) || !reg.test(pwd)) {

                        layer.msg('用户名或密码有误！', {
                            shift: -1
                        }, function() {});

                    } else {

                        //ajax异步验证有效性
                        $.post('checklogin.php', {
                            'uname': uname,
                            'pwd': pwd
                        }, function(data) {
                            if (data == 'pass') {
                                layer.msg('登录成功！', function() {

                                    //跳转到后台管理系统主页
                                    location.href = "index.php";
                                });
                            } else {
                                layer.msg('登录失败！');
                            }
                        });

                    }

                    //始终阻止表单提交
                    return false;

                })

            })
        </script>
        <script src="js/TweenLite.min.js"></script>
        <script src="js/EasePack.min.js"></script>
        <script src="js/rAF.js"></script>
        <script src="js/demo-1.js"></script>
</body>

</html>