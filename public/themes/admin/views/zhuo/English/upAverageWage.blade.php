<div class="chamberCommercelist-content">
    <!--工作信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">平均工资 编辑</h1>
        </div>
    </div>

    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $averageWage['id'] }}"/>
        <div class="layui-form-item">
            <label class="layui-form-label">教育者类型：</label>
            <div class="layui-input-block">
                <input type="text" name="genre" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $averageWage['genre'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">1级城市一般工资范围：</label>
            <div class="layui-input-block">
                <input type="text" name="tier1" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $averageWage['tier1'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">1级城市美元计价：</label>
            <div class="layui-input-block">
                <input type="text" name="tier1En" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $averageWage['tier1En'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">2级城市一般工资范围：</label>
            <div class="layui-input-block">
                <input type="text" name="tier2" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $averageWage['tier2'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">2级城市美元计价：</label>
            <div class="layui-input-block">
                <input type="text" name="tier2En" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $averageWage['tier2En'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">3级城市一般工资范围：</label>
            <div class="layui-input-block">
                <input type="text" name="tier3" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $averageWage['tier3'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">3级城市美元计价：</label>
            <div class="layui-input-block">
                <input type="text" name="tier3En" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $averageWage['tier3En'] }}">
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
{!! Theme::asset()->container('custom-js')->usePath()->add('upAverageWage', 'zhuojiao/js/English/upAverageWage.js') !!}