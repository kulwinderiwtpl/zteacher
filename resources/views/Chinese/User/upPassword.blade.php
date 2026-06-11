<div class="topBarM hidden-sm hidden-lg hidden-md">
    <a href="javascript:history.go(-1)" class="back iconfont icon-xiaochengxuzititubiao-"> </a>
    <div class="text">修改密码</div>

</div>
<div class="container padding0">
    <form action="" class="container form layui-form" method="post">
        {{ csrf_field() }}
        <div class="titleBox">
            修改密码
        </div>
        <div class="inputWarp">
            <span class="leftTittle">当前密码：</span>
            <input type="password" name="oldPassword" value="{{ old('oldPassword')}}" class="inputBox" placeholder=""
                   id="phoneNumber">
            <div style="color: red;">{!! $errors->first('oldPassword') !!}</div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">新密码：</span>
            <input type="password" name="password" value="" class="inputBox" placeholder=""
                   id="phoneNumber">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">确认密码：</span>
            <input type="password" name="confirmPassword" value="" class="inputBox" placeholder=""
                   id="phoneNumber">
        </div>
        <button lay-submit lay-filter="formDemo" class="submit" type="submit">立即提交</button>
    </form>

</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('register','zhuojiao/css/register.css') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker_data','zhuojiao/js/distpicker.data.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker','zhuojiao/js/distpicker.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('main','zhuojiao/js/main.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('upload','zhuojiao/js/upload.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('retrievePassword','zhuojiao/js/upPassword.js') !!}
