@extends('admin.layouts.admin')
@section('title', '联系我们')
@section('content')
<div class="chamberCommercelist-content">
    <!--工作信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">联系我们</h1>
        </div>
    </div>

    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $contactUs['id'] }}"/>
        <div class="layui-form-item">
            <label class="layui-form-label">电话：</label>
            <div class="layui-input-block">
                <input type="text" name="phone" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $contactUs['phone'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Email：</label>
            <div class="layui-input-block">
                <input type="text" name="email" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $contactUs['email'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">微信：</label>
            <div class="layui-input-block">
                <input type="text" name="weChat" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $contactUs['weChat'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">地址：</label>
            <div class="layui-input-block">
                <input type="text" name="location" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $contactUs['location'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">地址（English）：</label>
            <div class="layui-input-block">
                <input type="text" name="address" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $contactUs['address'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">二维码：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(empty($contactUs['qrcode']))
                    <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @else
                    <img id="uploadPictures" src="{{ url($contactUs['qrcode']) }}"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（125*127）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">版权信息：</label>
            <div class="layui-input-block">
                <input type="text" name="copyright" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $contactUs['copyright'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn submit-return" lay-submit lay-filter="formDemo">确认</button>
                {{--<button type="button" id="goback" class="layui-btn submit-return">返回</button>--}}
            </div>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ url('/themes/admin/assets/zhuojiao/js/contactUs.js') }}"></script>

@endsection