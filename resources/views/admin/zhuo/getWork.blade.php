@extends('admin.layouts.admin')
@section('title', '招聘管理')
@section('content')
<div class="chamberCommercelist-content">
    <!--发布工作-->
    <div class="app-title">
        <div>
            <h1>发布工作</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li>
                <button class="layui-btn layui-btn-radius" id="publishedWorkMenuAdd">添加</button>
            </li>
        </ul>
    </div>

    <!--表格-->
    <table id="demo" class="layui-table" lay-even lay-skin="nob" lay-filter="listof">
        <colgroup>
            <col width="120">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="120">
            <col width="100">
            <col width="200">
            <col width="200">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col width="100">
            <col class="min" width="300">
        </colgroup>
        <thead>
        <tr>
            <th>机构名称</th>
            <th>开始时间</th>
            <th>合同期限</th>
            <th>需求数量</th>
            <th>学历要求</th>
            <th>学历科目要求</th>
            <th>年龄及性别</th>
            <th>授课地点</th>
            <th>授课科目</th>
            <th>授课内容</th>
            <th>课时安排</th>
            <th>学生年龄段</th>
            <th>税前工资</th>
            <th>福利</th>
            <th>住宿</th>
            <th>对外教有无基础中文培训</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($recruits as $v)
            <tr>
                <td>@if($v['school_name'] == '站内添加')
                        <strong>{{ $v['school_name'] }}</strong>@else{{ $v['school_name'] }}@endif</td>
                <td>{{ $v['start_time'] }}</td>
                <td>{{ $v['deadline'] }}</td>
                <td>{{ $v['count'] }}</td>
                <td>
                    @if($v['education'] == 1)
                        大专
                    @elseif($v['education'] == 2)
                        本科
                    @elseif($v['education'] == 3)
                        研究生
                    @elseif($v['education'] == 4)
                        博士
                    @endif
                </td>
                <td>
                    @if($v['course'] == 1)
                        ESL
                    @elseif($v['course'] == 2)
                        English
                    @elseif($v['course'] == 3)
                        STEM
                    @elseif($v['course'] == 4)
                        AP course
                    @elseif($v['course'] == 5)
                        IB course
                    @elseif($v['course'] == 6)
                        A-LEVEL course
                    @endif
                </td>
                <td>
                    @if($v['sex'] == 0)
                        不限
                    @elseif($v['sex'] == 1)
                        男
                    @elseif($v['sex'] == 2)
                        女
                    @endif/@if($v['age'] == 0)
                        不限
                    @elseif($v['age'] == 1)
                        22-30
                    @elseif($v['age'] == 2)
                        30-40
                    @elseif($v['age'] == 3)
                        40-50
                    @elseif($v['age'] == 4)
                        50-65
                    @endif</td>
                <td>{{ $v['site'] }}</td>
                <td>{{ $v['teach_course'] }}</td>
                <td>{{ $v['teach_content'] }}</td>
                <td>{{ $v['class_hour'] }}</td>
                <td>
                    @if($v['ages_group'] == 1)
                        0-8岁
                    @elseif($v['ages_group'] == 2)
                        8-12岁
                    @elseif($v['ages_group'] == 3)
                        12-16岁
                    @elseif($v['ages_group'] == 4)
                        16-20岁
                    @elseif($v['ages_group'] == 5)
                        20岁以上
                    @endif
                </td>
                <td>
                    @if($v['salary'] == 1)
                        ＄2000-2500
                    @elseif($v['salary'] == 2)
                        ＄2500-3500
                    @elseif($v['salary'] == 3)
                        ＄3500+
                    @endif
                    {{ $v['salary'] }}</td>
                <td>{{ $v['weal'] }}</td>
                <td>{{ $v['putUp'] }}</td>
                <td>@if($v['is_train']) 有 @else 无 @endif</td>
                <td>
                    <!--编辑-->
                    <a href="{{ url('manage/upWork/'.$v['id']) }}" class="update"><i class="iconfont icon-ai-edit"
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
    <div id="demo1">{!! $recruits->render() !!}</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ url('/themes/admin/assets/zhuojiao/js/getWork.js') }}"></script>

@endsection
