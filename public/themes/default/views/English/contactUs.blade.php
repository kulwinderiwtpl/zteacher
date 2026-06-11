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
        Email: {!!  Theme::get('webSite')['email'] !!} <br>
        Phone: {!!  Theme::get('webSite')['phone'] !!}<br>
        Address: {!!  Theme::get('webSite')['address'] !!}<br>
    </div>
    <img class="qrCode" src="{{ url(Theme::get('webSite')['qrcode']) }}" alt="">
    <!--<div class="imgWarp">-->
    <!--<img src="images/teach0.png" alt="">-->
    <!--<img src="images/teach1.png" alt="">-->
    <!--<img src="images/teach2.png" alt="">-->
    <!--<img src="images/teach3.png" alt="">-->
    <!--<img src="images/teach4.png" alt="">-->
    <!--<img src="images/teach5.png" alt="">-->
    <!--</div>-->
</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('contactUs','zhuojiao/English/css/contactUs.css') !!}