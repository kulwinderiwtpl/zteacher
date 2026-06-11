<div class="chamberCommercelist-content">
    <!--Join Us-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">Join Us</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li>
                <button class="layui-btn layui-btn-radius" id="joinusEnglishversionTitleEdit">栏目标题编辑</button>
            </li>
        </ul>
    </div>
</div>


<!--Register-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $register['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $navs[0]['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($register['image']))
                    <img id="uploadPictures" src="{{ url($register['image']) }}"/>
                @else
                    <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（456*341）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">介绍：</label>
            <div class="layui-input-block">
                <textarea name="introduce" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $register['introduce'] !!}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开</i>
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $register['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>

<!--Hiring Process-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $process['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $navs[1]['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img2">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($process['image']))
                    <img id="uploadPictures2" src="{{ url($process['image']) }}"/>
                @else
                    <img id="uploadPictures2" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（1184*256）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开</i>
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $process['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>

{!! Theme::asset()->container('custom-js')->usePath()->add('vue', 'zhuojiao/js/English/getJoinUs.js') !!}