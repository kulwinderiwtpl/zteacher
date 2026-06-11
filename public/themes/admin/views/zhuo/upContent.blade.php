<div class="chamberCommercelist-content">
    <!--工作信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">{{ $title }}文章编辑</h1>
        </div>
    </div>

    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $content['id'] }}"/>
        <input type="hidden" name="return_url" value="{{ $return_url }}"/>
        <div class="layui-form-item">
            <label class="layui-form-label">标题：</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $content['title'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                {{--<input style="" type="file" name="file" id="Album_img" accept="image/gif,image/jpeg,image/x-png"
                       onChange="preview(this)"/>--}}
                @if(empty($content['image']))
                    <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @else
                    <img id="uploadPictures" src="{{ url($content['image']) }}"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（80*80）</i>
            </div>
        </div>
        {{--<div class="layui-form-item">
            <label class="layui-form-label">介绍：</label>
            <div class="layui-input-block">
                <input type="text" name="introduce" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $content['introduce'] }}">
            </div>
        </div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{{ $content['content'] }}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn submit-return" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="button" id="goback" class="layui-btn submit-return">返回</button>
            </div>
        </div>
    </form>
</div>
{!! Theme::asset()->container('custom-js')->usePath()->add('upContent', 'zhuojiao/js/upContent.js') !!}