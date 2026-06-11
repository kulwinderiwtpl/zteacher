<style type="text/css">
    .geetest_holder.geetest_wind {
        width: 100% !important;
    }
</style>

<form class="registerform" action="{!! url('register') !!}" method="post">
    {!! csrf_field() !!}
    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" class="form-control inputxt" name="username"
                                                   id="username" placeholder="用户名"
                                                   ajaxurl="{!! url('username') !!}" datatype="*4-15"
                                                   nullmsg="请输入用户名" errormsg="用户名长度为4到15位字符"
                                                   value="{{old('username')}}">
                                            <i class="ace-icon fa fa-user cor-grayD3"></i>
                                            <span class="Validform_checktip validform-login-form"></span>
                                        </span>
    </label>
    <div class="space-10"></div>
    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="text" class="form-control inputxt" name="validate_code"
                                                   placeholder="邮箱" ajaxurl="{!! url('validate_code') !!}" datatype="e"
                                                   nullmsg="请输入邮箱帐号" errormsg="邮箱地址格式不对！" value="{{old('email')}}">
                                             <i class="ace-icon fa  fa-envelope cor-grayD3"></i>
                                            <span class="Validform_checktip validform-login-form"></span>
                                        </span>
    </label>
    <div class="space-10"></div>
    <img src="/getValidateCode" class="bk_validate_code">
    <div class="error_wrong">发送打发第三方{!! $errors->first() !!}</div>
    {{--<label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="email" class="form-control inputxt" name="email"
                                                   placeholder="邮箱" ajaxurl="{!! url('checkEmail') !!}" datatype="e"
                                                   nullmsg="请输入邮箱帐号" errormsg="邮箱地址格式不对！" value="{{old('email')}}">
                                             <i class="ace-icon fa  fa-envelope cor-grayD3"></i>
                                            <span class="Validform_checktip validform-login-form"></span>
                                        </span>
    </label>
    <div class="space-10"></div>
    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="password" class="form-control inputxt" name="password"
                                                   placeholder="密码" datatype="*6-16" nullmsg="请输入密码"
                                                   errormsg="密码长度为6-16位字符">
                                            <i class="ace-icon fa fa-lock cor-grayD3"></i>
                                            <span class="Validform_checktip validform-login-form"></span>
                                        </span>
    </label>
    <div class="space-10"></div>
    <label class="block clearfix">
                                        <span class="block input-icon input-icon-right">
                                            <input type="password" class="form-control inputxt" name="confirmPassword"
                                                   placeholder="确认密码" datatype="*" recheck="password" nullmsg="请输入确认密码"
                                                   errormsg="两次密码不一致">
                                            <i class="ace-icon fa fa-lock cor-grayD3"></i>
                                            <span class="Validform_checktip validform-login-form"></span>
                                        </span>
    </label>
    <div class="space-10"></div>--}}
    <div>
        <button class=" btn btn-block btn-primary allbtn " type="submit">
            立即注册
        </button>
    </div>
    <div class="space-4"></div>
</form>

{!! Theme::asset()->container('specific-css')->usePath()->add('validform-css', 'plugins/jquery/validform/css/style.css') !!}
{{--{!! Theme::asset()->container('specific-js')->usePath()->add('validform-js', 'plugins/jquery/validform/js/Validform_v5.3.2_min.js') !!}--}}

<!-- 拖拽验证 -->
{{--{!! Theme::asset()->container('specific-js')->usepath()->add('gt', 'js/user/gt.js') !!}--}}

{!! Theme::asset()->container('custom-js')->usePath()->add('custom-validform-js', 'js/auth.js') !!}
{{--{!! Theme::asset()->container('custom-js')->usepath()->add('payphoneword','js/doc/payphoneword.js') !!}--}}
<script>
    $('.bk_validate_code').click(function () {
        $(this).attr('src','/getValidateCode?random=' + Math.random())
    });
</script>

