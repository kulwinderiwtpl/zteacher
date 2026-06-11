<div class="container padding0">
    <div class="container padding0 titleBox">
        <div class="title"> Edit-Resume</div>
        <img class="deco" src="/themes/default/assets/zhuojiao/English/images/deco.png" alt="">
    </div>
    <form action="" class="container form layui-form" method="post">
        {!! csrf_field() !!}
        <input type="hidden" id="headImage" name="picture1" value="">
        <input type="hidden" id="headImage2" name="picture2" value="">
        <input type="hidden" id="headImage3" name="picture3" value="">
        <div class="headImgWarp" style="margin-bottom: 0;">
            <span class="leftTittle headImgTittle">Upload picture：</span>
            <div class="headImg" id="drop_area_headImg">
            </div>
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
            <input type="text" class="inputBox" name="frist_name" value="{{ $user['frist_name'] }}" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Last Name：</span>
            <input value='{{ $user['last_name'] }}' type="text" class="inputBox" name="last_name" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Date of Birth：</span>
            <input value='{{ $user['birthday'] }}' type="text" class="inputBox" name="birthday"
                   placeholder="Example:1993-04-22" required>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">legal age：</span>
            <input value='{{ $user['age'] }}' type="text" class="inputBox" name="age" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Current Location：</span>
            <input value='{{ $user['current_location'] }}' type="text" class="inputBox" name="current_location"
                   placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Degree Completed：</span>
            <input value='{{ $user['degree'] }}' type="text" class="inputBox" name="degree" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Graduate School：</span>
            <input value='{{ $user['graduate_school'] }}' type="text" class="inputBox" name="graduate_school"
                   placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Major：</span>
            <input value='{{ $user['major'] }}' type="text" class="inputBox" name="major" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">GPA：</span>
            <input value='{{ $user['GPA'] }}' type="text" class="inputBox" name="GPA" placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Years of Teaching Experience：</span>
            <input value='{{ $user['teaching_experience'] }}' type="text" class="inputBox" name="teaching_experience"
                   placeholder="">
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Professional License：</span>
            <input value='{{ $user['professional_license'] }}' type="text" class="inputBox" name="professional_license"
                   placeholder="">
        </div>
        <div class="inputWarp selectWarp">
            <span class="leftTittle">TEFL or TESOL Certified：</span>
            <select name="certified" class="inputBox" id="certified">
                <option value="0" @if($user['certified'] == 0) selected @endif>NULL</option>
                <option value="1" @if($user['certified'] == 1) selected @endif>TEFL</option>
                <option value="2" @if($user['certified'] == 2) selected @endif>TESOL</option>
                <option value="3" @if($user['certified'] == 3) selected @endif>TEFL&TESOL</option>

            </select>
            <!--<input type="text" class="inputBox" placeholder="">-->
        </div>
        <div class="inputWarp selectWarp">
            <span class="leftTittle">Prefer Starting Time：</span>
            <select name="likeTime" class="inputBox" id="likeTime">
                <option value="1" @if($user['likeTime'] == 1) selected @endif>Immediately</option>
                <option value="2" @if($user['likeTime'] == 2) selected @endif>3 to 4 Months</option>
                <option value="3" @if($user['likeTime'] == 3) selected @endif>Over 6 Months</option>
            </select>
            <!--<input type="text" onclick="this.blur()" class="layui-input inputBox" placeholder="Please select time" id="time">-->
        </div>
        <div class="inputWarp city">
            <span class="leftTittle">Prefer Working Location In China ：</span>
            <div class="layui-input-block cityInner"
                 style=" ">
                <input type="checkbox" value="1" name="work_location[]" title="Tier 1 City"
                       @if(in_array(1,$user['work_location'])) checked @endif>
                <input type="checkbox" value="2" name="work_location[]" title="Tier 2 City"
                       @if(in_array(2,$user['work_location'])) checked @endif>
                <input type="checkbox" value="3" name="work_location[]" title="Tier 3 City"
                       @if(in_array(3,$user['work_location'])) checked @endif>
            </div>
        </div>
        <div class="inputWarp" style="height: auto;">
            <span class="leftTittle">Prefer Working Area ：</span>
            <!--<input type="text" class="inputBox" placeholder="">-->
            <div class="layui-input-block area" style="">
                <input type="checkbox" name="work_area[]" @if(in_array(1,$user['work_area'])) checked @endif value="1"
                       title="Kindergarten">
                <input type="checkbox" name="work_area[]" @if(in_array(2,$user['work_area'])) checked @endif value="2"
                       title="Middle School">
            </div>
            <div class="layui-input-block area">
                <input type="checkbox" name="work_area[]" @if(in_array(3,$user['work_area'])) checked @endif value="3"
                       title="College">
                <input type="checkbox" name="work_area[]" @if(in_array(4,$user['work_area'])) checked @endif value="4"
                       title="High School">
            </div>
            <div class="layui-input-block area">
                <input type="checkbox" name="work_area[]" @if(in_array(5,$user['work_area'])) checked @endif value="5"
                       title="School">
                <input type="checkbox" name="work_area[]" @if(in_array(6,$user['work_area'])) checked @endif value="6"
                       title="International">
            </div>
            <div class="layui-input-block area">
                <input type="checkbox" name="work_area[]" @if(in_array(7,$user['work_area'])) checked @endif value="7"
                       title="Private Language Center">
                <input type="checkbox" name="work_area[]" @if(in_array(8,$user['work_area'])) checked @endif value="8"
                       title="Elementary School">
            </div>
            <div class="layui-input-block area">
                <input type="checkbox" name="work_area[]" @if(in_array(9,$user['work_area'])) checked @endif value="9"
                       title="English Based STEM Center">
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="clear: both"></div>
        <div class="inputWarp selectWarp">
            <span class="leftTittle">Prefer Teaching Subject：</span>
            <select name="teaching_subject" class="inputBox" id="subject">
                <option value="1" @if($user['teaching_subject'] == 1) selected @endif>ESL</option>
                <option value="2" @if($user['teaching_subject'] == 2) selected @endif>English</option>
                <option value="3" @if($user['teaching_subject'] == 3) selected @endif>STEM</option>
                <option value="4" @if($user['teaching_subject'] == 4) selected @endif>AP course</option>
                <option value="5" @if($user['teaching_subject'] == 5) selected @endif>IB course</option>
                <option value="6" @if($user['teaching_subject'] == 6) selected @endif>A-LEVEL course</option>
            </select>
        </div>
        <div class="inputWarp selectWarp">
            <span class="leftTittle">Prefer Starting Salary：</span>
            <select name="start_salary" class="inputBox" id="salary">
                <option value="1" @if($user['start_salary'] == 1) selected @endif>＄2000-＄2500</option>
                <option value="2" @if($user['start_salary'] == 2) selected @endif>＄2500-＄3500</option>
                <option value="3" @if($user['start_salary'] == 3) selected @endif>＄3500+</option>
            </select>
        </div>
        <div class="inputWarp">
            <span class="leftTittle">Phone Number ：</span>
            <input type="tel" class="inputBox" name="phone" value="{{ $user['phone'] }}" placeholder="">
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
{{--{!! Theme::asset()->container('custom-js')->usepath()->add('registerEN','zhuojiao/js/registerEN.js') !!}--}}
{!! Theme::asset()->container('custom-js')->usepath()->add('editResume','zhuojiao/js/editResume.js') !!}