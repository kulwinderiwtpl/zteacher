<div class="chamberCommercelist-content">
    <!--工作信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">平均工资 添加</h1>
        </div>
    </div>

    <form class="layui-form">
        <div class="layui-form-item">
            <label class="layui-form-label">教育者类型：</label>
            <div class="layui-input-block">
                <input type="text" name="type" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">1级城市消费：</label>
            <div class="layui-input-block">
                <input type="text" name="tier1" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">2级城市消费：</label>
            <div class="layui-input-block">
                <input type="text" name="tier2" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">3级城市消费：</label>
            <div class="layui-input-block">
                <input type="text" name="tier3" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
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
{!! Theme::asset()->container('custom-js')->usePath()->add('addConsumption', 'zhuojiao/js/English/addConsumption.js') !!}