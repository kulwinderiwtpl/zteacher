<div class="chamberCommercelist-content">
    <!--工作信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">工作信息添加</h1>
        </div>
    </div>

    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">开始时间：</label>
            <div class="layui-input-block">
                <input type="text" name="start_time" id="date" autocomplete="off" class="layui-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">合同期限：</label>
            <div class="layui-input-block">
                <input type="text" name="deadline" required lay-verify="required" placeholder="请填写(例:2019-01-03 - 2020-01-03)" autocomplete="off" class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">需求数量：</label>
            <div class="layui-input-block">
                <input type="text" name="count" required lay-verify="required" placeholder="请填写  例：2人" autocomplete="off" class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学历要求：</label>
            <div class="layui-input-block">
                <select name="education" {{--lay-verify="" lay-search lay-filter="article"--}} style="width: 100px;">
                    <option value="1" selected>大专</option>
                    <option value="2" >本科</option>
                    <option value="3" >研究生</option>
                    <option value="4" >博士</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学历科目要求：</label>
            <div class="layui-input-block">
                <select name="course" class="inputBox" id="subject">
                    <option value="1">ESL</option>
                    <option value="2">English</option>
                    <option value="3">STEM</option>
                    <option value="4">AP course</option>
                    <option value="5">IB course</option>
                    <option value="6">A-LEVEL course</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">年龄及性别：</label>
            <div class="layui-input-block">
                <select name="sex" class="inputBox" id="gender">
                    <option value="0">不限</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
                <select name="age" class="inputBox" id="age">
                    <option value="0">不限</option>
                    <option value="1">22-30</option>
                    <option value="2">30-40</option>
                    <option value="3">40-50</option>
                    <option value="4">50-65</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">授课地点：</label>
            <div class="layui-input-block">
                <input type="text" name="site" required lay-verify="required" autocomplete="off" class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">授课科目：</label>
            <div class="layui-input-block">
                <input type="text" name="teach_course" required lay-verify="required" autocomplete="off" class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">授课内容：</label>
            <div class="layui-input-block">
                <textarea name="teach_content" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">课时安排：</label>
            <div class="layui-input-block">
                <textarea name="class_hour" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学生年龄段：</label>
            <div class="layui-input-block">
                <select name="ages_group" lay-verify="" lay-search lay-filter="article">
                    <option value="1" >0-8岁</option>
                    <option value="2" >8-12岁</option>
                    <option value="3" selected>12-16岁</option>
                    <option value="4" >16-20岁</option>
                    <option value="4" >20岁以上</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">税前工资：</label>
            <div class="layui-input-block">
                <select name="salary" class="inputBox" id="salary">
                    <option value="1">＄2000-2500</option>
                    <option value="2">＄2500-3500</option>
                    <option value="3">＄3500+</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">福利：</label>
            <div class="layui-input-block">
                <input type="text" name="weal" required lay-verify="required" autocomplete="off" class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">住宿：</label>
            <div class="layui-input-block">
                <input type="text" name="putUp" required lay-verify="required" autocomplete="off" class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">对外教有无基础中文培训：</label>
            <div class="layui-input-block" style="padding-top: 10px;">
                <input type="radio" name="is_train" value="1" title="是" checked>
                <input type="radio" name="is_train" value="0" title="否">
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
{!! Theme::asset()->container('custom-js')->usePath()->add('addWork', 'zhuojiao/js/addWork.js') !!}