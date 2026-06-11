<div class="topBarM hidden-sm hidden-lg hidden-md">
    <a href="javascript:history.go(-1)" class="back iconfont icon-xiaochengxuzititubiao-"> </a>
    <div class="text">Reset Password</div>
</div>
<div class="container padding0">
    <form action="" class="container form layui-form" method="post">
        {{ csrf_field() }}
        <div class="titleBox">
            Change password
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Current Password：</span>
            <input type="password" name="oldPassword" class="inputBox" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">New Password：</span>
            <input type="password" name="password" class="inputBox" placeholder="Please enter a 6-18 number password">
        </div>
        <div class="inputWarp">
            <span class="leftTittle linh15">Confirm Password：</span>
            <input type="password" name="confirmPassword" class="inputBox" placeholder="Please enter a 6-18 number password">
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
{!! Theme::asset()->container('custom-js')->usepath()->add('retrievePassword','zhuojiao/English/js/upPassword.js') !!}