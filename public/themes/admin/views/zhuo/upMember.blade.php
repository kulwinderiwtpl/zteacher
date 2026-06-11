<div class="chamberCommercelist-content">
    <!--会员信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">会员信息编辑</h1>
        </div>
    </div>

    <form class="layui-form" method="post">
        <input type="hidden" name="id" value="{{ $menber['id'] }}">
        <div class="layui-form-item">
            <label class="layui-form-label">培训机构或学校注册名称：</label>
            <div class="layui-input-block" style="padding-top: 10px;">
                <input type="text" name="school_name" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $menber['school_name'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">机构所在地：</label>
            <div class="layui-input-block">
                <input type="text" name="location" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $menber['location'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">机构培训内容：</label>
            <div class="layui-input-block">
                <input type="text" name="trainContent" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $menber['trainContent'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否是连锁企业：</label>
            <div class="layui-input-block" style="padding-top: 10px;">
                <input type="radio" name="is_chain" value="1" title="是" @if($menber['is_chain']) checked @endif>
                <input type="radio" name="is_chain" value="0" title="否" @if(!$menber['is_chain']) checked @endif>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">有无办理教学签证资质：</label>
            <div class="layui-input-block" style="padding-top: 10px;">
                <input type="radio" name="is_qualification" value="1" title="有" @if($menber['is_qualification']) checked @endif>
                <input type="radio" name="is_qualification" value="0" title="无" @if(!$menber['is_qualification']) checked @endif>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系人：</label>
            <div class="layui-input-block">
                <input type="text" name="lxr_name" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $menber['lxr_name'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Email：</label>
            <div class="layui-input-block">
                <input type="email" name="email" required lay-verify="email" autocomplete="off"
                       class="layui-input add-input" value="{{ $menber['email'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">电话：</label>
            <div class="layui-input-block">
                <input type="text" name="phone" required {{--lay-verify="phone"--}} autocomplete="off"
                       class="layui-input add-input" value="{{ $menber['phone'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">微信：</label>
            <div class="layui-input-block">
                <input type="text" name="weChat" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $menber['weChat'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名：</label>
            <div class="layui-input-block">
                <input type="text" name="username" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $menber['username'] }}">
            </div>
        </div>
        {{--<div class="layui-form-item">
            <label class="layui-form-label">密码：</label>
            <div class="layui-input-block">
                <input type="text" name="password" required lay-verify="required" autocomplete="off" class="layui-input add-input" value="">
            </div>
        </div>--}}
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn submit-return" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="button" id="goback" class="layui-btn submit-return">返回</button>
            </div>
        </div>
    </form>
</div>
{!! Theme::asset()->container('custom-js')->usePath()->add('upMember', 'zhuojiao/js/English/upMember.js') !!}