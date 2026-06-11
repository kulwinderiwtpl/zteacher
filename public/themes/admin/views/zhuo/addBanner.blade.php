<!--表单提交内容-->
<div class="chamberCommercelist-content">
    <div class="app-title">
        <div>
            <h1>Banner添加</h1>
        </div>
    </div>

    <!--表单-->
    <form class="layui-form" action="">
        <input type="hidden" name="return_url" value="{{ $return_url }}">
        <div class="layui-form-item">
            <label class="layui-form-label">栏目名称</label>
            <div class="layui-input-block">
                <div class="layui-input-inline" style="width: 150px;">
                    <select name="nav_id" lay-verify="required" lay-search lay-filter="article">
                        <option value="0">请选择</option>
                        @foreach($navs as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Banner图片</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                {{--<input style="" type="file" name="file" id="Album_img" accept="image/gif,image/jpeg,image/x-png"
                       onChange="preview(this)"/>--}}
                <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                <i style="color: #f77;">#建议上传图片大小（1920*760）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序：</label>
            <div class="layui-input-block">
                <input type="text" name="sort" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="" style="width: 20%;">
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
{!! Theme::asset()->container('custom-js')->usePath()->add('addBanner', 'zhuojiao/js/addBanner.js') !!}