$(function () {
    //          表单提交
    layui.use(['form', 'layedit', 'laydate'], function () {
        var form = layui.form,
            layer = layui.layer,
            layedit = layui.layedit,
            laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date',
            type: 'datetime'
        });
        laydate.render({
            elem: '#date1'
        });//但是，如果你的HTML是动态生成的，自动渲染就会失效
        //因此你需要在相应的地方，执行下述方法来手动渲染，跟这类似的还有 element.init();
        form.render(); //更新全部

        //监听提交
        form.on('submit(formDemo)', function (data) {
            $.ajax({
                type: 'post',
                url: '/manage/upWork', // ajax请求路径
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {data: data.field},
                dataType: 'json',
                success: function (data) {
                    if (data == 'ok') {
                        layer.msg('修改成功');
                        window.history.back(-1);
                    } else if (data == 'error') {
                        layer.msg('修改失败');
                    }

                }
            });
            // layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
});

//          返回按钮
$("#goback").click(function () {
    window.history.back(-1);
})