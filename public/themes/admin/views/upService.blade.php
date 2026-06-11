<h3 class="header smaller lighter blue mg-bottom20 mg-top12">修改</h3>

<form class="form-horizontal" action="/manage/upService" method="post" enctype="multipart/form-data" id="ad">
    {{ csrf_field() }}
    <div class="widget-body">
        <div class="">
            <div class="g-backrealdetails clearfix bor-border">
                <table class="table table-hover">
                    <tbody>
                    @if(isset($service))
                        <input type="hidden" name="id" value="{{ $service->id }}">
                    @endif
                    <tr>
                        <td class="text-right">服务类型：</td>
                        <td>
                            <input class="col-xs-10 col-sm-5" type="text" name="title" datatype="*" nullmsg="请填写服务类型！"
                                   value="{!! isset($service)?$service->title : '' !!}">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">介绍：</td>
                        <td>
                            <input class="col-xs-10 col-sm-5" type="text" name="introduce" datatype="*" nullmsg="请填写介绍！"
                                   value="{!! isset($service)?$service->introduce : '' !!}">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">内容：</td>
                        <td>
                            <textarea name="content" cols="40" datatype="*" nullmsg="请填写内容！"
                                      rows="3">{!! isset($service)?$service->content : '' !!}</textarea>
                            <i style="color: #f77!important;">**多条用【回车】断开<br></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right"></td>
                        <td class="text-left">
                            <button type="submit" class="btn btn-primary btn-sm">提交</button>
                            <a href="javascript:history.back()" title="" class=" add-case-concel">返回</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>

{!! Theme::asset()->container('custom-css')->usePath()->add('backstage', 'css/backstage/backstage.css') !!}
{!! Theme::asset()->container('specific-css')->usePath()->add('bootstrap-datetimepicker.css', 'plugins/ace/css/bootstrap-datetimepicker.css') !!}
{!! Theme::asset()->container('specific-js')->usePath()->add('fuelux.spinner.min.js', 'plugins/ace/js/fuelux/fuelux.spinner.min.js') !!}
{!! Theme::asset()->container('specific-js')->usePath()->add('moment', 'plugins/ace/js/date-time/moment.min.js') !!}
{!! Theme::asset()->container('specific-js')->usePath()->add('datepickertime-js', 'plugins/ace/js/date-time/bootstrap-datetimepicker.min.js') !!}
{!! Theme::asset()->container('custom-js')->usePath()->add('datefuelux-js', 'js/doc/datefuelux.js') !!}
{!! Theme::asset()->container('specific-css')->usepath()->add('validform-css','plugins/jquery/validform/css/style.css') !!}
{!! Theme::asset()->container('specific-js')->usepath()->add('validform-js','plugins/jquery/validform/js/Validform_v5.3.2_min.js') !!}
