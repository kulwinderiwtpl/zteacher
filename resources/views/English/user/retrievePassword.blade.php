<div class="topBarM hidden-sm hidden-lg hidden-md">
    <a href="javascript:history.go(-1)" class="back iconfont icon-xiaochengxuzititubiao-"> </a>
    <div class="text">Retrieve Password</div>
</div>
<div class="container padding0">
    <form action="" class="container form layui-form" method="post">
        {{ csrf_field() }}
        <div class="titleBox">
            Account Information
        </div>
        <div style="color: red;"><h3>{!! $errors->first('resetPassword') !!}</h3></div>
        <div class="inputWarp">
            <span class="leftTittle linh15">Verify E-Mail Address：</span>
            <input type="email" name="email" value="{{ old('email') }}" class="inputBox" placeholder="" id="email">
        </div>
        <div class="inputWarp">
            <span class="leftTittle linh15">Verification Code：</span>
            <input type="text" name="validate_code" class="inputBox verificationCodeInput" placeholder="">
            <a href="javascript:void(0)" class="verificationCodeWarp">
                <img src="/getValidateCode" class="bk_validate_code" title="It's too vague. Change it"  alt="">
            </a>
        </div>
        <button lay-submit lay-filter="formDemo" class="submit" type="submit">Determine</button>
    </form>

</div>
{!! Theme::asset()->container('custom-css')->usepath()->add('layui','zhuojiao/English/layui/css/layui.css') !!}
{!! Theme::asset()->container('custom-css')->usepath()->add('retrievePassword','zhuojiao/English/css/retrievePassword.css') !!}




{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker_data','zhuojiao/English/js/distpicker.data.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker','zhuojiao/English/js/distpicker.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('main','zhuojiao/English/js/main.js') !!}
    {!! Theme::asset()->container('custom-js')->usepath()->add('upload','zhuojiao/English/js/upload.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('layui','zhuojiao/English/layui/layui.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('retrievePassword','zhuojiao/English/js/retrievePassword.js') !!}