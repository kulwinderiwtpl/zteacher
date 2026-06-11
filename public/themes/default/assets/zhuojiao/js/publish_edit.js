layui.use(['upload', 'laydate', 'form', 'util'], function () {
//表单
    var form = layui.form;
// //  //监听提交
    /**** 通用表单提交(AJAX方式)*/
    form.on('submit(formDemo)', function (data) {
        $.ajax({
            url: '/updateWork',
            type: data.form.method,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $(data.form).serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.code === 100) {
                    setTimeout(function () {
                        location.href = '/publish?edit=1';
                        // window.history.back(-1);
                    }, 1000);
                }
                layer.msg(data.msg);
            }
        });
        return false;
    });

//日期
    var laydate = layui.laydate;
//执行一个laydate实例
    laydate.render({
        elem: '#time', //指定元素
    });

});
