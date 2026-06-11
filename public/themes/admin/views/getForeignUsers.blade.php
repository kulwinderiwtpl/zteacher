
<h3 class="header smaller lighter blue mg-top12 mg-bottom20">国外用户管理中心</h3>
{{--<div class="widget-box">--}}
<div class="">
    <div>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <tr>
                <th>UID</th>
                <th>用户名</th>
                <th>邮箱</th>
                <th>联系电话</th>
                <th>操作</th>
            </tr>
            <tbody>
            @foreach($users as  $v )
                <tr>
                    <td>{{ $v['id'] }}</td>
                    <td>{{ $v['username'] }}</td>
                    <td>{{ $v['email'] }}</td>
                    <td>{{ $v['phone'] }}</td>
                    <td>
                        <div class="hidden-sm hidden-xs btn-group">
                            <a class="btn btn-xs btn-info" href="/manage/upForeignUsers/{!! $v->id !!}">
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
