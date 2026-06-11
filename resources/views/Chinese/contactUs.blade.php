@extends('layouts.zTeachers')
@section('title', '联系我们')
@section('content')
<!--banner-->
<div class="swiper-container banner">
    <div class="swiper-wrapper">
        @foreach($banners as $banner)
            <div class="swiper-slide"><a href=""><img src="{{ url($banner['img']) }}" alt=""></a></div>
        @endforeach
    </div>
</div>
<!--banner end-->
<a id="contactUs"></a>
<div class="container padding0 center">
    <div class="container padding0 titleBox">
        <div class="title">联系我们</div>
        <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/images/deco.png') }}" alt="">
    </div>
    <!--<div class="container textBox">-->
    <!--访客朋友们，您好：<br>-->
    <!--感谢您的到来，如果您对我们的企业文化和品牌产品感兴趣，可以通过以下几种的、方式联系我们。-->
    <!--</div>-->
    <div class="container textBox textBox2">
        电话：{{$webSite['phone']}} <br>
        Email：{{$webSite['email']}}<br>
        微信：{{$webSite['weChat']}}<br>
    </div>
    <img class="qrCode" src="{{ url($webSite['qrcode']) }}" alt="">
    <!--<div class="imgWarp">-->
    <!--<img src="images/teach0.png" alt="">-->
    <!--<img src="images/teach1.png" alt="">-->
    <!--<img src="images/teach2.png" alt="">-->
    <!--<img src="images/teach3.png" alt="">-->
    <!--<img src="images/teach4.png" alt="">-->
    <!--<img src="images/teach5.png" alt="">-->
    <!--</div>-->
</div>
<link rel="stylesheet" href="{{ asset('themes/default/assets/zhuojiao/css/contactUs.css') }}">

@endsection