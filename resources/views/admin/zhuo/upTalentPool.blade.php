<div class="chamberCommercelist-content">
    <!--工作信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">外教人才编辑</h1>
        </div>
    </div>

    <form class="layui-form" id="form">
        <input type="hidden" name="id" value="{{ $resume['id'] }}"/>
        <div class="layui-form-item">
            <label class="layui-form-label">姓名：</label>
            <div class="layui-input-block">
                <input type="text" name="frist_name" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $resume['frist_name'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">照片1：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                <input type="hidden" name="picture1" value="">
                @if(empty($resume['picture1']))
                    <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @else
                    <img id="uploadPictures" src="{{ url($resume['picture1']) }}"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（282*328）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">照片2：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img2">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                <input type="hidden" name="picture2" value="">
                @if(empty($resume['picture2']))
                    <img id="uploadPictures2" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @else
                    <img id="uploadPictures2" src="{{ url($resume['picture2']) }}"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（282*328）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">照片3：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img3">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                <input type="hidden" name="picture3" value="">
                @if(empty($resume['picture3']))
                    <img id="uploadPictures3" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @else
                    <img id="uploadPictures3" src="{{ url($resume['picture3']) }}"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（282*328）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">国籍：</label>
            <div class="layui-input-block">
                <input type="text" name="nationality" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input"
                       value="{{ isset($resume['nationality'])?$resume['nationality']:'' }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">年龄：</label>
            <div class="layui-input-block">
                <input type="text" name="age" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ isset($resume['age'])?$resume['age']:'' }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">性别：</label>
            <div class="layui-input-block">
                <input type="radio" name="sex" value="1" title="男" @if($resume['sex']) checked @endif>
                <input type="radio" name="sex" value="0" title="女" @if(!$resume['sex']) checked @endif>

            </div>
        </div>
        {{--<div class="layui-form-item">
            <label class="layui-form-label">出生日期：</label>
            <div class="layui-input-block">
                <input type="text" name="birthday" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" placeholder="例：1993-05-01"
                       value="{{ isset($resume['birthday'])?$resume['birthday']:'' }}">
            </div>
        </div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">学历：</label>
            <div class="layui-input-block">
                <input type="text" name="degree" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ isset($resume['degree'])?$resume['degree']:'' }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">教学经验：</label>
            <div class="layui-input-block">
                <input type="text" name="teaching_experience" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input"
                       value="{{ isset($resume['teaching_experience'])?$resume['teaching_experience']:'' }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">专业：</label>
            <div class="layui-input-block">
                <input type="text" name="major" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input"
                       value="{{ isset($resume['major'])?$resume['major']:'' }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">证书：</label>
            <div class="layui-input-block">
                <input type="radio" name="certified" value="0" @if(0 == $resume['certified']) checked @endif title="无">
                <input type="radio" name="certified" value="1" @if(1 == $resume['certified']) checked
                       @endif title="TEFL">
                <input type="radio" name="certified" value="2" @if(2 == $resume['certified']) checked
                       @endif title="TESOL">
                <input type="radio" name="certified" value="3" @if(3 == $resume['certified']) checked
                       @endif title="TEFL && TESOL">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">所在地：</label>
            <div class="layui-input-block">
                <input type="text" name="current_location" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input"
                       value="{{ isset($resume['current_location'])?$resume['current_location']:'' }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">喜欢工作区域：</label>
            <div class="layui-input-block">
                <input type="checkbox" name="work_area" value="1" @if(array_has($resume['work_area'], 1)) checked
                       @endif title="幼儿园">
                <input type="checkbox" name="work_area" value="2" @if(array_has($resume['work_area'], 2)) checked
                       @endif title="小学">
                <input type="checkbox" name="work_area" value="3" @if(array_has($resume['work_area'], 3)) checked
                       @endif title="初中">
                <input type="checkbox" name="work_area" value="4" @if(array_has($resume['work_area'], 4)) checked
                       @endif title="高中">
                <input type="checkbox" name="work_area" value="5" @if(array_has($resume['work_area'], 5)) checked
                       @endif title="大学">
                <input type="checkbox" name="work_area" value="6" @if(array_has($resume['work_area'], 6)) checked
                       @endif title="国际学校">
                <input type="checkbox" name="work_area" value="7" @if(array_has($resume['work_area'], 7)) checked
                       @endif title="私立语言中心">
                <input type="checkbox" name="work_area" value="8" @if(array_has($resume['work_area'], 8)) checked
                       @endif title="英语STEM中心">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开始工作时间：</label>
            <div class="layui-input-block">
                <input type="radio" name="likeTime" value="1" title="随时" @if($resume['likeTime'] == 1) checked @endif>
                <input type="radio" name="likeTime" value="2" title="3-4个月"
                       @if($resume['likeTime'] == 2) checked @endif>
                <input type="radio" name="likeTime" value="3" title="6个月以后"
                       @if($resume['likeTime'] == 3) checked @endif>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">期望薪资：</label>
            <div class="layui-input-inline" style="width: 150px;">
                <select name="start_salary" lay-verify="" lay-search lay-filter="article">
                    <option value="1" @if($resume['start_salary'] == 1) selected @endif>＄2000-＄2500</option>
                    <option value="2" @if($resume['start_salary'] == 2) selected @endif>＄2500-＄3500</option>
                    <option value="3" @if($resume['start_salary'] == 3) selected @endif>＄3500+</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">工作地要求：</label>
            <div class="layui-input-block">
                <input type="checkbox" value="1" name="work_location" title="一线城市"
                       @if(array_has($resume['work_location'], 1)) checked @endif>
                <input type="checkbox" value="2" name="work_location" title="二线城市"
                       @if(array_has($resume['work_location'], 2)) checked @endif>
                <input type="checkbox" value="3" name="work_location" title="三线城市"
                       @if(array_has($resume['work_location'], 3)) checked @endif>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号：</label>
            <div class="layui-input-block">
                <input type="text" name="phone" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $resume['phone'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱：</label>
            <div class="layui-input-block">
                <input type="text" name="email" required lay-verify="email" autocomplete="off"
                       class="layui-input add-input" value="{{ $resume['email'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">简历：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" name="resume" id="resume">
                    <i class="layui-icon">&#xe67c;</i>上传简历
                </button>
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
{!! Theme::asset()->container('custom-js')->usePath()->add('upTalentPool', 'zhuojiao/js/upTalentPool.js') !!}

<script>

</script>