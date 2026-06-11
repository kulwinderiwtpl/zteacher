$(document).ready(function () {
    $(window).scroll(function () {//开始监听滚动条
        var top = $(document).scrollTop();
        if (top > 90) {
            $(".main").stop(true, true).addClass("main2");
            $(".navbar-default").stop(true, true).removeClass("topBig");
            $(".LogoWarp").stop(true,true).attr('class','LogoWarp2').show();
            $(".LogoWarpTop").stop(true,true).hide();
            $(".topBar2").stop(true,true).attr('class','topBar');
        } else {
            $(".main").stop(true, true).removeClass("main2");
            $(".navbar-default").stop(true, true).addClass("topBig");
            $(".LogoWarp2").stop(true,true).attr('class','LogoWarp').hide();
            $(".LogoWarpTop").stop(true,true).show();
            $(".topBar").stop(true,true).attr('class','topBar2');
        }

    });



});