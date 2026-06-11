<!--表单提交内容-->
<div class="chamberCommercelist-content">
    <div class="app-title">
        <div>
            <h1>外教标准编辑</h1>
        </div>
    </div>

    <!--表单-->
    <form class="layui-form" action="">
        <input type="hidden" name="id" value="{{ $standard['id'] }}">
        <input type="hidden" name="return_url" value="{{ $return_url }}">
        <div class="layui-form-item">
            <label class="layui-form-label">图片</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                {{--<input style="" type="file" name="file" id="Album_img" accept="image/gif,image/jpeg,image/x-png"
                       onChange="preview(this)"/>--}}
                @if(!empty($standard['image']))
                    <img id="uploadPictures" style="height: 80px;" src="{{ url($standard['image']) }}"/>
                @else
                    <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（80*80）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <textarea name="introduce" placeholder="请输入内容" class="layui-textarea layui-textareanew">{!! $standard['introduce'] !!}
                    </textarea>
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
{!! Theme::asset()->container('custom-js')->usePath()->add('upStandard', 'zhuojiao/js/upStandard.js') !!}