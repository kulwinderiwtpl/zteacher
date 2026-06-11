@extends('layouts.zTeachersEn')
@section('title', 'Contact Us')
@section('content')
<!--banner-->
<div class="swiper-container banner">
    <div class="swiper-wrapper">
        @foreach($banners as $banner)
            <div class="swiper-slide"><a href=""><img src="{{ url($banner['img']) }}"
                                                      alt=""></a></div>
        @endforeach
    </div>
</div>
<!--banner end-->
<div class="container padding0 center" style=" top: 0;">
    <div class="container padding0 titleBox">
        <div class="title">Contact Us</div>
        <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
    </div>
    <div class="container textBox textBox2">
        Email: Support@zteachers.com <br>
        Phone: +1（917）868-6762<br>
        Address: 530 Piermont Rd, Closter, NJ 07624.<br>
    </div>
    <img class="qrCode" src="{{ url('/attachment/sys/e4830cf386f841a5a39f30d60c54c9d3.png') }}" alt="">	
    <!--<div class="imgWarp">-->
    <!--<img src="images/teach0.png" alt="">-->
    <!--<img src="images/teach1.png" alt="">-->
    <!--<img src="images/teach2.png" alt="">-->
    <!--<img src="images/teach3.png" alt="">-->
    <!--<img src="images/teach4.png" alt="">-->
    <!--<img src="images/teach5.png" alt="">-->
    <!--</div>-->
</div>
<link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/English/css/contactUs.css') }}">
@endsection