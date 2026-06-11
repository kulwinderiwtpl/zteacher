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
<img class="left1 hidden-lg hidden-sm hidden-md" src="{{ url($benefit['image']) }}" alt="">
@foreach($benefit['introduce'] as $introduce)
    <div class="container textBox text-justify">{{ $introduce }}</div>
@endforeach
{{--<div class="container textBox text-justify">{{ $benefit['content'] }}</div>--}}
<div class="container padding0" style="position:relative;margin-top: 20px;">
    <img class="left1 hidden-xs" src="{{ url('/themes/default/assets/zhuojiao/English/images/benefitsImg_1.png') }}"
         alt="">
    <div class="rightContent">
        <ul class="rightContentInner salaryText">
            @foreach($benefit['content'] as $content)
                <li>{{$content}}</li>
            @endforeach
        </ul>
    </div>
    <div style="clear: both"></div>
</div>
<div class="container padding0 titleBox">
    <div class="title">{{ $navs[1]['title'] }}</div>
    <img class="deco" src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
</div>
<div class="container textBox">
    {{ $process['content'] }}
</div>
<!--------------table---------------->
<div class="container padding0 tableWarp">
    <table id="table1" class="tb tb-b c-100 c-t-center">
        <thead>
        <tr>
            <th>Educator Type</th>
            <th>City Tiers</th>
            <th>General Salary Range/ Month</th>
            <th>In Dollars/Month</th>
        </tr>
        </thead>
        <tbody>
        <!--1-->
        @foreach($averageWage as $v)
            <tr>
                <td rowspan="3">{{ $v['genre'] }}</td>
                <td>Tier 1</td>
                <td>{{ $v['tier1'] }}</td>
                <td>{{ $v['tier1En'] }}</td>
            </tr>

            <tr>
                <td>Tier 2</td>
                <td>{{ $v['tier2'] }}</td>
                <td>{{ $v['tier2En'] }}</td>
            </tr>
            <tr>
                <td>Tier 3</td>
                <td>{{ $v['tier3'] }}</td>
                <td>{{ $v['tier3En'] }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!--------------table end---------------->
<div class="container-fluid padding0 blankWarp">
    <img class="blank" src="{{ url($process['image']) }}" alt="">
</div>
<!--Extra Benefit That Only Happens When Working Overseas-->
<div class="container padding0 titleBox">
    <div class="title" style="margin-top: 0;">{{ $navs[2]['title'] }}</div>
    <img class="deco" style="margin-bottom: 0"
         src="{{ url('/themes/default/assets/zhuojiao/English/images/deco.png') }}" alt="">
</div>
<div class="container padding0" style="position:relative;margin-top: 20px;">
    <img class="left1" src="{{ $overseas['image'] }}" alt="">
    <div class="rightContent">
        <ul class="rightContentInner salaryText">
            @foreach($overseas['content'] as $content)
                <li>{{ $content }} </li>
            @endforeach
        </ul>
    </div>
    <div style="clear: both"></div>
</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('benefits','zhuojiao/English/css/benefits.css') !!}