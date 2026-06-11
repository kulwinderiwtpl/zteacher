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
<div class="container padding0 titleBox">
    <div class="title">{{ $navs[0]['title'] }}</div>
    <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
</div>
{{--<div class="container textBox">--}}
{{--    *Please be advised, specific requirements may vary according to the specific position you are applying for.--}}
{{--</div>--}}
<div style="clear:both;"></div>
<div class="container padding0" style="position:relative;margin-top: 20px;">
    <img class="left1" src="{{ url($register['image']) }}" alt="">
    <div class="rightContent">
        <div class="rightContentInner">
            <div>
                {{ $register['introduce'] }}
                @foreach($register['content'] as $content)
                    {{ $content }}<br>
                @endforeach
            </div>
            <a href="{{ url('EN/register') }}" class="registerBtn">Register</a>
        </div>

    </div>
    <div style="clear: both"></div>
</div>
<div class="container-fluid padding0 joinBottom">
    <div class="container padding0 titleBox">
        <div class="title"> {{ $navs[1]['title'] }}</div>
        <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
    </div>
    <ul class="container textBox joinUs_textBox">
        @foreach($process['content'] as $content)
            <li>{{ $content }}</li>
        @endforeach
    </ul>
    <div class="container padding0 caseWarp">
        <img src="{{ $process['image'] }}" alt="">
    </div>
</div>
{!! Theme::asset()->container('custom-css')->usepath()->add('benefits','zhuojiao/English/css/benefits.css') !!}
{!! Theme::asset()->container('custom-css')->usepath()->add('workInChina','zhuojiao/English/css/workInChina.css') !!}
{!! Theme::asset()->container('custom-css')->usepath()->add('joinUs','zhuojiao/English/css/joinUs.css') !!}