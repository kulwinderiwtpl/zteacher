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
        });
        //但是，如果你的HTML是动态生成的，自动渲染就会失效
        //因此你需要在相应的地方，执行下述方法来手动渲染，跟这类似的还有 element.init();
        form.render(); //更新全部

        //监听提交
        form.on('submit(formDemo)', function (data) {

            var work_area = "";
            $("input:checkbox[name='work_area']:checked").each(function () {
                if (work_area == 0) {
                    work_area = '["'+$(this).val();
                    return true;
                }
                work_area += '","' + $(this).val();

            });
            work_area += '"]';
            data.field.work_area = work_area;
            var work_location = "";
            $("input:checkbox[name='work_location']:checked").each(function () {
                if (work_location == 0) {
                    work_location = '["' + $(this).val();
                    return true;
                }
                work_location += '","' + $(this).val();

            });
            work_location += '"]';
            data.field.work_location = work_location;

            $.ajax({
                type: 'post',
                url: '/manage/upTalentPool', // ajax请求路径
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {data: data.field},
                dataType: 'json',
                success: function (data) {
                    if (data == 'ok') {
                        layer.msg('修改成功');
                        location.href = '/manage/talentPool';
                        // window.history.back(-1);

                    } else if (data == 'error') {
                        layer.msg('修改失败');
                    }
                }
            });
            // layer.msg(JSON.stringify(data.field));
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
                    $('input[name="picture1"]').val(res.data);
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
                    $('input[name="picture2"]').val(res.data);
                    $('#uploadPictures2').attr('src','/'+res.data);
                }else{
                    layer.msg(res.msg);
                }
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
            elem: '#Album_img3' //绑定元素
            ,
            url: '/uploadImage' //上传接口
            ,
            done: function (res) {
                if (res.code == 1) {
                    layer.msg('上传成功，请确认提交！');
                    $('input[name="picture3"]').val(res.data);
                    $('#uploadPictures3').attr('src','/'+res.data);
                }else{
                    layer.msg(res.msg);
                }
            },
            error: function () {
                //请求异常回调
            }
        });
    });
    //简历上传
    layui.use('upload', function () {
        var upload = layui.upload;
        //执行实例
        var uploadInst = upload.render({
            elem: '#resume' //绑定元素
            ,
            url: '/uploadResume', //上传接口
            accept: 'file',//普通文件
            done: function (res) {
                if (res.code == 1) {
                    layer.msg('简历上传成功，请确认提交！');
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