<div class="container padding0">
    <div class="container padding0 titleBox">
        <div class="title"> Register</div>
        <img class="deco" src="/themes/default/assets/zhuojiao/English/images/deco.png" alt="">
    </div>
    <form action="" class="container form layui-form" method="post">
        {!! csrf_field() !!}
        <input type="hidden" id="headImage" name="picture1" value="">
        <input type="hidden" id="headImage2" name="picture2" value="">
        <input type="hidden" id="headImage3" name="picture3" value="">
        <div class="headImgWarp" style="margin-bottom: 0;">
            <span class="leftTittle headImgTittle">Upload picture：</span>
            <div class="headImg" id="drop_area_headImg"></div>
            <div class="headImg" id="drop_area_headImg2"></div>
            <div class="headImg" id="drop_area_headImg3"></div>
        </div>
        <div style="clear: both"></div>
        <div class="headImgWarp" style="margin-top: 0;height: 20px">
            <span class="leftTittle headImgTittle hidden-xs"> </span>
            <div class="headImgPrompt">Identification photo</div>
            <div class="headImgPrompt">Your photo of any kind</div>
            <div class="headImgPrompt">Your photo of any kind</div>
        </div>
        <div style="clear: both;"></div>
        <div class="inputWarp">
            <span class="leftTittle">First Name：</span>
            <input type="text" class="inputBox" name="frist_name" lay-verify="required" value="{{ old('frist_name') }}" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Last Name：</span>
            <input type="text" class="inputBox" name="last_name" lay-verify="required" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Date of Birth：</span>
            <input type="text" class="inputBox" name="birthday" lay-verify="required" placeholder="Example:1993-04-22" required>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">legal age：</span>
            <input type="text" class="inputBox" name="age" lay-verify="required" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Current Location：</span>
            <input type="text" class="inputBox" name="current_location" lay-verify="required" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Degree Completed：</span>
            <input type="text" class="inputBox" name="degree" lay-verify="required" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Graduate School：</span>
            <input type="text" class="inputBox" name="graduate_school" lay-verify="required" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Major：</span>
            <input type="text" class="inputBox" name="major" lay-verify="required" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">GPA：</span>
            <input type="text" class="inputBox" name="GPA" lay-verify="required" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Years of Teaching Experience：</span>
            <input type="text" class="inputBox" name="teaching_experience" lay-verify="required" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Professional License：</span>
            <input type="text" class="inputBox" name="professional_license" placeholder="You don't need to fill in when you don't have any">
        </div>
        <div class="inputWarp selectWarp">
            <span class="leftTittle">TEFL or TESOL Certified：</span>
            <select name="certified" class="inputBox" id="certified">
                <option value="0">NONE</option>
                <option value="1">TEFL</option>
                <option value="2">TESOL</option>
                <option value="3">TEFL&TESOL</option>

            </select>
            <!--<input type="text" class="inputBox" placeholder="">-->
        </div>
        <div class="inputWarp selectWarp">
            <span class="leftTittle">Prefer Starting Time：</span>
            <select name="likeTime" class="inputBox" id="likeTime">
                <option value="1">Immediately</option>
                <option value="2">3 to 4 Months</option>
                <option value="3">Over 6 Months</option>
            </select>
        </div>
        <div class="inputWarp city">
            <span class="leftTittle">Prefer Working Location In China ：</span>
            <div class="layui-input-block cityInner"
                 style=" ">
                <input type="checkbox" name="work_location[]" value="1" title="Tier 1 City">
                <input type="checkbox" name="work_location[]" value="2" title="Tier 2 City">
                <input type="checkbox" name="work_location[]" value="3" title="Tier 3 City">
                {{--<input type="radio" name="work_location" value="1" title="Tier 1 City">
                <input type="radio" name="work_location" value="2" title="Tier 2 City" checked>
                <input type="radio" name="work_location" value="3" title="Tier 3 City">--}}
            </div>
        </div>
        <div class="inputWarp" style="height: auto;">
            <span class="leftTittle">Prefer Working Area ：</span>
            <!--<input type="text" class="inputBox" placeholder="">-->
            <div class="layui-input-block area" style="">
                <input type="checkbox" name="work_area[]" value="1" title="Kindergarten">
                <input type="checkbox" name="work_area[]" value="2" title="Middle School">
            </div>
            <div class="layui-input-block area">
                <input type="checkbox" name="work_area[]" value="3" title="College">
                <input type="checkbox" name="work_area[]" value="4" title="High School">
            </div>
            <div class="layui-input-block area">
                <input type="checkbox" name="work_area[]" value="5" title="School">
                <input type="checkbox" name="work_area[]" value="6" title="International">
            </div>
            <div class="layui-input-block area">
                <input type="checkbox" name="work_area[]" value="7" title="Private Language Center">
                <input type="checkbox" name="work_area[]" value="8" title="Elementary School">
            </div>
            <div class="layui-input-block area">
                <input type="checkbox" name="work_area[]" value="9" title="English Based STEM Center">
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="clear: both"></div>
        <div class="inputWarp selectWarp">
            <span class="leftTittle">Prefer Teaching Subject：</span>
            <select name="teaching_subject" class="inputBox" id="subject">
                <option value="1">ESL</option>
                <option value="2">English</option>
                <option value="3">STEM</option>
                <option value="4">AP course</option>
                <option value="5">IB course</option>
                <option value="6">A-LEVEL course</option>
            </select>
        </div>
        <div class="inputWarp selectWarp">
            <span class="leftTittle">Prefer Starting Salary：</span>
            <select name="start_salary" class="inputBox" id="salary">
                <option value="1">＄2000-＄2500</option>
                <option value="2">＄2500-＄3500</option>
                <option value="3">＄3500+</option>
            </select>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Phone Number ：</span>
            <input type="tel" class="inputBox" name="phone" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Email：</span>
            <input type="email" class="inputBox" name="email" lay-verify="email" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">User Name：</span>
            <input type="text" class="inputBox" name="username" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Password：</span>
            <input type="password" class="inputBox" name="password" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">ConfirmPassword：</span>
            <input type="password" class="inputBox" name="confirmPassword" placeholder="">
        </div>
        <div class="inputWarp" style="margin-bottom: 0;">
            <span class="leftTittle">Resume：</span>
            <button style="background: #969dd3;" type="button" class="layui-btn" id="uploadFile"><i
                        class="layui-icon"></i> Upload Resume
            </button>
        </div>
        <p class="prompt">please delete contact info before upload</p>

        <button lay-submit lay-filter="formDemo" class="submit" type="submit">Submit</button>
    </form>

</div>
{!! Theme::asset()->container('custom-css')->usepath()->add('layui','zhuojiao/English/layui/css/layui.css') !!}
{!! Theme::asset()->container('custom-css')->usepath()->add('register','zhuojiao/English/css/register.css') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker_data','zhuojiao/English/js/distpicker.data.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('distpicker','zhuojiao/English/js/distpicker.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('main','zhuojiao/English/js/main.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('upload','zhuojiao/English/js/upload.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('layui','zhuojiao/English/layui/layui.js') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('registerEN','zhuojiao/js/registerEN.js') !!}