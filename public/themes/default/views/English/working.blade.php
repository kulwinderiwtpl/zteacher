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
    <div class="title">{{ $requirements['title'] }}</div>
    <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
</div>
<div class="container textBox">
    {{ $requirements['introduce'] }}
</div>
<div style="clear:both;"></div>
<div class="container padding0" style="position:relative;margin-top: 20px;">
    <img class="left1" src="{{ url('/themes/default/assets/zhuojiao/English/images/lifeInChinaImg_1.png') }}" alt="">
    <div class="rightContent">
        <ul class="rightContentInner listUl">
            @foreach($requirements['content'] as $content)
                <li>{{ $content }}</li>
            @endforeach
        </ul>
    </div>
    <div style="clear: both"></div>
</div>

<div class="container padding0 titleBox">
    <div class="title">{{ $certified['title'] }}</div>
    <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
</div>
<div class="container textBox">
    <div class="tittleS">
        TEFL
        <span class="tittleS_line"> </span>
    </div>
    <div>
        {{ $certified['introduce'] }}
    </div>
    <div class="tittleS">
        TESOL
        <span class="tittleS_line"> </span>
    </div>
    <div>
        {{ $certified['content'] }}
    </div>
</div>
<div class="padding0 container inChina1">
    <img src="{{ url($certified['image']) }}" alt="">
</div>

<div class="container padding0 titleBox">
    <div class="title">{{ $permit['title'] }}</div>
    <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
</div>
<div class="container textBox centerM">
    {{ $permit['introduce'] }}
</div>
<div class="container contentWarp marginT0">
    <img class="Delete Delete2" src="{{ url($permit['image']) }}" alt="">
    <div class="rightContent2" style="float: left">
        @foreach($permit['content'] as $v)
            <div class="title_small">{{ $v['title'] }}</div>
            <div style="clear: both"></div>
            <div class="content2">
                {{ $v['content'] }}
            </div>
        @endforeach
    </div>
</div>
<div class="container-fluid padding0 blankWarp">
    <img class="blank" src="{{ url('/themes/default/assets/zhuojiao/English/images/lifeInChinaImg_4.png') }}" alt="">
</div>
<!--Get a Working Permit From School To Apply For a Working Visa-->
<div class="container padding0 titleBox">
    <div class="title" style="margin-top: 0;">{{ $visa['title'] }}</div>
    <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
</div>
<div class="container padding0 permitWarp" style="position:relative;margin-top: 20px;">
    <img class="Delete" src="{{ $visa['image'] }}" alt="">
    <div class="rightContent rightContent_2">
        <div class="rightContentInner right2">
            {{ $visa['introduce'] }}<br>
            @foreach($visa['content'] as $content)
                {{ $content }}<br>
            @endforeach
        </div>
    </div>
    <div style="clear: both"></div>
</div>

<div class="container padding0 titleBox">
    <div class="title" style="margin-top: 0;">{{ $arriving['title'] }}</div>
    <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
</div>
<div class="container textBox">
    {{ $arriving['content'] }}
</div>
<div class="container padding0 inChina1Warp">
    <img class="blank" src="{{ url($arriving['image']) }}" alt="">
</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('benefits','zhuojiao/English/css/benefits.css') !!}
{!! Theme::asset()->container('custom-css')->usepath()->add('workInChina','zhuojiao/English/css/workInChina.css') !!}