@extends('admin.layouts.admin')
@section('title', 'Banner')
@section('content')
<!--商会列表内容-->
<div class="chamberCommercelist-content">
    <div class="app-title">
        <div>
            <h1>Banner</h1>
        </div>
        <!--表单-->
        <form class="layui-form" action="{{url('manage/'.$url)}}" method="get">
            <ul class="app-breadcrumb breadcrumb">
                <li>
                    <div class="layui-form layui-inline">
                        <div class="layui-inline">
                            <label class="layui-form-label">栏目名称：</label>
                            <div class="layui-input-inline" style="width: 150px;">
                                <select name="title" lay-verify="" lay-search lay-filter="article">
                                    <option value="0" selected>请选择</option>
                                    @foreach($navs as $k => $v)
                                        <option value="{{ $k }}">{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <button style="margin: 0;width: 80px;" class="layui-btn submit-return layui-btn-radius"
                            lay-submit lay-filter="formDemo">查询
                    </button>
                </li>
            </ul>
        </form>
        <ul class="app-breadcrumb breadcrumb">
            <li>
                <input type="hidden" name="type" value="{{ $type }}">
                <button class="layui-btn layui-btn-radius" id="chineseBannerAdd">添加banner</button>
            </li>
        </ul>
    </div>

    <!--表格-->
    <table class="layui-table" lay-even lay-skin="nob">
        <colgroup>
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col class="min" width="100">
        </colgroup>
        <thead>
        <tr>
            <th>栏目名称</th>
            <th>Banner图片</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($banners as $v)
            <tr>
                <td>{{ $v['title'] }}</td>
                <td>@if(!empty($v['img']))<img src="{{ url($v['img']) }}"/>@endif</td>
                <td>{{ $v['sort'] }}</td>
                <td>
                    <!--编辑-->
                    <a href="{{ url('manage/upBanner/'.$v['id']) }}" class="update"><i class="iconfont icon-ai-edit"
                                                                                       style="font-size: 25px; color: #919aaa;"></i></a>
                    <!--删除-->
                    <a href="javascript:void(0);" class="delete" data-id="{{ $v['id'] }}"><i
                                class="iconfont icon-chahao"
                                style="font-size: 25px; color: #919aaa;"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!--分页-->
    <div id="demo1">
        {!! $banners->render() !!}
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ url('/themes/admin/assets/zhuojiao/js/getBanners.js') }}"></script>
@endsection
