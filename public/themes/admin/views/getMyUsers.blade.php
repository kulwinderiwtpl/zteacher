
<h3 class="header smaller lighter blue mg-top12 mg-bottom20">会员管理中心</h3>
{{--<div class="widget-box">--}}
<div class="">
    <div>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <tr>
                <th>UID</th>
                <th>用户名</th>
                <th>微信号码</th>
                <th>邮箱</th>
                <th>联系电话</th>
                <th>联系人</th>
                <th>培训机构/学校注册名称</th>
                <th>机构培训内容</th>
                <th>所在地</th>
                <th>连锁企业</th>
                <th>办理教学签证资质</th>
                <th>用户状态</th>
                <th>操作</th>
            </tr>
            <tbody>
            @foreach($users as  $v )
                <tr>
                    <td>{{ $v['id'] }}</td>
                    <td>{{ $v['username'] }}</td>
                    <td>{{ $v['weChat'] }}</td>
                    <td>{{ $v['email'] }}</td>
                    <td>{{ $v['phone'] }}</td>
                    <td>{{ $v['lxr_name'] }}</td>
                    <td>{{ $v['school_name'] }}</td>
                    <td>{{ $v['trainContent'] }}</td>
                    <td>{{ $v['location'] }}</td>
                    <td>{{ $v['is_chain'] }}</td>
                    <td>{{ $v['is_qualification'] }}</td>
                    <td>{{ $v['status'] }}</td>
                    <td>
                        <div class="hidden-sm hidden-xs btn-group">
                            <a class="btn btn-xs btn-info" href="/manage/upMyUser/{!! $v->id !!}">
                                <i class="fa fa-edit bigger-120"></i>编辑
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
                {!! $users->render() !!}
            </div>
        </div>
    </div>
</div>
</div>
{!! Theme::asset()->container('custom-css')->usepath()->add('backstage', 'css/backstage/backstage.css') !!}
{!! Theme::asset()->container('custom-js')->usePath()->add('checked-js', 'js/checkedAll.js') !!}
