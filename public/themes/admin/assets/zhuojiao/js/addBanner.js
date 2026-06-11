$(function () {
    //          表单提交
    layui.use('form', function () {
        var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功

        //……

        //但是，如果你的HTML是动态生成的，自动渲染就会失效
        //因此你需要在相应的地方，执行下述方法来手动渲染，跟这类似的还有 element.init();
        form.render(); //更新全部

        //监听提交
        form.on('submit(formDemo)',
            function (data) {
                $.ajax({
                    type: 'post',
                    url: '/manage/addBanner', // ajax请求路径
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {data: data.field},
                    dataType: 'json',
                    success: function (data) {
                        if (data.code == 100) {
                            layer.msg('添加成功');
                            location.href = '/manage/'+data.return_url;
                            window.history.back(-1);
                        } else if (data.code == 101) {
                            layer.msg(data.msg);
                        } else{
                            layer.msg('添加失败');
                        }
                    }
                });
                // layer.msg(JSON.stringify(data.field));
                return false;
            });
    });

    //          图片上传
    layui.use('upload', function () {
        var upload = layui.upload;

        //执行实例
        var uploadInst = upload.render({
            elem: '#Album_img' //绑定元素
            ,
            url: '/uploadImage' //上传接口
            ,
            done: function (res) {
                if (res.code == 1) {
                    layer.msg('上传成功，请确认提交！');
                    $('#uploadPictures').attr('src','/'+res.data);
                }else{
                    layer.msg(res.msg);
                }
            },
            error: function () {
                //请求异常回调
            }
        });
    });
});
//          返回按钮
$("#goback").click(function () {
    window.history.back(-1);
})