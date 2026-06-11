@extends('layouts.zTeachers')
@section('title', '聘请外教')
@section('content')
<!--banner-->
<div class="swiper-container banner">
    <div class="swiper-wrapper">
        @foreach($banners as $banner)
            <div class="swiper-slide"><a href=""><img src="{{ url($banner['img']) }}"
                                                      alt=""></a></div>
        @endforeach
    </div>
    <!-- 分页器 -->
    <div class="swiper-pagination"></div>
</div>
<!--banner end-->
<div class="container contentWarp">
    <div class="title title2 hidden-sm hidden-lg hidden-md">{{ $navs[0]['title'] }}</div>
    <img class="deco deco2 hidden-sm hidden-lg hidden-md" src="{{ asset('themes/default/assets/zhuojiao/images/deco.png') }}" alt="">
    <img class="Delete Delete2" src="{{ url($chooseUs['image']) }}" alt="">
    <div class="rightContent2" style="float: left">
        <div class="title title2 hidden-xs">{{ $navs[0]['title'] }}</div>
        <img class="deco deco2 hidden-xs" src="{{ asset('themes/default/assets/zhuojiao/images/deco.png') }}" alt="">
        <div style="clear: both"></div>
        <div style="clear: both"></div>
        <div class="content2 why">{{ $chooseUs['content'] }}</div>
        <a href="{{ url('/contactUs#contactUs') }}" class="contactBtn">联系我们</a>
    </div>
</div>
<div class="container padding0 titleBox">
    <div class="title">{{ $navs[1]['title'] }}</div>
    <img class="deco" src="{{ asset('themes/default/assets/zhuojiao/images/deco.png') }}" alt="">
</div>
<div class="container padding0 serviceCase">
    @foreach($process as $k => $v)
        <dl class="caseDl">
            <dt class="caseDt">
                <img src="{{ url($v['image']) }}" alt="">
            </dt>
            <dd class="caseTitle">{{ $v['title'] }}</dd>
            <dd class="caseTitle2">{{ $v['introduce'] }}</dd>
            <dd class="caseIntro">{{ $v['content'] }}</dd>
        </dl>
    @endforeach
    <div style="clear: both"></div>
</div>
<div class="container-fluid padding0">
    <img class="blank_banner" src="{{ asset('themes/default/assets/zhuojiao/images/pqwj_2.png') }}" alt="">
</div>
<div class="container padding0 titleBox">
    <div class="title">{{ $navs[2]['title'] }}</div>
    <img class="deco" src="{{ asset('themes/default/assets/zhuojiao/images/deco.png') }}" alt="">
</div>
<div class="container padding0 standard">
    @foreach($standard as $k => $v)
        @if($k>2)
            <div class="standardDl2Warp"> @endif
                <dl class="@if(($k+1) == count($standard)) standardDl2 standardDl2R @elseif($k>2) standardDl2 @else standardDl @endif">
                    <dt class="standardDt"><img src="{{ url($v['image']) }}" alt=""></dt>
                    <dd class="standardDd">
                        {{ $v['introduce'] }}
                    </dd>
                </dl>
                @if($k>2) </div> @endif
    @endforeach
    <div style="clear: both;"></div>
</div>
<div class="container contentWarp">
    <img class="Delete treatment hidden-xs" src="{{ asset('themes/default/assets/zhuojiao/images/pqwj_3.png') }}" alt="">
    <div class="rightContent2">
        <div class="title title2">{{ $treatment['title'] }}</div>
        <img class="deco deco2" src="{{ asset('themes/default/assets/zhuojiao/images/deco.png') }}" alt="">
        <div style="clear: both"></div>
        <div class="content2">
            @foreach($treatment['content'] as $content)
                {!! $content !!}<br>
            @endforeach
            {{--• 工作签证补贴。<br>
            • 住房补贴。<br>
            • 机票补贴。<br>
            • 医疗保险。<br>
            • 带薪假期。<br>
            （以上条件Z Teachers均可帮助机构与外教进行沟通并达成一致）--}}
        </div>
    </div>
</div>
<div class="container-fluid padding0 joinBottom">
    <div class="container padding0 titleBox">
        <div class="title">{{ $navs[4]['title'] }}</div>
        <img class="deco" src="{{ asset('themes/default/assets/zhuojiao/images/deco.png') }}" alt="">
    </div>
    <div class="container padding0 sfbz">
        @foreach($expenses as $expens)
        <dl class="caseDl">
            <dt class="caseDt">
                <img src="{{ url($expens['image']) }}" alt="">
            </dt>
            <dd class="caseTitle">{{ $expens['title'] }}</dd>
            <dd class="caseIntro">
                {{ $expens['content'] }}
            </dd>
        </dl>
        @endforeach
        <div style="clear: both"></div>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('themes/default/assets/zhuojiao/css/hiring.css') }}">
@endsection
