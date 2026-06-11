$(function () {
    layui.use('layedit', function () {
        var layedit = layui.layedit;

        layedit.build('edit1', { //外教标准   编辑器
            height: 150,
            tool: [],
        });
        layedit.build('edit2', { //外教基本工资与福利要求 编辑器
            height: 200,
            tool: [],
        });

    });

    //          表单提交
    layui.use('form', function () {
        var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功

        //……

        //但是，如果你的HTML是动态生成的，自动渲染就会失效
        //因此你需要在相应的地方，执行下述方法来手动渲染，跟这类似的还有 element.init();
        form.render(); //更新全部

        //为何选择我们监听提交
        form.on('submit(formDemo)', function (data) {
            layui.use('jquery', function () {
                // $(".introduce, .introduce-update").removeClass("dn");
                // $("#introduce-editor, #introduce-submit").removeClass("dib");
                var $ = layui.$;
                $.ajax({
                    type: 'post',
                    url: '/manage/updateContent', // ajax请求路径
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {data: data.field},
                    dataType: 'json',
                    success: function (data) {
                        if (data.code == 100) {
                            layer.msg('修改成功');
                        } else {
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

        //外教聘请流程监听提交
        form.on('submit(formDemo1)', function (data) {
            layer.msg(JSON.stringify(data.field));
            return false;
        });

        //外教标准监听提交
        form.on('submit(formDemo2)', function (data) {
            layer.msg(JSON.stringify(data.field));
            return false;
        });

        //外教基本工资与福利要求监听提交
        form.on('submit(formDemo3)', function (data) {
            layer.msg(JSON.stringify(data.field));
            return false;
        });

        //Z Teachers收费标准监听提交
        form.on('submit(formDemo4)', function (data) {
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });

    //图片上传
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
                }else {
                    layer.msg(res.msg);
                }
            },
            error: function () {
                //请求异常回调
            }
        });
    });
    //图片上传
    layui.use('upload', function () {
        var upload = layui.upload;
        //执行实例
        var uploadInst = upload.render({
            elem: '#Album_img2' //绑定元素
            ,
            url: '/uploadImage' //上传接口
            ,
            done: function (res) {
                if (res.code == 1) {
                    layer.msg('上传成功，请确认提交！');
                    $('#uploadPictures2').attr('src','/'+res.data);
                }else {
                    layer.msg(res.msg);
                }
            },
            error: function () {
                //请求异常回调
            }
        });
    });
});

//栏目标题编辑
$("#hiringForeignTitleEdit").click(function () {
    window.location.href = "hiringForeignTitle/2";
});
/*
function preview(obj) {
    var img = document.getElementById("uploadPictures");
    img.src = window.URL.createObjectURL(obj.files[0]);
}

function preview2(obj) {
    var img = document.getElementById("uploadPictures2");
    img.src = window.URL.createObjectURL(obj.files[0]);
}*/
