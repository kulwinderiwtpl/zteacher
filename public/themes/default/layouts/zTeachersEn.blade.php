<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" id="token" content="{{csrf_token()}}">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
    <title>{!!  Theme::get('title') !!}</title>
    {{--<link rel="stylesheet" href="/themes/default/assets/zhuojiao/layui/css/layui.css">--}}
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/English/bootstrap-3.3.7/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/English/swiper-4.2.2/dist/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/English/iconFont/iconfont.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/English/css/base.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/English/css/nav.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/English/css/same.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/English/css/index.css') }}">

    {!! Theme::asset()->container('custom-css')->styles() !!}
</head>
<body>
{{--头部导航--}}
<div id="header" style="background: #ffffff">
    {!! Theme::partial('zTeachersHeaderEn') !!}
</div>
{{--内容--}}
<main class="main container-fluid padding0">
    {!! Theme::content() !!}
</main>
{{--网站尾部--}}
<div id="footer">
    {!! Theme::partial('zTeachersFooterEn') !!}
</div>


</body>
<script src="{{ url('/themes/default/assets/zhuojiao/English/js/jquery-3.2.1.js') }}"></script>
<script src="{{ url('/themes/default/assets/zhuojiao/English/swiper-4.2.2/dist/js/swiper.js') }}"></script>
<script src="{{ url('/themes/default/assets/zhuojiao/English/bootstrap-3.3.7/dist/js/bootstrap.js') }}"></script>
{{--<script src="{{ url('/themes/default/assets/zhuojiao/layui/layui.css') }}"></script>--}}
<script src="{{ url('/themes/default/assets/zhuojiao/English/js/same.js') }}"></script>
{!! Theme::asset()->container('specific-js')->scripts() !!}
{!! Theme::asset()->container('custom-js')->scripts() !!}
<script>
    if($(".swiper-slide").length>1) {
        var mySwiper = new Swiper('.banner', {
            loop: true, // 循环模式选项
            autoplay: true,
            // 如果需要分页器
            pagination: {
                el: '.swiper-pagination',
            },
        });
    }
</script>
{{--导航--}}
<script>
    $(function () {
        $("li > .aboutUs").each(function () {
            if (this.href === window.location.href) {
                this.style.color = '#969dd3';
                $(".index span").each(function () {
                    this.style.color = '#969dd3';
                })
            }
        });
        $("li > .joinUs").each(function () {
            if (this.href === window.location.href) {
                this.style.color = '#969dd3';
                $(".joinUs span").each(function () {
                    this.style.color = '#969dd3';
                })
            }
        });
        $("li > .Benefits").each(function () {
            if (this.href === window.location.href) {
                this.style.color = '#969dd3';
                $(".benefits span").each(function () {
                    this.style.color = '#969dd3';
                })
            }
        });
        $("li > .inChina").each(function () {
            if (this.href === window.location.href) {
                this.style.color = '#969dd3';
            }
        });
        $("li > .lifeInChina").each(function () {
            if (this.href === window.location.href) {
                this.style.color = '#969dd3';
            }
        });
        $("li > .contactUs").each(function () {
            if (this.href === window.location.href) {
                this.style.color = '#969dd3';
                $(".contactUs span").each(function () {
                    this.style.color = '#969dd3';
                })
            }
        });
        $("li > .myCenter").each(function () {
            if (this.href === window.location.href) {
                this.style.color = '#969dd3';
            }
        });
    });

    $(".userLi").hover(function () {
        $(".dropDown").stop(true,true).slideDown(200);
    },function () {
        $(".dropDown").stop(true,true).slideUp(200);
    });

    //    测试 登陆样式
    /*var status = 0;
    if(status==0){
        console.log(0);
        $(".userLi").stop(true,true).hide();
        $(".notLogin").stop(true,true).show()
    }else{
        console.log(1);
        $(".userLi").stop(true,true).show();
        $(".notLogin").stop(true,true).hide();

    }*/
    $(".logOut").click(function () {
        $(this).parents(".userLi").stop(true,true).hide();
        $(".notLogin").stop(true,true).show();
        status=0

        $.ajax({
            type: 'get',
            url: '/EN/logout', // ajax请求路径
            // data: {data: data.field},
            dataType: 'json',
            success: function (data) {
                alert(1212);
            }
        });
        setTimeout(function () {//刷新
            location.reload();
        }, 500);
    });
</script>
{{--聘请外教--}}
<script>
    $(".caseDl").each(function () {
        var index = $(this).index();
        if ((index + 1) % 3 == 0 && index != 0) {
            $(this).addClass("marginR0")
        }
    });
</script>