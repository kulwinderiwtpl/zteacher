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
            url: '/CN/editPassword',
            type: data.form.method,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $(data.form).serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.code == 100) {
                    setTimeout(function () {
                        location.href = '/CN/login?email='+data.data;
                    }, 1000);
                }
                return layer.msg(data.msg);
            }
        });
        return false;
    });

});