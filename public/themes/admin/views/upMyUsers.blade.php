{{--<div class="well">
	<h4 >编辑系统用户资料</h4>
</div>--}}
<h3 class="header smaller lighter blue mg-top12 mg-bottom20">编辑会员用户资料</h3>


<form class="form-horizontal clearfix registerform" role="form" action="{!! url('manage/upMyUser') !!}" method="post">
    {!! csrf_field() !!}
    <div class="g-backrealdetails clearfix bor-border">
        <input type="hidden" name="id" value="{!! $user['id'] !!}">
        <div class="bankAuth-bottom clearfix col-xs-12">
            <p class="col-sm-1 control-label no-padding-left" for="form-field-1" > 用户名：</p>
            <p class="col-sm-4">
                <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" value="{{ $user['username'] }}"  disabled="disabled">
                <span class="help-inline col-xs-12 col-sm-7">{{--<i class="light-red ace-icon fa fa-asterisk"></i>--}}</span>
            </p>
        </div>
        <div class="bankAuth-bottom clearfix col-xs-12">
            <p class="col-sm-1 control-label no-padding-left" for="form-field-1" >微信号：</p>
            <p class="col-sm-4">
                <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" value="{{ $user['weChat'] }}" name="weChat">
            </p>
        </div>
        <div class="bankAuth-bottom clearfix col-xs-12">
            <p class="col-sm-1 control-label no-padding-left" for="form-field-1"> 手机号码：</p>
            <p class="col-sm-4">
                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" value="{{ $user['phone'] }}"
                       name="phone">
            </p>
        </div>
        <div class="bankAuth-bottom clearfix col-xs-12">
            <p class="col-sm-1 control-label no-padding-left" for="form-field-1"> 电子邮箱：</p>
            <p class="col-sm-4">
                <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name="email" value="{{ $user['email'] }}" disabled="disabled" >
                <span class="help-inline col-xs-12 col-sm-7"></span>
            </p>
        </div>
        <div class="bankAuth-bottom clearfix col-xs-12">
            <p class="col-sm-1 control-label no-padding-left" for="form-field-1"> 联系人：</p>
            <p class="col-sm-4">
                <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name="lxr_name"
                       value="{{ $user['lxr_name'] }}">
                <span class="help-inline col-xs-12 col-sm-7"></span>
            </p>
        </div>
        <div class="bankAuth-bottom clearfix col-xs-12">
            <p class="col-sm-1 control-label no-padding-left" for="form-field-1"> 培训机构/学校注册名称：</p>
            <p class="col-sm-4">
                <input type="text" id="form-field-1" class="col-xs-10 col-sm-10" name="school_name"
                       value="{{ $user['school_name'] }}">
                <span class="help-inline col-xs-12 col-sm-7">{{--<i class="light-red ace-icon fa fa-asterisk"></i>--}}</span>
            </p>
        </div>
        {{--<div class="bankAuth-bottom clearfix col-xs-12">
            <p class="col-sm-1 control-label no-padding-left" for="form-field-1"> 出生日期：</p>
            <div class="col-sm-4">
                <p class="input-group input-group-sm col-xs-10 col-sm-4">
                    <input type="text" id="datepicker" class="form-control hasDatepicker" value="{{ $user['birth'] }}" name="birth">
                    <span class="input-group-addon">
					<i class="ace-icon fa fa-calendar"></i>
				</span>
                </p>
            </div>
        </div>
        <div class="bankAuth-bottom clearfix col-xs-12">
            <p class="col-sm-1 control-label no-padding-left" for="form-field-1"> 密码：</p>
            <p class="col-sm-4">
                <input type="password" id="form-field-1"  class="col-xs-10 col-sm-5"  name="password" datatype="*" value="{{ $user['password'] }}">
                <span class="help-inline col-xs-12 col-sm-7"><i class="light-red ace-icon fa fa-asterisk"></i></span>
            </p>
        </div>--}}
        {{--<div class="bankAuth-bottom clearfix col-xs-12">
                <p class="col-sm-1 control-label no-padding-left"></p>
                <p class="col-sm-4 text-left">
                    <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-check"></i>提交</button>
                </p>
        </div>--}}
        <div class="col-xs-12">
            <div class="clearfix row bg-backf5 padding20 mg-margin12">
                <div class="col-xs-12">
                    <div class="col-md-1 text-right"></div>
                    <div class="col-md-10">
                        <button class="btn btn-primary btn-sm" type="submit">提交</button>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="space col-xs-12"></div>
        <div class="col-xs-12">
            <div class="col-md-1 text-right"></div>
            <div class="col-md-10"><a href="">上一项</a>　　<a href="">下一项</a></div>
        </div>
        <div class="col-xs-12 space">

        </div>--}}
    </div>
</form>

{!! Theme::asset()->container('custom-css')->usePath()->add('back-stage-css', 'css/backstage/backstage.css') !!}
{!! Theme::asset()->container('specific-css')->usePath()->add('validform-css', 'plugins/jquery/validform/css/style.css') !!}
{!! Theme::asset()->container('specific-js')->usePath()->add('validform-js', 'plugins/jquery/validform/js/Validform_v5.3.2_min.js') !!}
{!! Theme::asset()->container('specific-css')->usePath()->add('datepicker-css', 'plugins/ace/css/datepicker.css') !!}
{!! Theme::asset()->container('specific-js')->usePath()->add('datepicker-js', 'plugins/ace/js/date-time/bootstrap-datepicker.min.js') !!}
{!! Theme::asset()->container('custom-js')->usePath()->add('userManage-js', 'js/manage.js') !!}
