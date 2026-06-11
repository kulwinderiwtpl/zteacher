@extends('admin.layouts.admin')
@section('title', '人才库')
@section('content')
<div class="chamberCommercelist-content">
    <!--注册会员-->
    <div class="app-title">
        <div>
            <h1>外教人才库</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li>
                <button class="layui-btn layui-btn-radius" id="foreignTeacherTalentPoolAdd">添加</button>
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
            <col width="100">
            <col width="100">
            <col width="100">
            <col class="min" width="250">
        </colgroup>
        <thead>
        <tr>
            <th>姓名</th>
            <th>照片</th>
            <th>国籍</th>
            <th>年龄</th>
            <th>性别</th>
            <th>学历</th>
            <th>教学经验</th>
            <th>专业</th>
            <th>证书</th>
            <th>所在地</th>
            <th>工作性质</th>
            <th>开始工作时间</th>
            <th>期望薪资</th>
            <th>工作地要求</th>
            <th>简历</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $v)
            <tr>
                <td>{{ !empty($v['frist_name'])?$v['frist_name']:'' }}</td>
                <td>
                    @if(!empty($v['picture1']))
                        <img src="{{ url($v['picture1'])}}"/>
                    @endif
                </td>
                <td>{{ !empty($v['nationality'])?$v['nationality']:'未知' }}</td>
                <td>{{ !empty($v['age'])?$v['age']:'未知' }}</td>
                <td>@if($v['sex'])男@else女@endif</td>
                <td>{{ !empty($v['degree'])?$v['degree']:'' }}</td>
                <td>{{ !empty($v['teaching_experience'])?$v['teaching_experience']:'' }}</td>
                <td>{{ !empty($v['major'])?$v['major']:'' }}</td>
                <td>
                    @if($v['certified'] == 0)
                        无
                    @elseif($v['certified'] == 1)
                        <strong>TEFL</strong>
                    @elseif($v['certified'] == 2)
                        <strong>TESOL</strong>
                    @elseif($v['certified'] == 3)
                        <strong>TEFL 和 TESOL</strong>
                    @endif
                </td>
                <td>{{ !empty($v['current_location'])?$v['current_location']:'' }}</td>
                <td>
                    @if(!empty($v['work_area']))
                        @foreach($v['work_area'] as $work_area)
                            @if($work_area == 1)
                                幼儿园,
                            @elseif($work_area == 2)
                                小学,
                            @elseif($work_area == 3)
                                初中,
                            @elseif($work_area == 4)
                                高中,
                            @elseif($work_area == 5)
                                大学,
                            @elseif($work_area == 6)
                                国际学校,
                            @elseif($work_area == 7)
                                私立语言中心,
                            @elseif($work_area == 8)
                                英语STEM中心,
                            @endif
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($v['likeTime'] == 1)
                        随时
                    @elseif($v['likeTime'] == 2)
                        3-4个月
                    @elseif($v['likeTime'] == 3)
                        6个月以上
                    @endif
                </td>
                <td>
                    @if($v['start_salary'] == 1)
                       $2000-2500
                    @elseif($v['start_salary'] == 2)
                        $2500-3500
                    @elseif($v['start_salary'] == 3)
                        $3500+
                    @endif
                </td>
                <td>
                    @if(!empty($v['work_location']))
                        @foreach($v['work_location'] as $work_location)
                            @if($work_location == 1)
                                一线城市,
                            @elseif($work_location == 2)
                                二线城市,
                            @elseif($work_location == 3)
                                三线城市,
                            @endif
                        @endforeach
                    @endif
                </td>
                <td>
                    @if(!empty($v['resume']))
                        <a ><span onclick="download({{$v}})" style="cursor:pointer;color: #009688;">下载附件</span></a>
                    @else
                        无
                    @endif
                </td>

                <td>
                    <!--编辑-->
                    <a href="{{ url('manage/upTalentPool/'.$v['id']) }}" class="update"><i class="iconfont icon-ai-edit"
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
        {!! $users->render() !!}
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ url('/themes/admin/assets/zhuojiao/js/talentPool.js') }}"></script>

@endsection
