@extends('admin.layouts.admin')
@section('title', '关于我们')
@section('content')
<div class="chamberCommercelist-content">
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">关于我们</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li>
                <button class="layui-btn layui-btn-radius" id="aboutusTitleEdit">栏目标题编辑</button>
            </li>
        </ul>
    </div>
</div>

<!--公司介绍-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $company[0]['id'] }}">
        <div class="app-title">
            <!--展示文本-->
            <h3 class="introduce">{{ $navs[0]['title'] }} &nbsp;&nbsp;<span>{{ $navs[0]['titleEn'] }}</span></h3>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                {{--<input type="file" name="file" id="Album_img" value="" accept="image/gif,image/jpeg,image/x-png"
                       onChange="preview(this)"/>--}}
                @if(!empty($company[0]['image']))
                    <img id="uploadPictures" src="{{ url($company[0]['image']) }}"/>
                @else
                    <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（637*400）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $company[0]['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>
<a id="1"></a>
<!--我们的服务-->
<div class="chamberCommercelist-content">
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h3 class="service">{{ $navs[1]['title'] }}&nbsp;&nbsp;<span>{{ $navs[1]['titleEn'] }}</span></h3>
        </div>
    </div>

    <table id="demo" class="layui-table" lay-even lay-skin="nob" lay-filter="listof">
        <colgroup>
            <col width="100">
            <col width="100">
            <col width="100">
            <col class="min" width="100">
        </colgroup>
        <thead>
        <tr>
            <th>文章标题</th>
            <th>图片</th>
            <th>内容</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $v)
            <tr>
                <td>{{ $v['title'] }}</td>
                <td>
                    @if(!empty($v['image']))
                        <img src="{{ url($v['image']) }}">
                    @endif
                </td>
                <td>{{ $v['content'] }}</td>
                <td>
                    <!--编辑-->
                    <a href="{{ url('manage/upContent/'.$v['id'].'?return_url='.urlencode('aboutUs#1')) }}"
                       class="update"><i class="iconfont icon-ai-edit"
                                         style="font-size: 25px; color: #919aaa;"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!--我们的目标-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $goal[0]['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $navs[2]['title'] }}&nbsp;&nbsp;<span>{{ $navs[2]['titleEn'] }}</span></h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img2">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                {{--<input type="file" name="file" id="Album_img2" accept="image/gif,image/jpeg,image/x-png"
                       onChange="preview2(this)"/>--}}
                @if(!empty($goal[0]['image']))
                    <img id="uploadPictures2" src="{{ url($goal[0]['image']) }}"/>
                @else
                    <img id="uploadPictures2" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（637*400）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <i style="color: #f77;">多条数据请按【回车】键断开</i>
            <div class="layui-input-block">
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $goal[0]['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="{{ url('/themes/admin/assets/zhuojiao/js/aboutUs.js') }}"></script>
@endsection