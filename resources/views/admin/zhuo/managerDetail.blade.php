@extends('admin.layouts.admin')
@section('title', '修改密码')
@section('content')
<div class="chamberCommercelist-content">
    <!--工作信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">管理员密码修改</h1>
        </div>
    </div>

    <form class="layui-form" method="post">
        <input type="hidden" name="uid" value="{!! $info['id'] !!}">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名：</label>
            <div class="layui-input-block">
                <input type="text" required lay-verify="required" name="username" autocomplete="off"
                       class="layui-input add-input" value="{{ $info['username'] }}"  disabled="disabled">
            </div>
        </div>
        {{--<div class="layui-form-item">
            <label class="layui-form-label">密码：</label>
            <div class="layui-input-block">
                <input type="password" required lay-verify="required" name autocomplete="off"
                       class="layui-input add-input" name="password" value="{{ $info['password'] }}">
            </div>
        </div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">密码：</label>
            <div class="layui-input-block">
                <input type="password" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" name="oldPassword" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新密码：</label>
            <div class="layui-input-block">
                <input type="password" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" name="newPassword" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码：</label>
            <div class="layui-input-block">
                <input type="password" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" name="confirmPassword" value="">
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
<script src="{{ url('/themes/admin/assets/zhuojiao/js/managerDetail.js') }}"></script>

@endsection