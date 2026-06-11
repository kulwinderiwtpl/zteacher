<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
    <title>Login</title>
    <link rel="stylesheet" href="/themes/default/assets/zhuojiao/English/layui/css/layui.css">
    <link rel="stylesheet" href="/themes/default/assets/zhuojiao/English/bootstrap-3.3.7/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/themes/default/assets/zhuojiao/English/swiper-4.2.2/dist/css/swiper.css">
    <link rel="stylesheet" href="/themes/default/assets/zhuojiao/English/iconFont/iconfont.css">
    <link rel="stylesheet" href="/themes/default/assets/zhuojiao/English/css/base.css">
    <link rel="stylesheet" href="/themes/default/assets/zhuojiao/English/css/nav.css">
    <link rel="stylesheet" href="/themes/default/assets/zhuojiao/English/css/same.css">
    <link rel="stylesheet" href="/themes/default/assets/zhuojiao/English/css/login.css">

</head>
<body>
<div id="header" style="background: #ffffff"></div>
<main class="main container-fluid padding0">
    <div class="container loginInner">
        <div class="topTittle">
            <a href="{{ url('/EN/register') }}" class="register">Membership Registration</a> | <a
                    href="javascript:void(0)" class="login">Member Login</a>
        </div>
        <form action="" class="layui-form" method="post">
            {{ csrf_field() }}
            <div class="inputWarp">
                <div class="inputBox">
                    <span class="hidden-xs">Email address：</span>
                    <span class="iconfont icon-wode hidden-md hidden-sm hidden-lg"> </span>
                    <input type="text" placeholder="Please enter your registered email address" name="username"
                           value="@if($email){{$email}}@else{{ old('username') }}@endif" id="">
                    <div class="erroMsg">{!! $errors->first('username') !!}</div>
                </div>
                <div class="inputBox">
                    <span class="hidden-xs">Password：</span>
                    <span class="iconfont icon-mima hidden-md hidden-sm hidden-lg"> </span>
                    <input type="password" placeholder="Please enter a 6-18 number password" name="password" value=""
                           id=" ">
                    <div class="erroMsg">{!! $errors->first('password') !!}</div>
                </div>
                <div class="layui-input-block inputBox2">
                    <input type="checkbox" name="remember" value="1" lay-skin="primary"
                           title="Automatically log in within two weeks">
                    <a href="{{ url('/EN/retrievePassword') }}" class="forgetPsw">and forget your password?</a>
                </div>
                <div style="clear: both"></div>
                <button class="loginButton">Sign in</button>
            </div>
            <div style="clear: both"></div>
        </form>
        <div style="clear: both"></div>
    </div>
</main>
<div id="footer"></div>
</body>
<script src="/themes/default/assets/zhuojiao/English/js/jquery-3.2.1.js"></script>
<script src="/themes/default/assets/zhuojiao/English/bootstrap-3.3.7/dist/js/bootstrap.js"></script>
<script src="/themes/default/assets/zhuojiao/English/layui/layui.js"></script>
<script src="/themes/default/assets/zhuojiao/English/js/same.js"></script>
<script>
    layui.use(['form'], function () {
        var form = layui.form;
    })
</script>
</html>