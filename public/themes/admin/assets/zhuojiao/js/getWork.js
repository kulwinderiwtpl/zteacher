$(function () {
    layui.use('layer', function () {
        var $ = layui.jquery;       // 删除操作

        $('a.delete').click(function () {
            var sid = $(this).data('id'); // 获取点击项的id

            layer.confirm("确认要删除吗，删除后不能恢复", {
                title: "删除确认"
            }, function (index) {
                $.get("/manage/delWork/" + sid, function (data) {
                    var num = data.code;
                    layer.msg(data.msg, {
                        icon: num,
                        shade: 0.3,
                        offset: '40%',
                        time: 2000
                    });

                    //layer.close(index); //如果设定了yes回调，需进行手工关闭

                    setTimeout(function () {//刷新

                        location.reload();
                    }, 1000);
                });
            });
        });
    });
});


//添加
$("#publishedWorkMenuAdd").click(function () {
    window.location.href = "/manage/addWork";
})