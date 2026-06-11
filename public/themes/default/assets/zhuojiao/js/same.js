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


layui.use(['util'], function () {
var util = layui.util;
util.fixbar({
    bar1: false
    ,bar2: false
    ,css: {right: 50, bottom: 100}
    ,bgcolor: '#393D49'
    ,click: function(type){
        if(type === 'bar1'){
            layer.msg('icon是可以随便换的')
        } else if(type === 'bar2') {
            layer.msg('两个bar都可以设定是否开启')
        }
    }
})
});



