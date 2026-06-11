<div class="chamberCommercelist-content">
    <!--工作信息编辑-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">外教人才添加</h1>
        </div>
    </div>

    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">姓名：</label>
            <div class="layui-input-block">
                <input type="text" name="frist_name" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">照片1：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                <input type="hidden" name="picture1" value="">
                <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
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
                <img id="uploadPictures2" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
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
                <img id="uploadPictures3" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                <i style="color: #f77;">##建议图片尺寸为（282*328）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">国籍：</label>
            <div class="layui-input-block">
                <input type="text" name="nationality" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">年龄：</label>
            <div class="layui-input-block">
                <input type="text" name="age" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">性别：</label>
            <div class="layui-input-block">
                <input type="radio" name="sex" value="1" title="男" checked>
                <input type="radio" name="sex" value="0" title="女" >

            </div>
        </div>
        {{--<div class="layui-form-item">
            <label class="layui-form-label">出生日期：</label>
            <div class="layui-input-block">
                <input type="text" name="birthday" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" placeholder="例：1993-05-01" value="">
            </div>
        </div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">学历：</label>
            <div class="layui-input-block">
                <input type="text" name="degree" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value=" ">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">教学经验：</label>
            <div class="layui-input-block">
                <input type="text" name="teaching_experience"  required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">专业：</label>
            <div class="layui-input-block">
                <input type="text" name="major" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">证书：</label>
            <div class="layui-input-block">
                <input type="radio" name="certified" value="0" title="无" checked>
                <input type="radio" name="certified" value="1" title="TEFL">
                <input type="radio" name="certified" value="2" title="TESOL">
                <input type="radio" name="certified" value="3" title="TEFL && TESOL">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">所在地：</label>
            <div class="layui-input-block">
                <input type="text" name="current_location" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">喜欢工作区域：</label>
            <div class="layui-input-block">
                <input type="checkbox" name="work_area" value="1" title="幼儿园" checked>
                <input type="checkbox" name="work_area" value="2" title="小学">
                <input type="checkbox" name="work_area" value="3" title="初中">
                <input type="checkbox" name="work_area" value="4" title="高中">
                <input type="checkbox" name="work_area" value="5" title="大学">
                <input type="checkbox" name="work_area" value="6" title="国际学校">
                <input type="checkbox" name="work_area" value="7" title="私立语言中心">
                <input type="checkbox" name="work_area" value="8" title="英语STEM中心">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开始工作时间：</label>
            <div class="layui-input-block">
                <input type="radio" name="likeTime" value="1" title="随时" checked>
                <input type="radio" name="likeTime" value="2" title="3-4个月">
                <input type="radio" name="likeTime" value="3" title="6个月以后">
                {{--<input type="text" name="start_time" id="date" autocomplete="off" class="layui-input" value="">--}}
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">期望薪资：</label>
            <div class="layui-input-inline" style="width: 150px;">
                <select name="start_salary" lay-verify="" lay-search lay-filter="article">
                    <option value="1">＄2000-＄2500</option>
                    <option value="2">＄2500-＄3500</option>
                    <option value="3">＄3500+</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">工作地要求：</label>
            <div class="layui-input-block">
                <input type="checkbox" value="1" name="work_location" title="一线城市" checked>
                <input type="checkbox" value="2" name="work_location" title="二线城市">
                <input type="checkbox" value="3" name="work_location" title="三线城市">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号：</label>
            <div class="layui-input-block">
                <input type="text" name="phone" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱：</label>
            <div class="layui-input-block">
                <input type="text" name="email" required lay-verify="email" autocomplete="off"
                       class="layui-input add-input" value="">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">简历：</label>
            <div class="layui-input-block">
                {{--<button style="background: #969dd3;" type="button" class="layui-btn" id="resume"><i class="layui-icon"></i>  点击上传简历</button>--}}
                <button type="button" class="layui-btn" name="resume" id="resume">
                    <i class="layui-icon">&#xe67c;</i>上传简历
                </button>
                {{--<input class="resume" type="file"   id="resume"/>--}}
            </div>
        </div>
        <input type="hidden" name="status" value="0">
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn submit-return" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="button" id="goback" class="layui-btn submit-return">返回</button>
            </div>
        </div>
    </form>
</div>
{!! Theme::asset()->container('custom-js')->usePath()->add('talentPool', 'zhuojiao/js/addTalentPool.js') !!}