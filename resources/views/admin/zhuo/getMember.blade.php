@extends('admin.layouts.admin')
@section('title', '会员信息')
@section('content')
<div class="chamberCommercelist-content">
    <!--注册会员-->
    <div class="app-title">
        <div>
            <h1>注册会员信息</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li>
                <button class="layui-btn layui-btn-radius" id="memberInformationAdd">添加</button>
            </li>
        </ul>
    </div>

    <!--表格-->
    <table id="demo" class="layui-table" lay-even lay-skin="nob" lay-filter="listof">
        <colgroup>
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col class="min" width="100">
        </colgroup>
        <thead>
        <tr>
            <th>培训机构或学校注册名称</th>
            <th>机构所在地</th>
            <th>机构培训内容</th>
            <th>是否是连锁企业</th>
            <th>有无办理教学签证资质</th>
            <th>联系人</th>
            <th>Email</th>
            <th>电话</th>
            <th>微信</th>
            <th>用户名</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($members as $v)
            <tr>
                <td>{{ $v['school_name'] }}</td>
                <td>{{ $v['location'] }}</td>
                <td>{{ $v['trainContent'] }}</td>
                <td>@if($v['is_chain']) 有 @else 无 @endif</td>
                <td>@if($v['is_qualification']) 有 @else 无 @endif</td>
                <td>{{ $v['lxr_name'] }}</td>
                <td>{{ $v['email'] }}</td>
                <td>{{ $v['phone'] }}</td>
                <td>{{ $v['weChat'] }}</td>
                <td>{{ $v['username'] }}</td>
                <td>
                    <!--编辑-->
                    <a href="{{ url('/manage/upMember/'.$v['id']) }}" class="update"><i class="iconfont icon-ai-edit"
                                                                                        style="font-size: 25px; color: #919aaa;"></i></a>
                    <!--删除-->
                    <a href="javascript:void(0);" class="delete" data-id="{{ $v['id'] }}"><i class="iconfont icon-chahao"
                                                                                 style="font-size: 25px; color: #919aaa;"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!--分页-->
    <div id="demo1">{!! $members->render() !!}</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ url('/themes/admin/assets/zhuojiao/js/English/getMember.js') }}"></script>

@endsection
