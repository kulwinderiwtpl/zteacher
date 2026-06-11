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
<div class="container textBox padding0" style="text-align: justify;">
    {!! $living['content'] !!}
    {{--Compared to most of the states in the US, the cost of living in China is relatively low. On top what you are
    making, you will get many benefits which will make your life even easier. Some of the benefit such as free
    accommodation, free meals, and free insurance will help you maximize your salary. <br>
    Saving money in the US is never easy, but with the living cost in China, you will be able to save a substantial
    part of your income. Save to pay off student loans! Save to travel! Save for your future!<br>
    As a teacher in China, you will receive the highest respect from your students, parents, and citizens of China.
    In Asian culture, teachers are held in the highest regard. Also, you will make a lot of local friends as English
    is spoken by more and more Chinese citizens. Furthermore, China is a lot more advance than before.<br>
    China is a huge country and there are so many places to explore and things to do. With the most advanced
    high-speed train system, you can travel all throughout China and discover new cuisines as well as cultures.<br>
    Here is a sample of a foreign teacher monthly budget in China<br>--}}
</div>
<!--------------table---------------->
<div class="container padding0 tableWarp">
    <table id="table1" class="tb tb-b c-100 c-t-center">
        <thead>
        <tr>
            <th>City Tiers</th>
            <th>Tier 1</th>
            <th>Tier 2</th>
            <th>Tier 3</th>
        </tr>
        </thead>
        <tbody>
        @foreach($consumption as $v)
            <tr>
                <td>{{ $v['type'] }}</td>
                <td>￥{{ $v['tier1'] }}</td>
                <td>￥{{ $v['tier2'] }}</td>
                <td>￥{{ $v['tier3'] }}</td>
            </tr>
        @endforeach
        <tr>
            <td>Remaining Income for Saving (RMB)</td>
            <td>￥{{$count1}}</td>
            <td>￥{{ $count2 }}</td>
            <td>￥{{ $count3 }}</td>
        </tr>
        <!--9-->
        <tr>
            <td>In USD</td>
            <td>${{ floor($count1/6.71) }}</td>
            <td>${{ floor($count2/6.71) }}</td>
            <td>${{ floor($count3/6.71) }}</td>
        </tr>
        </tbody>
    </table>
</div>
<!--------------table end---------------->
<div class="container textBox padding0 prompt" style="text-align: justify;">
    *Exchange rate is based on current 1:6.71 ratio. All spending may vary depending on the location within the city.

</div>

{!! Theme::asset()->container('custom-css')->usepath()->add('benefits','zhuojiao/English/css/benefits.css') !!}