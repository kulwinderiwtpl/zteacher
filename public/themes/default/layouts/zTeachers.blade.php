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
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/bootstrap-3.3.7/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/swiper-4.2.2/dist/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/iconFont/iconfont.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/css/base.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/css/nav.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/css/same.css') }}">
    <link rel="stylesheet" href="{{ url('/themes/default/assets/zhuojiao/css/index.css') }}">
    {!! Theme::asset()->container('custom-css')->styles() !!}
    <style>
        /*.navbar-default .navbar-nav > li > .aboutUs, .index span {
            color: #969dd3;
        }*/

        @media (max-width: 767px) {
            .caseIntro {
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
            }
        }
    </style>
</head>
<body>
{{--头部导航--}}
<div id="header" style="background: #ffffff">
    {!! Theme::partial('zTeachersHeader') !!}
</div>
{{--内容--}}
<main class="main container-fluid padding0">
    {!! Theme::content() !!}
</main>
{{--网站尾部--}}
<div id="footer">
    {!! Theme::partial('zTeachersFooter') !!}
</div>


</body>
<script src="{{ url('/themes/default/assets/zhuojiao/js/jquery-3.2.1.js') }}"></script>
<script src="{{ url('/themes/default/assets/zhuojiao/swiper-4.2.2/dist/js/swiper.js') }}"></script>
<script src="{{ url('/themes/default/assets/zhuojiao/bootstrap-3.3.7/dist/js/bootstrap.js') }}"></script>
<script src="{{ url('/themes/default/assets/zhuojiao/layui/layui.js') }}"></script>
<script src="{{ url('/themes/default/assets/zhuojiao/js/same.js') }}"></script>
{!! Theme::asset()->container('specific-js')->scripts() !!}
{!! Theme::asset()->container('custom-js')->scripts() !!}
<script>
   if($(".swiper-slide").length>1){
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
        $("li > .hiring").each(function () {
            if (this.href === window.location.href) {
                this.style.color = '#969dd3';
                $(".hiring span").each(function () {
                    this.style.color = '#969dd3';
                })
            }
        });
        $("li > .publish").each(function () {
            if (this.href === window.location.href) {
                this.style.color = '#969dd3';
                $(".publish span").each(function () {
                    this.style.color = '#969dd3';
                })
            }
        });
        $("li > .talentPool").each(function () {
            if (this.href === window.location.href) {
                this.style.color = '#969dd3';
                $(".talentPool span").each(function () {
                    this.style.color = '#969dd3';
                })
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
            url: '/CN/logout', // ajax请求路径
            // data: {data: data.field},
            dataType: 'json',
            success: function (data) {

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