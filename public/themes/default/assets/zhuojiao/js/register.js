/*图片验证码*/

var domain = window.location.host;

$('.bk_validate_code').click(function () {

    $(this).attr('src','/getValidateCode?random=' + Math.random())
});



layui.use('laydate', function () {
    var laydate = layui.laydate;
    //执行一个laydate实例
    laydate.render({
        elem: '#time', //指定元素
        lang: 'en'
    });
});
layui.use('form', function () {
    var form = layui.form;

});

$(".verificationCodeWarp").click(function () {
    $.ajax({
        type:"post",
        url:"",
        dataType:"json", //服务器返回数据的类型
        success:function(data){
            if(data.success){
                $("searchResult").html(data.msg);
            }else{
                $("#searchResult").html("出现错误：" + data.msg);
            }
        },
        error:function(jqXHR){
            console.log("发生错误："+ jqXHR.status);
        }
    })
});