@extends('layouts.zTeachersEn')
@section('title', 'Z Teachers')
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
    <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
</div>
<div class="container padding0" style="position:relative;">
    <img class="left1 Indexleft1" src="{{ url($company['image']) }}" alt="">
    <div class="rightContent IndexrightContent">
        <div class="rightContentInner">{{ $company['content'] }}</div>
    </div>
    <div style="clear: both"></div>
</div>

<div class="container contentWarp">
    <div class="rightContent2">
        <div class="title title2">{{ $navs[1]['title'] }}</div>
        <img class="deco deco2" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
        <div style="clear: both"></div>
        <div class="content2">{{ $services['content'] }}</div>
    </div>
    <img class="Delete" src="{{ url($services['image']) }}" alt="">
</div>
<div class="container-fluid padding0 blankWarp">
    <img class="blank" src="{{ url('/themes/default/assets/zhuojiao/English/images/blank.png') }}" alt="">
</div>

<div class="container contentWarp">
    <div class="rightContent2" style="float: left">
        <div class="title title2">{{ $navs[2]['title'] }}</div>
        <img class="deco deco2" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
        <div style="clear: both"></div>
        <div class="content2">{{ $goal['content'] }}</div>
    </div>
    <img class="Delete Delete2" src="{{ url($goal['image']) }}" alt="">
</div>
@endsection