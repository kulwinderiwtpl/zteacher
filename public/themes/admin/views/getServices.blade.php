<h3 class="header smaller lighter blue mg-top12 mg-bottom20">聘请服务管理</h3>
{{--<div class="widget-box">--}}
<div class="">
    <div>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
            <tr>
                <th>服务类型</th>
                <th>介绍</th>
                <th>内容</th>
                <th>操作</th>
            </tr>
            <tbody>
            @foreach($services as  $v )
                <tr>
                    <td>{{ $v['title'] }}</td>
                    <td>{{ $v['introduce'] }}</td>
                    <td>{{ $v['content'] }}</td>
                    <td>
                        <div class="hidden-sm hidden-xs btn-group">
                            <a class="btn btn-xs btn-info" href="/manage/upService/{!! $v->id !!}">
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
        {{--<div class="col-xs-12">
            <div class="dataTables_paginate paging_bootstrap text-right row">
                {!! $page->render() !!}
            </div>
        </div>--}}
    </div>
</div>
</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('backstage', 'css/backstage/backstage.css') !!}