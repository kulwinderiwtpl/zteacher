<div class="chamberCommercelist-content">
    <!--工作信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">{{ $parentNav_title }}---栏目标题编辑</h1>
        </div>
    </div>

    <form class="layui-form" action="">
        @foreach($navs as $k => $v)
            <div class="layui-form-item">
                <input type="hidden" name="id[]" value="{{ $v['id'] }}"/>
                <label class="layui-form-label">{{ $v['title'] }}：</label>
                <div class="layui-input-block">
                    <input type="text" name="title[]" required lay-verify="required" autocomplete="off"
                           class="layui-input add-input" value="{{ $v['title'] }}">
                </div>
                <div class="layui-input-block">
                    <input type="text" name="titleEn[]" required lay-verify="required" autocomplete="off"
                           class="layui-input add-input" value="{{ $v['titleEn'] }}">
                </div>
            </div>
        @endforeach
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn submit-return" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="button" id="goback" class="layui-btn submit-return">返回</button>
            </div>
        </div>
    </form>
</div>
{!! Theme::asset()->container('custom-js')->usePath()->add('navTitle', 'zhuojiao/js/navTitle.js') !!}