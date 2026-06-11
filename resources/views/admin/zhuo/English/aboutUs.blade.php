@extends('admin.layouts.admin')
@section('title', 'About Us')
@section('content')
<div class="chamberCommercelist-content">
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">About Us</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li>
                <button class="layui-btn layui-btn-radius" id="aboutusEnglishversionTitleEdit">栏目标题编辑</button>
            </li>
        </ul>
    </div>
</div>
<!--Who We Are-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $company['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="introduce">{{ $navs[0]['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($company['image']))
                    <img id="uploadPictures" src="{{ url($company['image']) }}"/>
                @else
                    <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（456*341）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $company['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>

<!--What We Do-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $services['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="service">{{ $navs[1]['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img2">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($services['image']))
                    <img id="uploadPictures2" src="{{ url($services['image']) }}"/>
                @else
                    <img id="uploadPictures2" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（555*260）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <textarea name="content" placeholder="请输入内容" class="layui-textarea layui-textareanew"
                          style="height: 100px;">{!! $services['content'] !!}</textarea>
            </div>
        </div>

        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>

<!--Our mission and goals-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $goal['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $navs[2]['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img3">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($goal['image']))
                    <img id="uploadPictures3" src="{{ url($goal['image']) }}"/>
                @else
                    <img id="uploadPictures3" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（555*260）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <textarea name="content" placeholder="请输入内容" class="layui-textarea layui-textareanew"
                          style="height: 100px;">{!! $goal['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="{{ url('/themes/admin/assets/zhuojiao/js/English/aboutUs.js') }}"></script>

@endsection