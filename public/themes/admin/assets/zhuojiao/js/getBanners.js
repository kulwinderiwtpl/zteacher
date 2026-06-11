var type = $('input[name="type"]').val();
//          添加bannerbtn
$("#chineseBannerAdd").click(function () {
    window.location.href = "addBanner/"+type;
})

$(function () {
//          表单提交
    layui.use('form', function () {
        var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功

        //……

        //但是，如果你的HTML是动态生成的，自动渲染就会失效
        //因此你需要在相应的地方，执行下述方法来手动渲染，跟这类似的还有 element.init();
        form.render(); //更新全部

        /*//监听提交
        form.on('submit(formDemo)',
            function (data) {

                // layer.msg(JSON.stringify(data.field));
                return false;
            });*/
    });


    layui.use('layer', function () {
        var $ = layui.jquery;       // 删除操作

        $('a.delete').click(function () {
            var sid = $(this).data('id'); // 获取点击项的id

            layer.confirm("确认要删除吗，删除后不能恢复", {
                title: "删除确认"
            }, function (index) {
                $.get("delBanner/" + sid, function (data) {
                    var num = data.code;
                    layer.msg(data.msg, {
                        icon: num,
                        shade: 0.3,
                        offset: '40%',
                        time: 2000
                    });
                    /*if (data.code == 1) {
                        layer.msg('删除成功');
                    } else if (data.code == 0) {
                        layer.msg('删除失败');
                    }*/
                    //layer.close(index); //如果设定了yes回调，需进行手工关闭

                    setTimeout(function () {              //刷新

                        location.reload();
                    }, 1000);
                });
            });


        })
    })
});