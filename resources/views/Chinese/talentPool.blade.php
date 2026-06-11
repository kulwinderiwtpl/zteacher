@extends('layouts.zTeachers')
@section('title', '外教人才库')
@section('content')
<!--banner-->
<div class="swiper-container banner">
    <div class="swiper-wrapper">
        @foreach($banners as $banner)
            <div class="swiper-slide"><a href=""><img src="{{ url($banner['img']) }}" alt=""></a></div>
        @endforeach
    </div>
    <!-- 分页器 -->
    <div class="swiper-pagination"></div>
</div>
<!--banner end-->
<div class="container padding0 titleBox">
    <div class="title">外教人才库</div>
    <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/images/deco.png') }}" alt="">
</div>
<!--<div class="container-fluid padding0" style="margin: 80px auto;">-->
<!--<a href="Self-introduction.html">-->
<!--<img style="display: block;width: 100%;height: auto;" src="images/qt4.png" alt="">-->
<!--</a>-->
<!--</div>-->
<div class="container-fluid padding0 rckWarp">
    <div class="container padding0 " id="talentPool">

    </div>
</div>
<link rel="stylesheet" href="{{ asset('themes/default/assets/zhuojiao/css/talentPool.css') }}">
<script src="{{ asset('themes/default/assets/zhuojiao/js/talentPool.js') }}"></script>

@endsection