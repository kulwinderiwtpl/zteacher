<div class="topBarM hidden-sm hidden-lg hidden-md">
    <a href="javascript:history.go(-1)" class="back iconfont icon-xiaochengxuzititubiao-"> </a>
    <div class="text">重置密码</div>
</div>
<div class="container padding0">
    <form action="" class="container form layui-form" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="reset_password_token" value="{{ $reset_password_token }}">
        <div class="titleBox">
            重置密码
        </div>
        <div class="inputWarp">
            <span class="leftTittle">新密码：</span>
            <input type="password" name="password" class="inputBox" placeholder="请输入6-18位密码" required>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">确认密码：</span>
            <input type="password" name="confirmPassword" class="inputBox" placeholder="" required>
        </div>
        <button lay-submit lay-filter="formDemo" class="submit" type="submit">立即提交</button>
    </form>

</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('register','zhuojiao/css/register.css') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker_data','zhuojiao/js/distpicker.data.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker','zhuojiao/js/distpicker.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('main','zhuojiao/js/main.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('upload','zhuojiao/js/upload.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('resetPassword','zhuojiao/js/resetPassword.js') !!}
