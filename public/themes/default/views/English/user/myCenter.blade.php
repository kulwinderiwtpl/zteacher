<div class="container padding0 publishInner">
    <!--左-->
    <div class="leftBox">
        <div class="layui-upload  headBox">
            <div class="layui-upload-list dropArea">
                @if(Theme::get('user')['headerImg'])
                    <img class="layui-upload-img" src="{{ url(Theme::get('user')['headerImg']) }}"
                         id="headImgBig">
                @else
                    <img class="layui-upload-img" src="/themes/default/assets/zhuojiao/images/headImgBig.png"
                         id="headImgBig">
                @endif
                <p id="demoText"></p>
            </div>
            <div class="uName">{{ Theme::get('user')['frist_name'] }}</div>
            <button type="button" class="layui-btn" id="uploadBtn">Upload picture</button>
        </div>
        <ul class="tabUl">
            <li class="tabLi"><span class="iconfont icon-fabujilu"> </span>My Resume</li>
        </ul>
    </div>
    <!--右-->
    <div class="rightBox rightBox1">
        <div class="topTittle">My Resume</div>
        <div class="flow-default" id="published">
            <ul class="jobCase">
                <li class="editWarp">
                    <a class="edit" href="{{ url('EN/editResume') }}">Ｍodify</a>
                    {{--<a class="delete" href="javascript:void(0)">Delete</a>--}}
                </li>
                <div style="clear: both;"></div>
                <li class="caseList">
                    <div class="caseSpan">First name：<span class="promulgator">{{ $user['frist_name'] }}</span></div>
                    <div>last name：<span class="date">{{ $user['last_name'] }}</span></div>
                </li>
                <li class="caseList">
                    <div class="caseSpan">Date of birth：<span class="promulgator">{{ $user['birthday'] }}</span></div>
                    <div>Current location：<span class="date">{{ $user['current_location'] }}</span></div>
                </li>
                <li class="caseList">
                    <div class="caseSpan"> Degree completed：<span class="promulgator">{{ $user['degree'] }}</span></div>
                    <div>Graduate School：<span class="date">{{ $user['graduate_school'] }}</span></div>
                </li>
                <li class="caseList">
                    <div class="caseSpan">Major：<span class="promulgator">{{ $user['major'] }}</span></div>
                    <div>GPA：<span class="date">{{ $user['GPA'] }}</span></div>
                </li>
                <li class="caseList">
                    <div class="caseSpan">Years of teaching experience：<span
                                class="promulgator">{{ $user['teaching_experience'] }}</span></div>
                    <div>Professional license：<span class="date">{{ $user['professional_license'] }}</span></div>
                </li>
                <li class="caseList">
                    <div class="caseSpan">TEFL or TESOL certified：<span class="promulgator">
                            @if($user['certified'] == 1)
                                TEFL
                            @elseif($user['certified'] == 2)
                                TESOL
                            @elseif($user['certified'] == 3)
                                TEFL && TESOL
                            @else
                                NULL
                            @endif
                           </span></div>
                    <div>Prefer starting time：<span class="date">
                            @if($user['likeTime'] == 1)
                                Immediately
                            @elseif($user['likeTime'] == 2)
                                3 to 4 Months
                            @elseif($user['likeTime'] == 3)
                                Over 6 Months
                            @endif
                        </span></div>
                </li>
                <li class="caseList">
                    <div class="caseSpan" style="width: 100%!important;">Prefer working location in China ： <span
                                class="promulgator">
                            @if(!empty($user['work_location']))
                                @foreach($user['work_location'] as $work_location)
                                    @if($work_location == 1)
                                        first-tier city,
                                    @elseif($work_location == 2)
                                        second-tier city,
                                    @elseif($work_location == 3)
                                        third-tier city,
                                    @endif
                                @endforeach
                            @endif
                        </span></div>
                    <div style="width: 100%!important;">Prefer working area ：<span class="date">
                            @if(!empty($user['work_area']))
                                @foreach($user['work_area'] as $work_area)
                                    @if($work_area == 1)
                                        Kindergarten,
                                    @elseif($work_area == 2)
                                        Middle School,
                                    @elseif($work_area == 3)
                                        College,
                                    @elseif($work_area == 4)
                                        High School,
                                    @elseif($work_area == 5)
                                        School,
                                    @elseif($work_area == 6)
                                        International,
                                    @elseif($work_area == 7)
                                        Private Language Center,
                                    @elseif($work_area == 8)
                                        Elementary School,
                                    @elseif($work_area == 9)
                                        English Based STEM Center,
                                    @endif
                                @endforeach
                            @endif
                        </span>
                    </div>
                </li>
                <li class="caseList">
                    <div class="caseSpan">Prefer teaching subject：<span class="promulgator">
                            @if($user['start_salary'] == 1)
                                ESL
                            @elseif($user['start_salary'] == 2)
                                English
                            @elseif($user['start_salary'] == 3)
                                STEM
                            @elseif($user['start_salary'] == 4)
                                AP course
                            @elseif($user['start_salary'] == 5)
                                IB course
                            @elseif($user['start_salary'] == 6)
                                A-LEVEL course
                            @endif
                        </span></div>
                    <div>Prefer starting salary： <span class="date">
                            @if($user['start_salary'] == 1)
                                $2000-$2500
                            @elseif($user['start_salary'] == 2)
                                $2500-$3500
                            @elseif($user['start_salary'] == 3)
                                $3500+
                            @endif
                        </span></div>
                </li>
                <li class="caseList">
                    <div class="caseSpan">Phone number ： <span class="promulgator">{{ $user['phone'] }}</span></div>
                </li>
                <div style="clear: both;"></div>
            </ul>
        </div>
    </div>
</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('layui','zhuojiao/English/layui/css/layui.css') !!}
{!! Theme::asset()->container('custom-css')->usepath()->add('myCenter','zhuojiao/English/css/myCenter.css') !!}

{!! Theme::asset()->container('custom-js')->usepath()->add('layui','zhuojiao/English/layui/layui.js') !!}

{!! Theme::asset()->container('custom-js')->usepath()->add('publish','zhuojiao/English/js/publish.js') !!}