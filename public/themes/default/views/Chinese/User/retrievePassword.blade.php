<div class="topBarM hidden-sm hidden-lg hidden-md">
    <a href="javascript:history.go(-1)" class="back iconfont icon-xiaochengxuzititubiao-"> </a>
    <div class="text">找回密码</div>

</div>
<div class="container padding0">
    <form action="" class="container form layui-form" method="post">
        {{ csrf_field() }}
        <div class="titleBox">
            找回密码
        </div>
        <div style="color: red;text-align: center;"><h3>{!! $errors->first('resetPassword') !!}</h3></div>
        <div style="clear: both"></div>
        <div class="inputWarp">
            <span class="leftTittle">邮箱：</span>
            <input type="email" name="email" value="{{ old('email') }}" class="inputBox" placeholder="" id="phoneNumber">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">验证码：</span>
            <input type="text" name="validate_code" class="inputBox verificationCodeInput" placeholder="">
            <a href="javascript:void(0)" class="verificationCodeWarp">
                <img src="/getValidateCode" class="bk_validate_code" title="看不清，换一张"  alt="">
            </a>
        </div>
        <button lay-submit lay-filter="formDemo" class="submit" type="submit">立即提交</button>
    </form>

</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('register','zhuojiao/css/register.css') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker_data','zhuojiao/js/distpicker.data.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker','zhuojiao/js/distpicker.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('main','zhuojiao/js/main.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('upload','zhuojiao/js/upload.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('retrievePassword','zhuojiao/js/retrievePassword.js') !!}
