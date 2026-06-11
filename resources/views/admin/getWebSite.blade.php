<div class="widget-header mg-bottom20 mg-top12 widget-well">
    <div class="widget-toolbar no-border pull-left no-padding">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="/manage/website">站点配置</a>
            </li>
        </ul>
    </div>
</div><!-- <div class="dataTables_borderWrap"> -->

<!-- PAGE CONTENT BEGINS -->
<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="/manage/webSite">
{!!  csrf_field() !!}
<!-- #section:elements.form -->
    <input hidden name="id" value="{{ $data['id'] }}">
    <div class="g-backrealdetails clearfix bor-border interface">
        <div class="space-8 col-xs-12"></div>
        <div class="form-group interface-bottom col-xs-12">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">网站logo</label>

            <div class="col-sm-4">
                <div class="memberdiv pull-left">
                    <div class="position-relative">

                        <div id="imgdiv1">
                            @if(isset($data['logo']))
                                <img id="imgShow1" width="120" height="120" src="{{url($data['logo'])}}" />
                            @else
                                <img id="imgShow1" width="120" height="120"  />
                            @endif
                        </div>
                        <a class="filea btn btn-sm btn-primary btn-block" href="javascript:void(0);">
                            上传logo
                            <input class="btn-file" type="file" id="up_img1" name="logo" />
                        </a>
                        {{--<input multiple="" type="file" id="id-input-file-3" name="web_logo_1"/>--}}
                        {{--@if($site['site_logo_1'])--}}
                        {{--<img src="{!! url($site['site_logo_1']) !!}" width="240" height="40">--}}
                        {{--@endif--}}
                    </div>
                </div>
            </div>
           {{-- <div class="col-sm-5 cor-gray87"><i class="fa fa-exclamation-circle cor-orange text-size18"></i> LOGO1位于网站前台首栏以及帐号激活邮件内,建议图片尺寸315px*79px</div>--}}
        </div>
        <div class="form-group interface-bottom col-xs-12">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">公司电话</label>

            <div class="col-sm-4">
                <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-12" name="phone"
                       @if(isset($data['phone']))value="{{$data['phone']}}"@endif/>
            </div>
            {{--<div class="col-sm-5 h5 cor-gray87"><i class="fa fa-exclamation-circle cor-orange text-size18"></i> 将显示在页面底部的联系方式处</div>--}}
        </div>
        <div class="form-group interface-bottom col-xs-12">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">公司地址</label>

            <div class="col-sm-4">
                <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-12" name="location"
                       @if(isset($data['location']))value="{{$data['location']}}" @endif/>
            </div>
            {{--<div class="col-sm-5 h5 cor-gray87"><i class="fa fa-exclamation-circle cor-orange text-size18"></i> 将显示在页面底部的联系方式处</div>--}}
        </div>
        <div class="form-group interface-bottom col-xs-12">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">公司地址(English)</label>

            <div class="col-sm-4">
                <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-12" name="address"
                       @if(isset($data['address']))value="{{$data['address']}}" @endif/>
            </div>
            {{--<div class="col-sm-5 h5 cor-gray87"><i class="fa fa-exclamation-circle cor-orange text-size18"></i> 将显示在页面底部的联系方式处</div>--}}
        </div>
        <div class="form-group interface-bottom col-xs-12">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">微信</label>

            <div class="col-sm-4">
                <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-12" name="weChat"
                       @if(isset($data['weChat']))value="{{$data['weChat']}}"@endif/>
            </div>
            {{--<div class="col-sm-5 h5 cor-gray87"><i class="fa fa-exclamation-circle cor-orange text-size18"></i> 将显示在页面底部的联系方式处</div>--}}
        </div>
        <div class="form-group interface-bottom col-xs-12">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">联系邮箱</label>

            <div class="col-sm-4">
                <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-12" name="email"
                       @if(isset($data['email']))value="{{$data['email']}}"@endif/>
            </div>
            {{--<div class="col-sm-5 h5 cor-gray87"><i class="fa fa-exclamation-circle cor-orange text-size18"></i> 将显示在页面底部的联系邮箱处</div>--}}
        </div>
        <div class="form-group interface-bottom col-xs-12">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">页脚版权信息</label>

            <div class="col-sm-4">
                <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-12" name="copyright"
                       @if(isset($data['copyright']))value="{{$data['copyright']}}"@endif/>
            </div>
            {{--<div class="col-sm-5 h5 cor-gray87"><i class="fa fa-exclamation-circle cor-orange text-size18"></i> 将显示在页面底部的联系邮箱处</div>--}}
        </div>
        <div class="form-group interface-bottom col-xs-12">
            <label class="col-sm-1 control-label no-padding-right" for="form-field-1">二维码</label>

            <div class="col-sm-4">
                <div class="memberdiv pull-left">
                    <div class="position-relative">

                        <div id="imgdiv2">
                            @if(isset($data['qrcode']) &&$data['qrcode'])
                                <img id="imgShow2" width="120" height="120" src="{{url($data['qrcode'])}}" />
                            @else
                                <img id="imgShow1" width="120" height="120"  />
                            @endif
                        </div>

                        <a class="filea btn btn-sm btn-primary btn-block" href="javascript:void(0);">
                            上传logo
                            <input class="btn-file" type="file" id="up_img2" name="qrcode" />
                        </a>
                        {{--<input multiple="" type="file" id="id-input-file-3img" name="web_logo_2"/>--}}
                        {{--@if($site['site_logo_2'])--}}
                        {{--<img src="{!! url($site['site_logo_2']) !!}" width="170" height="25" class="" style="background-color: #000;opacity: 0.2;">--}}
                        {{--@endif--}}
                    </div></div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="clearfix row bg-backf5 padding20 mg-margin12">
                <div class="col-xs-12">
                    <div class="col-sm-1 text-right"></div>
                    <div class="col-sm-10"><button type="submit" class="btn btn-sm btn-primary">提交</button></div>
                </div>
            </div>
        </div>

    </div>
</form>



{!! Theme::asset()->container('specific-js')->usepath()->add('datepicker', 'plugins/ace/css/bootstrap-datetimepicker/datepicker.css') !!}
{!! Theme::asset()->container('specific-js')->usepath()->add('jquery.webui-popover', '/plugins/jquery/css/jquery.webui-popover.min.css') !!}
{!! Theme::asset()->container('custom-css')->usepath()->add('backstage', 'css/backstage/backstage.css') !!}

{{--上传图片--}}
{!! Theme::asset()->container('specific-js')->usepath()->add('custom', 'plugins/ace/js/jquery-ui.custom.min.js') !!}
{!! Theme::asset()->container('specific-js')->usepath()->add('touch-punch', 'plugins/ace/js/jquery.ui.touch-punch.min.js') !!}
{!! Theme::asset()->container('specific-js')->usepath()->add('chosen', 'plugins/ace/js/chosen.jquery.min.js') !!}
{!! Theme::asset()->container('specific-js')->usepath()->add('autosize', 'plugins/ace/js/jquery.autosize.min.js') !!}
{!! Theme::asset()->container('specific-js')->usepath()->add('inputlimiter', 'plugins/ace/js/jquery.inputlimiter.1.3.1.min.js') !!}
{!! Theme::asset()->container('specific-js')->usepath()->add('maskedinput', 'plugins/ace/js/jquery.maskedinput.min.js') !!}

{!! Theme::asset()->container('custom-js')->usepath()->add('jquery_dataTables', 'plugins/ace/js/jquery.dataTables.bootstrap.js') !!}

{!! Theme::asset()->container('custom-js')->usepath()->add('configsite', 'js/doc/configsite.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('uploadimg', 'js/doc/uploadimg.js') !!}
{!! Theme::widget('uploadimg')->render() !!}