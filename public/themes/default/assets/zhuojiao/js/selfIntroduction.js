function download(data) {
    window.open("http://" + window.location.host + "/" + data['resume']);
}
layui.use('element', function () {
    var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块

    //监听导航点击
    element.on('nav(demo)', function (elem) {
        //console.log(elem)
        layer.msg(elem.text());
    });
});
$(document).ready(function () {
    $(".infoDiv2").each(function () {
        var title = $(this).text();
        $(this).attr('title',title);

        if(($(this).text().replace(/[ ]/g,"")).length>20){
            $(this).addClass("lang");
        }
    });
});
