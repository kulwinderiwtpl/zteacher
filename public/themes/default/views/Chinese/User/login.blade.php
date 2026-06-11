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
    <title>登录</title>
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/bootstrap-3.3.7/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/swiper-4.2.2/dist/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/iconFont/iconfont.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/css/base.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/css/nav.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/css/same.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/css/login.css') }}">

</head>
<body>
<div id="header" style="background: #ffffff"></div>
<main class="main container-fluid padding0">
    <div class="container loginInner">
        <div class="topTittle">
            <a href="{{ url('/CN/register') }}" class="register">会员注册</a> | <a href="javascript:void(0)" class="login">会员登录</a>
        </div>
        <form action="" class="layui-form" method="post">
            {{ csrf_field() }}
            <div class="inputWarp">
                <div class="inputBox">
                    <span class="hidden-xs">注册邮箱：</span>
                    <span class="iconfont icon-wode hidden-md hidden-sm hidden-lg"> </span>
                    <input type="text" placeholder="请输入注册邮箱" name="username" value="@if($email){{ $email }}@else{{ old('username') }}@endif" id="">
                    <div class="erroMsg" >{!! $errors->first('username') !!}</div>
                </div>
                <div class="inputBox">
                    <span class="hidden-xs">密码：</span>
                    <span class="iconfont icon-mima hidden-md hidden-sm hidden-lg"> </span>
                    <input type="password" placeholder="请输入6~18数密码" name="password" value="" id=" ">
                    <div class="erroMsg">{!! $errors->first('password') !!}</div>
                </div>
                <div class="layui-input-block inputBox2">
                    <input type="checkbox" name="remember" value="1" lay-skin="primary" title="两周内自动登录" >
                    <a href="{{ url('CN/retrievePassword') }}" class="forgetPsw">忘记密码</a>
                </div>
                <div style="clear: both"></div>
                <button class="loginButton">立即登录</button>
            </div>
            <div style="clear: both"></div>
        </form>
        <div style="clear: both"></div>
    </div>
</main>
<div id="footer"></div>
</body>
<script src="{{ url('/themes/default/assets/zhuojiao/js/jquery-3.2.1.js') }}"></script>
<script src="{{ url('/themes/default/assets/zhuojiao/bootstrap-3.3.7/dist/js/bootstrap.js') }}"></script>
<script src="{{ url('/themes/default/assets/zhuojiao/layui/layui.js') }}"></script>
<script src="{{ url('/themes/default/assets/zhuojiao/js/same.js') }}"></script>
<script>
    layui.use(['form'], function () {
        var form = layui.form;
    })
</script>
</html>