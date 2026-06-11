<h3 class="header smaller lighter blue mg-top12 mg-bottom20">聘请管理</h3>
{{--<div class="widget-box">--}}
<div class="">
    <div>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <tr>
                <th>开始时间</th>
                <th>合同期限</th>
                <th>需求数量</th>
                <th>学历</th>
                <th>科目要求</th>
                <th>性别</th>
                <th>年龄</th>
                <th>地点</th>
                <th>授课科目</th>
                <th>教学内容</th>
                <th>工资</th>
                <th>住宿</th>
                <th>对外教有无基础中文培训</th>
                <th>操作</th>
            </tr>
            <tbody>
            @foreach($recruits as  $v )
                <tr>
                    <td>{{ $v['start_time'] }}</td>
                    <td>{{ $v['deadline'] }}</td>
                    <td>{{ $v['count'] }}</td>
                    <td>{{ $v['education'] }}</td>
                    <td>{{ $v['course'] }}</td>
                    <td>{{ $v['sex'] }}</td>
                    <td>{{ $v['age'] }}</td>
                    <td>{{ $v['site'] }}</td>
                    <td>{{ $v['teach_course'] }}</td>
                    <td>{{ $v['teach_content'] }}</td>
                    <td>{{ $v['salary'] }}</td>
                    <td>{{ $v['putUp'] }}</td>
                    <td>{{ $v['is_train'] }}</td>
                    <td>
                        <div class="hidden-sm hidden-xs btn-group">
                            <a class="btn btn-xs btn-info" href="/manage/upEngage/{!! $v->id !!}">
                                <i class="fa fa-edit bigger-120"></i>修改
                            </a>
                        </div>
                        {{--<div class="hidden-sm hidden-xs btn-group">
                            <a class="btn btn-xs btn-danger" href="/manage/delservice/{!! $v->id !!}">
                                <i class="fa fa-edit bigger-120"></i>刪除
                            </a>
                        </div>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
       {{-- <div class="col-xs-12">
            <div class="dataTables_info row" id="sample-table-2_info" role="status" aria-live="polite">
                <a href="/manage/addservice">
                    <button class="btn btn-sm btn-primary">添加</button>
                </a>
            </div>
        </div>--}}
        <div class="space-10 col-xs-12"></div>
        <div class="col-xs-12">
            <div class="dataTables_paginate paging_bootstrap text-right row">
                {!! $recruits->render() !!}
            </div>
        </div>
    </div>
</div>
</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('backstage', 'css/backstage/backstage.css') !!}