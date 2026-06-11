<div class="container padding0">
    <form action="" class="container form layui-form" method="post">
        {{ csrf_field() }}
        <div class="titleBox">
            企业信息
        </div>
        <div class="inputWarp">
            <span class="leftTittle">机构名称：</span>
            <input type="text" name="school_name" value="{{ old('school_name') }}" class="inputBox"
                   placeholder="培训机构或学校名称">
            <strong style="color: red;">*</strong>
            <div style="color: red;">{!! $errors->first('school_name') !!}</div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">机构所在地：</span>
            <input type="text" name="location" value="{{ old('location') }}" class="inputBox" placeholder="">
            <strong style="color: red;">*</strong>
            <div style="color: red;">{!! $errors->first('location') !!}</div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">机构培训内容：</span>
            <input type="text" name="trainContent" value="{{ old('trainContent') }}" class="inputBox" placeholder="">
            <strong style="color: red;">*</strong>
            <div style="color: red;">{!! $errors->first('trainContent') !!}</div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle sTitle">是否是连锁企业：</span>
            <div class="layui-input-block inputBox" style="border: none">
                <input type="radio" name="is_chain" value="1" @if(1 == old('is_chain')) checked @endif title="是">
                <input type="radio" name="is_chain" value="0" @if(0 == old('is_chain')) checked @endif title="否">
            </div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle tittleLang sTitle">有无办理教学签证资质：</span>
            <div class="layui-input-block inputBox" style="border: none">
                <input type="radio" name="is_qualification" value="1" @if(1 == old('is_chain')) checked
                       @endif title="有">
                <input type="radio" name="is_qualification" value="0" @if(0 == old('is_chain')) checked
                       @endif title="无">
            </div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">联系人：</span>
            <input type="text" name="lxr_name" value="{{ old('lxr_name') }}" class="inputBox" placeholder="">
            <strong style="color: red;">*</strong>
            <div style="color: red;">{!! $errors->first('lxr_name') !!}</div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">EMAIL：</span>
            <input type="email" name="email" value="{{ old('email') }}" class="inputBox" placeholder="">
            <strong style="color: red;">*</strong>
            <div style="color: red;">{!! $errors->first('email') !!}</div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">电话：</span>
            <input type="tel" name="phone" value="{{ old('phone') }}" class="inputBox" placeholder="">
            <strong style="color: red;">*</strong>
            <div style="color: red;">{!! $errors->first('phone') !!}</div>
        </div>
        <div class="titleBox">
            账户信息
        </div>
        <div class="inputWarp">
            <span class="leftTittle">用户名：</span>
            <input type="text" name="username" value="{{ old('username') }}" class="inputBox" placeholder="">
            <strong style="color: red;">*</strong>
            <div style="color: red;">{!! $errors->first('username') !!}</div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">密码：</span>
            <input type="password" name="password" value="{{ old('password') }}" class="inputBox" placeholder="">
            <strong style="color: red;">*</strong>
            <div style="color: red;">{!! $errors->first('password') !!}</div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">确认密码：</span>
            <input type="password" name="confirmPassword" value="{{ old('confirmPassword') }}" class="inputBox" placeholder="">
            <strong style="color: red;">*</strong>
            <div style="color: red;">{!! $errors->first('confirmPassword') !!}</div>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">验证码：</span>
            <input type="text" name="validate_code" class="inputBox verificationCodeInput" placeholder="">
            <a href="javascript:void(0)" class="verificationCodeWarp">
                <img src="{{ url('/getValidateCode') }}" class="bk_validate_code" alt="" title="看不清，换一张">
                {{--<span class="bk_validate_code">换一张</span>--}}
            </a>
            <div style="color: red;">{!! $errors->first('validate_code') !!}</div>
        </div>
        <button class="submit" type="submit">立即提交</button>
    </form>

</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('register','zhuojiao/css/register.css') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpickerData','zhuojiao/js/distpicker.data.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker','zhuojiao/js/distpicker.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('main','zhuojiao/js/main.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('upload','zhuojiao/js/upload.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('register','zhuojiao/js/register.js') !!}
