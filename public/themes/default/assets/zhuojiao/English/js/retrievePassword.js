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
    form.on('submit(formDemo)', function (data) {
        $.ajax({
            url: '/EN/resetPasswords',
            type: data.form.method,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $(data.form).serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.code === 100) {
                    setTimeout(function () {
                        location.href = '/EN/login';
                    }, 1000);
                }
                layer.msg(data.msg);
            }
        });
        return false;
    });

});

// $(".verificationCodeWarp").click(function () {
//     $.ajax({
//         type:"post",
//         url:"",
//         dataType:"json", //服务器返回数据的类型
//         success:function(data){
//         if(data.success){
//             $("searchResult").html(data.msg);
//         }else{
//             $("#searchResult").html("出现错误：" + data.msg);
//         }
//     },
//     error:function(jqXHR){
//         console.log("发生错误："+ jqXHR.status);
//     }
// })
// })