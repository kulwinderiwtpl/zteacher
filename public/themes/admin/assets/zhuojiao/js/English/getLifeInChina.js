$(function () {
    layui.use('layedit', function() {
        var layedit = layui.layedit;

        layedit.build('edit1', { //Benefit package 编辑器
            height: 150,
            tool: [],
        });
        layedit.build('edit2', { //Benefit package 编辑器
            height: 150,
            tool: [],
        });


        layedit.build('edit3', { //Hiring Process 编辑器
//                  height: 150,
            tool: [],
        });
        layedit.build('edit4', { //Extra benefit that only happens when working overseas 编辑器
            height: 150,
            tool: [],
        });

    });

    //          表单提交
    layui.use('form', function() {
        var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功

        //……

        //但是，如果你的HTML是动态生成的，自动渲染就会失效
        //因此你需要在相应的地方，执行下述方法来手动渲染，跟这类似的还有 element.init();
        form.render(); //更新全部

        //Benefit package 监听提交
        form.on('submit(formDemo)', function(data) {
            layui.use('jquery', function() {
                // $(".introduce, .introduce-update").removeClass("dn");
                // $("#introduce-editor, #introduce-submit").removeClass("dib");
                var $ = layui.$;
                $.ajax({
                    type: 'post',
                    url: '/manage/EnglishVersion/updateContent', // ajax请求路径
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {data: data.field},
                    dataType: 'json',
                    success: function (data) {
                        if (data == 'ok') {
                            layer.msg('修改成功');
                        } else if (data == 'error') {
                            layer.msg('修改失败');
                        }
                        setTimeout(function () {//刷新
                            location.reload();
                        }, 1000);
                    }
                });
            });
            return false; //禁止跳转，否则会提交两次，且页面会刷新
        });


        //Hiring Process 监听提交
        form.on('submit(formDemo2)', function(data) {
            layer.msg(JSON.stringify(data.field));
            return false;
        });

        //Extra benefit that only happens when working overseas 监听提交
        form.on('submit(formDemo3)', function(data) {
            layer.msg(JSON.stringify(data.field));
            return false;
        });

    });
    //图片上传
    layui.use('upload', function () {
        var upload = layui.upload;
        //执行实例
        var uploadInst = upload.render({
            elem: '#uploadPictures' //绑定元素
            ,
            url: '/uploadImage' //上传接口
            ,
            done: function (res) {
                //上传完毕回调
            },
            error: function () {
                //请求异常回调
            }
        });
    });
    layui.use('upload', function () {
        var upload = layui.upload;
        //执行实例
        var uploadInst = upload.render({
            elem: '#uploadPictures2' //绑定元素
            ,
            url: '/uploadImage' //上传接口
            ,
            done: function (res) {
                //上传完毕回调
            },
            error: function () {
                //请求异常回调
            }
        });
    });
    layui.use('upload', function () {
        var upload = layui.upload;
        //执行实例
        var uploadInst = upload.render({
            elem: '#uploadPictures3' //绑定元素
            ,
            url: '/uploadImage' //上传接口
            ,
            done: function (res) {
                //上传完毕回调
            },
            error: function () {
                //请求异常回调
            }
        });
    });
});
$(function () {
    layui.use('layer', function () {
        var $ = layui.jquery;       // 删除操作

        $('a.delete').click(function () {
            var sid = $(this).data('id'); // 获取点击项的id

            layer.confirm("确认要删除吗，删除后不能恢复", {
                title: "删除确认"
            }, function (index) {
                $.get("/manage/delConsumption/" + sid, function (data) {
                    var num = data.code ;
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


        })
    })
});

//添加
$("#foreignTeacherTalentPoolAdd").click(function () {
    window.location.href = "/manage/addConsumption";
})


//栏目标题编辑
$("#benefitsEnglishversionTitleEdit").click(function() {
    window.location.href = "/manage/EnglishVersion/aboutusTitle/8";
})