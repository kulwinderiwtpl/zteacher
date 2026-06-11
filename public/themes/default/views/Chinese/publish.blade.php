<div class="container padding0 publishInner">
    <!--左-->
    <div class="leftBox">
        <div class="layui-upload  headBox">
            <div class="layui-upload-list dropArea">
                @if(Theme::get('user')['headerImg'])
                    <img class="layui-upload-img" src="{{ url(Theme::get('user')['headerImg']) }}"
                         id="headImgBig">
                @else
                    <img class="layui-upload-img" src="{{ url('/themes/default/assets/zhuojiao/images/headImgBig.png') }}"
                         id="headImgBig">
                @endif
                <p id="demoText"></p>
            </div>
            <div class="uName">{!!  Theme::get('user')['username'] !!}</div>
            <button type="button" class="layui-btn" id="uploadBtn">上传图片</button>
        </div>
        <ul class="tabUl">
            <li class="tabLi"><span class="iconfont icon-yifabuxunlian"> </span>发布工作</li>
            <li class="tabLi"><span class="iconfont icon-fabujilu"> </span>发布记录</li>
        </ul>
    </div>
    <!--右-->
    <div class="rightBox rightBox1" @if($edit) style="display: none;" @endif>
        <div class="topTittle">发布工作</div>
        <form action="/publishWork" class="form layui-form" method="post">
            {!! csrf_field() !!}
            <div class="inputWarp">
                <span class="leftTittle">开始时间：</span>
                <input type="text" onclick="this.blur()" name="start_time" class="layui-input inputBox"
                       placeholder="请选择" id="time" lay-verify="required">
            </div>
            <div class="inputWarp">
                <span class="leftTittle">合同期限：</span>
                {{--<input type="text" onclick="this.blur()" name="deadline" class="layui-input inputBox" id="limit"
                       placeholder="请选择">--}}
                {{--<input type="text" name="deadline" class="inputBox" placeholder="请填写">--}}
                <input type="text" name="deadline" lay-verify="required" class="inputBox" placeholder="请填写(例:2019-01-03 - 2020-01-03)">
            </div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle ">需求数量：</span>
                <input type="text" name="count" lay-verify="required" class="inputBox" placeholder="请填写  例：2人">
            </div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle">学历要求：</span>
                <select name="education" class="inputBox" id="education">
                    <option value="1">大专</option>
                    <option value="2">本科</option>
                    <option value="3">研究生</option>
                    <option value="4">博士</option>
                </select>
            </div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle">学历科目要求：</span>
                <select name="course" class="inputBox" id="subject">
                    <option value="1">ESL</option>
                    <option value="2">English</option>
                    <option value="3">STEM</option>
                    <option value="4">AP course</option>
                    <option value="5">IB course</option>
                    <option value="6">A-LEVEL course</option>
                </select>
            </div>
            <div class="inputWarp selectWarp ga">
                <span class="leftTittle">年龄及性别：</span>
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
            <div class="inputWarp">
                <span class="leftTittle">授课地点：</span>
                <input type="text" name="site" lay-verify="required" class="inputBox" placeholder="请填写授课地点">
            </div>
            <div class="inputWarp">
                <span class="leftTittle">授课科目：</span>
                <input type="text" name="teach_course" lay-verify="required" class="inputBox" placeholder="请填写授课科目">
            </div>
            <div class="inputWarp">
                <span class="leftTittle">授课内容：</span>
                <input type="text" name="teach_content" lay-verify="required" class="inputBox" placeholder="请填写授课内容">
            </div>
            <div class="inputWarp">
                <span class="leftTittle">课时安排：</span>
                <input type="text" name="class_hour" class="inputBox" placeholder="请填写课时安排">
            </div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle">学生年龄段：</span>
                <select name="ages_group" class="inputBox" id="studentAge">
                    <option value="1">0-8岁</option>
                    <option value="2">8-12岁</option>
                    <option value="3">12-16岁</option>
                    <option value="4">16-20岁</option>
                    <option value="5">20岁以上</option>
                </select>
                <!--<input type="text" class="inputBox" placeholder="">-->
            </div>
            <div style="clear: both"></div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle">税前工资：</span>
                    <select name="salary" class="inputBox" id="salary">
                        <option value="1">＄2000-2500</option>
                        <option value="2">＄2500-3500</option>
                        <option value="3">＄3500+</option>
                    </select>
            </div>
            <div class="inputWarp">
                <span class="leftTittle">福利：</span>
                <input type="text" name="weal" class="inputBox" placeholder="请填写">
            </div>
            <div class="inputWarp">
                <span class="leftTittle">住宿：</span>
                <input type="text" name="putUp" class="inputBox" placeholder="请填写">
            </div>
            <div class="inputWarp selectWarp">
                <span class="leftTittle leftTittle2">对外教有无基础中文培训：</span>
                <select name="is_train" class="inputBox" id="presenceOfBase">
                    <option value="0">无</option>
                    <option value="1">有</option>
                </select>
            </div>
            <button lay-submit lay-filter="formDemo" class="submit" type="submit">发布</button>
            <div style="clear: both"></div>
        </form>
    </div>
    <div class="rightBox" @if($edit) style="display: block;" @endif>
        <div class="topTittle">发布记录</div>
        <div class="flow-default" id="published">

        </div>
    </div>
</div>
{!! Theme::asset()->container('custom-css')->usepath()->add('publish','zhuojiao/css/publish.css') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('publish','zhuojiao/js/publish.js') !!}
<script>

</script>