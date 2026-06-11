<div class="container padding0 inner">
    <div class="layui-breadcrumb crumbs hidden-xs" lay-separator=">">
        <a href="{{ url('talentPool') }}" class="crumbsA">外教人才库</a>
        <a><cite>内页</cite></a>
    </div>
    <div class="container-fluid introInner">
        <div class="container-fluid padding0">
            <div class="imgWarp">
                <img src="{{ url($resume['picture1']) }}" alt="">
                <img src="{{ url($resume['picture2']) }}" alt="">
                <img src="{{ url($resume['picture3']) }}" alt="">
            </div>
        </div>
        <div class="infoWarp">
            <div class="Name">{{ $resume['frist_name'] }}</div>
            <!--简历地址-->
            @if(!empty($resume['resume']))
                <a {{--href="javascript:void(0)"--}} class="downLoad" download="文件名.docx"><span
                            onclick="download({{$resume}})">下载简历</span></a>
            @else
                <a {{--href="javascript:void(0)"--}} class="downLoad" download="文件名.docx"><span
                            >无简历</span></a>
            @endif

            <div style="clear: both"></div>
            <div class="layui-breadcrumb infoDiv" lay-separator="|">
                <a>@if($resume['sex'])男@else女@endif</a>
                <a>{{ !empty($resume['age'])?$resume['age']:'未知' }}</a>
                <a>{{ !empty($resume['nationality'])?$resume['nationality']:'未知' }}</a>
                <a>经验：{{ $resume['teaching_experience'] }}</a>
            </div>
            <div class="infoDiv2" title="">学历：{{ $resume['degree'] }}</div>
            <div class="infoDiv2" title="">专业：{{ $resume['major'] }}</div>
            <div class="infoDiv2" title="">
                证书：{{ empty($resume['professional_license'])?'无':$resume['professional_license'] }}</div>
            <div class="infoDiv2" title="">所在地：{{ $resume['current_location'] }}</div>
            <div class="infoDiv2" title="">工作性质：教育培训</div>
            <div class="infoDiv2 " title="">开始工作时间：
                @if($resume['likeTime'] == 1)
                    随时
                @elseif($resume['likeTime'] == 2)
                    3-4个月
                @elseif($resume['likeTime'] == 3)
                    6个月以上
                @endif</div>
            <div class="infoDiv2" title="">期望薪资：
                @if($resume['start_salary'] == 1)
                    $2000-$2500
                @elseif($resume['start_salary'] == 2)
                    $2500-$3500
                @elseif($resume['start_salary'] == 3)
                    $3500+
                @endif
            </div>
            <div class="infoDiv2" title="">工作地要求：
                @if(!empty($resume['work_location']))
                    @foreach($resume['work_location'] as $work_location)
                        @if($work_location == 1)
                            一线城市,
                        @elseif($work_location == 2)
                            二线城市,
                        @elseif($work_location == 3)
                            三线城市,
                        @endif
                    @endforeach
                @endif</div>
        </div>
    </div>
    <div style="clear: both"></div>
    <div class="container innerTitle">个人简历</div>
    <div class="container-fluid introInner padding">
        <div class="infoWarp">
            <div class="Name">Mark D</div>
            <div style="clear: both"></div>
            <div class="infoDiv2" title="">出生日期：{{ !empty($resume['birthday'])?$resume['birthday']:'未知' }}</div>
            <div class="infoDiv2" title="">所在地：{{ $resume['current_location'] }}</div>
            <div class="infoDiv2" title="">学位：{{ $resume['degree'] }}</div>
            <div class="infoDiv2" title="">毕业学校：{{ !empty($resume['graduate_school'])?$resume['graduate_school']:'未知' }}</div>
            <div class="infoDiv2" title="">专业：{{ $resume['major'] }}</div>
            <div class="infoDiv2" title="">GPA：{{ $resume['GPA'] }}</div>
            <div class="infoDiv2" title="">教龄：{{ $resume['teaching_experience'] }}</div>
            <div class="infoDiv2 " title="">职业执照：{{--专八 TEFL或TESOL认证--}}
                @if($resume['certified'] == 1)
                    TEFL、
                @elseif($resume['certified'] == 2)
                    TESOL、
                @elseif($resume['certified'] == 3)
                    TEFL && TESOL、
                @endif
                {{ $resume['professional_license'] }}</div>
            <div class="infoDiv2" title="">首选开始时间:
                @if($resume['likeTime'] == 1)
                    随时
                @elseif($resume['likeTime'] == 2)
                    3-4个月
                @elseif($resume['likeTime'] == 3)
                    6个月以上
                @endif
            </div>
            <div class="infoDiv2 " title="">中国首选工作地点：
                @if(!empty($resume['work_location']))
                    @foreach($resume['work_location'] as $work_location)
                        @if($work_location == 1)
                            一线城市,
                        @elseif($work_location == 2)
                            二线城市,
                        @elseif($work_location == 3)
                            三线城市,
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="infoDiv2 " title="">首选工作区：
                @if(!empty($resume['work_area']))
                    @foreach($resume['work_area'] as $work_area)
                        @if($work_area == 1)
                            幼儿园,
                        @elseif($work_area == 2)
                            小学,
                        @elseif($work_area == 3)
                            初中,
                        @elseif($work_area == 4)
                            高中,
                        @elseif($work_area == 5)
                            大学,
                        @elseif($work_area == 6)
                            国际学校,
                        @elseif($work_area == 7)
                            私立语言中心,
                        @elseif($work_area == 8)
                            英语STEM中心,
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="infoDiv2" title="">首选教学科目：
                @if($resume['start_salary'] == 1)
                    ESL
                @elseif($resume['start_salary'] == 2)
                    English
                @elseif($resume['start_salary'] == 3)
                    STEM
                @elseif($resume['start_salary'] == 4)
                    AP course
                @elseif($resume['start_salary'] == 5)
                    IB course
                @elseif($resume['start_salary'] == 6)
                    A-LEVEL course
                @endif
            </div>
            <div class="infoDiv2 " title="">优先起薪：
                @if($resume['start_salary'] == 1)
                    $2000-$2500
                @elseif($resume['start_salary'] == 2)
                    $2500-$3500
                @elseif($resume['start_salary'] == 3)
                    $3500+
                @endif</div>
            <div class="infoDiv2" title="">电话:{{ $resume['phone'] }}</div>
            <div class="infoDiv2 " title="">邮箱：{{ $resume['email'] }}</div>
        </div>
    </div>
</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('selfIntroduction','zhuojiao/css/selfIntroduction.css') !!}
{!! Theme::asset()->container('custom-js')->usepath()->add('selfIntroduction','zhuojiao/js/selfIntroduction.js') !!}