<div class="container padding0 publishInner">
    <!--右-->
    <div class="rightBox rightBox1" style="width: 100%;">
        <div class="topTittle">发布工作——编辑</div>
        <form  class="form layui-form" method="post">
            <input type="hidden" name="id" value="{{ $work['id'] }}">
            {{ csrf_field() }}
            <div class="inputWarp">
                <span class="leftTittle">开始时间：</span>
                <input type="text" onclick="this.blur()" name="start_time" value="{{ $work['start_time'] }}"
                       class="layui-input inputBox" placeholder="请选择" id="time">
            </div>
            <div class="inputWarp">
                <span class="leftTittle">合同期限：</span>
                <input type="text" name="deadline" value="{{ $work['deadline'] }}" class="inputBox"
                       placeholder="请填写">
            </div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle ">需求数量：</span>
                <input type="text" name="count" value="{{ $work['count'] }}" class="inputBox" placeholder="请填写  例：2人">
            </div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle">学历要求：</span>
                <select name="education" class="inputBox" id="education">
                    <option value="1" @if(1 == $work['education']) selected @endif>大专</option>
                    <option value="2" @if(2 == $work['education']) selected @endif>本科</option>
                    <option value="3" @if(3 == $work['education']) selected @endif>研究生</option>
                    <option value="4" @if(4 == $work['education']) selected @endif>博士</option>
                </select>
            </div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle">学历科目要求：</span>
                <select name="course" class="inputBox" id="subject">
                    <option value="1" @if(1 == $work['course']) selected @endif>ESL</option>
                    <option value="2" @if(2 == $work['course']) selected @endif>English</option>
                    <option value="3" @if(3 == $work['course']) selected @endif>STEM</option>
                    <option value="4" @if(4 == $work['course']) selected @endif>AP course</option>
                    <option value="5" @if(5 == $work['course']) selected @endif>IB course</option>
                    <option value="6" @if(6 == $work['course']) selected @endif>A-LEVEL course</option>
                </select>
            </div>
            <div class="inputWarp selectWarp ga">
                <span class="leftTittle">年龄及性别：</span>
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
            <div class="inputWarp">
                <span class="leftTittle">授课地点：</span>
                <input type="text" name="site" value="{{ $work['site'] }}" class="inputBox" placeholder="请填写授课地点">
            </div>
            <div class="inputWarp">
                <span class="leftTittle">授课科目：</span>
                <input type="text" name="teach_course" value="{{ $work['teach_course'] }}" class="inputBox"
                       placeholder="请填写授课科目">
            </div>
            <div class="inputWarp">
                <span class="leftTittle">授课内容：</span>
                <input type="text" name="teach_content" value="{{ $work['teach_content'] }}" class="inputBox"
                       placeholder="请填写授课内容">
            </div>
            <div class="inputWarp">
                <span class="leftTittle">课时安排：</span>
                <input type="text" name="class_hour" value="{{ $work['class_hour'] }}" class="inputBox"
                       placeholder="请填写课时安排">
            </div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle">学生年龄段：</span>
                <select name="ages_group" class="inputBox" id="studentAge">
                    <option value="1" @if(1 == $work['ages_group']) selected @endif>0-8岁</option>
                    <option value="2" @if(2 == $work['ages_group']) selected @endif>8-12岁</option>
                    <option value="3" @if(3 == $work['ages_group']) selected @endif>12-16岁</option>
                    <option value="4" @if(4 == $work['ages_group']) selected @endif>16-20岁</option>
                    <option value="5" @if(5 == $work['ages_group']) selected @endif>20岁以上</option>
                </select>
                <!--<input type="text" class="inputBox" placeholder="">-->
            </div>
            <div style="clear: both"></div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle">税前工资：</span>
                <select name="salary" class="inputBox" id="salary">
                    <option value="1" @if(1 == $work['salary']) selected @endif>＄2000-2500</option>
                    <option value="2" @if(2 == $work['salary']) selected @endif>＄2500-3500</option>
                    <option value="3" @if(3 == $work['salary']) selected @endif>＄3500+</option>
                </select>
            </div>
            <div class="inputWarp">
                <span class="leftTittle">福利：</span>
                <input type="text" name="weal" value="{{ $work['weal'] }}" class="inputBox" placeholder="请填写">
            </div>
            <div class="inputWarp">
                <span class="leftTittle">住宿：</span>
                <input type="text" name="putUp" value="{{ $work['putUp'] }}" class="inputBox" placeholder="请填写">
            </div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle leftTittle2">对外教有无基础中文培训：</span>
                <select name="is_train" class="inputBox" id="presenceOfBase">
                    <option value="0" @if(0 == $work['is_train']) selected @endif>无</option>
                    <option value="1" @if(1 == $work['is_train']) selected @endif>有</option>
                </select>
            </div>
            <button lay-submit lay-filter="formDemo" class="submit" type="submit">确定</button>
            <div style="clear: both"></div>
        </form>
    </div>
</div>
{!! Theme::asset()->container('custom-css')->usepath()->add('publish','zhuojiao/css/publish.css') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('publish_edit','zhuojiao/js/publish_edit.js') !!}
<script>

</script>