<div class="chamberCommercelist-content">
    <!--工作信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">工作信息编辑</h1>
        </div>
    </div>

    <form class="layui-form" action="">
        <input type="hidden" name="id" value="{{ $work['id'] }}">
        <div class="layui-form-item">
            <label class="layui-form-label">机构名称：</label>
            <div class="layui-input-block">
                <input type="text" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $work['school_name'] }}"  disabled="disabled">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开始时间：</label>
            <div class="layui-input-block">
                <input type="text" name="start_time" id="date" autocomplete="off" class="layui-input"
                       value="{{ $work['start_time'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">合同期限：</label>
            <div class="layui-input-block">
                <input type="text" name="deadline" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $work['deadline'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">需求数量：</label>
            <div class="layui-input-block">
                <input type="text" name="count" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $work['count'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学历要求：</label>
            <div class="layui-input-block">
                <select name="education" {{--lay-verify="" lay-search lay-filter="article"--}} style="width: 100px;">
                    <option value="1" @if(1 == $work['education']) selected @endif>大专</option>
                    <option value="2" @if(2 == $work['education']) selected @endif>本科</option>
                    <option value="3" @if(3 == $work['education']) selected @endif>研究生</option>
                    <option value="4" @if(4 == $work['education']) selected @endif>博士</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学历科目要求：</label>
            <div class="layui-input-block">
                <select name="course" lay-verify="" lay-search lay-filter="article">
                    <option value="1" @if(1 == $work['course']) selected @endif>ESL</option>
                    <option value="2" @if(2 == $work['course']) selected @endif>English</option>
                    <option value="3" @if(3 == $work['course']) selected @endif>STEM</option>
                    <option value="4" @if(4 == $work['course']) selected @endif>AP course</option>
                    <option value="5" @if(5 == $work['course']) selected @endif>IB course</option>
                    <option value="6" @if(6 == $work['course']) selected @endif>A-LEVEL course</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">年龄及性别：</label>
            <div class="layui-input-block">
                <select name="sex" class="inputBox" id="gender">
                    <option value="0" @if(0 == $work['sex']) selected @endif>不限</option>
                    <option value="1" @if(1 == $work['sex']) selected @endif>男</option>
                    <option value="2" @if(2 == $work['sex']) selected @endif>女</option>
                </select>
                <select name="age" class="inputBox" id="age">
                    <option value="0" @if(0 == $work['age']) selected @endif>不限</option>
                    <option value="1" @if(1 == $work['age']) selected @endif>22-30</option>
                    <option value="2" @if(2 == $work['age']) selected @endif>30-40</option>
                    <option value="3" @if(3 == $work['age']) selected @endif>40-50</option>
                    <option value="4" @if(4 == $work['age']) selected @endif>50-65</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">授课地点：</label>
            <div class="layui-input-block">
                <input type="text" name="site" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $work['site'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">授课科目：</label>
            <div class="layui-input-block">
                <input type="text" name="teach_course" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $work['teach_course'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">授课内容：</label>
            <div class="layui-input-block">
                <textarea name="teach_content" placeholder="请输入内容" class="layui-textarea">{{ $work['teach_content'] }}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">课时安排：</label>
            <div class="layui-input-block">
                <textarea name="class_hour" placeholder="请输入内容" class="layui-textarea">{{ $work['class_hour'] }}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学生年龄段：</label>
            <div class="layui-input-block">
                <select name="ages_group" lay-verify="" lay-search lay-filter="article">
                    <option value="1" @if(1 == $work['ages_group']) selected @endif>0-8岁</option>
                    <option value="2" @if(2 == $work['ages_group']) selected @endif>8-12岁</option>
                    <option value="3" @if(3 == $work['ages_group']) selected @endif>12-16岁</option>
                    <option value="4" @if(4 == $work['ages_group']) selected @endif>16-20岁</option>
                    <option value="4" @if(5 == $work['ages_group']) selected @endif>20岁以上</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">税前工资：</label>
            <div class="layui-input-block">
                <select name="salary" class="inputBox" id="salary">
                    <option value="1" @if(1 == $work['salary']) selected @endif>＄2000-2500</option>
                    <option value="2" @if(2 == $work['salary']) selected @endif>＄2500-3500</option>
                    <option value="3" @if(3 == $work['salary']) selected @endif>＄3500+</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">福利：</label>
            <div class="layui-input-block">
                <input type="text" name="weal" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $work['weal'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">住宿：</label>
            <div class="layui-input-block">
                <input type="text" name="putUp" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $work['putUp'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">对外教有无基础中文培训：</label>
            <div class="layui-input-block" style="padding-top: 10px;">
                <input type="radio" name="is_train" value="1" title="是" @if(1 == $work['is_train']) checked @endif>
                <input type="radio" name="is_train" value="0" title="否" @if(!$work['is_train']) checked @endif>
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
{!! Theme::asset()->container('custom-js')->usePath()->add('upWork', 'zhuojiao/js/upWork.js') !!}