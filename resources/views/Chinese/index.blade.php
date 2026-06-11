@extends('layouts.zTeachers')
@section('title', 'Z Teachers卓教')
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
<a id="aboutUs"></a>
<div class="container padding0 titleBox">
    <div class="title">{{ $navs[0]['title'] }}</div>
    <img class="deco" src="{{ asset('themes/default/assets/zhuojiao/images/deco.png') }}" alt="">
</div>
<div class="container contentWarp index_contentWarp">
    <img class="Delete Delete2" src="{{ url($company['image']) }}" alt="">
    <div class="rightContent2" style="float: left">
        <div style="clear: both"></div>
        <div style="clear: both"></div>
        <div class="content2">
            {!! $company['content'] !!}
        </div>
    </div>
</div>
<div class="container-fluid serviceWarp">
    <div class="container padding0 titleBox">
        <div class="title mt0">{{ $navs[1]['title'] }}</div>
        <img class="deco" src="{{ asset('themes/default/assets/zhuojiao/images/deco.png')}}" alt="">
    </div>
    <div class="container textBox introText text-center">
        Z Teachers 卓教与美国多所顶尖大学的师范学院和教师培训机构拥有合作关系。我们利用在美国本土
        的资源优势，为中国的教育机构提供最优质的外教资源。
    </div>
    <div class="container padding0 serviceCase">
        @foreach($services as $k => $service)
            <dl class="caseDl @if(!(($k+1)%2)) caseDlMr0 @endif"
                @if($k+1 == count($services)) style="margin-right: 0;" @endif>
                <dt class="caseDt">
                    <img src="{{ url($service['image']) }}" alt="">
                </dt>
                <dd class="caseTitle">{{ $service['title'] }}</dd>
                <dd class="caseIntro">
                    {!! $service['content'] !!}
                </dd>
            </dl>
        @endforeach
    </div>
</div>
<div class="container padding0 titleBox">
    <div class="title">{{ $navs[2]['title'] }}</div>
    <img class="deco" src="{{ asset('themes/default/assets/zhuojiao/images/deco.png')}}" alt="">
</div>

<div class="container contentWarp index_contentWarp">
    <img class="Delete treatment hidden-xs" src="{{ url($goal['image']) }}" alt="">
    <div class="rightContent2">
        <div class="content2 index_content2">
            @foreach($goal['content'] as $content)
                {!! $content !!}<br>
            @endforeach
        </div>
    </div>
</div>
@endsection