var img_url3 = "";
var img_url2 = "";
var img_url1 = "";

$(function () {
    $.ajax({
        url: '/EN/getImg',
        type: 'get',
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (data) {
            img_url1 = data.img1;
            img_url2 = data.img2;
            img_url3 = data.img3;

            //headImage 的 value
            var dragImgUpload3 = new DragImgUpload("#drop_area_headImg3", img_url3, {
                callback: function (files) {
                    //回调函数，可以传递给后台等等
                    var form = new FormData();
                    form.append("image", files[0]);
                    $.ajax({
                        url: '/uploadHeaderImg',
                        type: 'post',
                        data: form,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data.code == 100) {
                                $('input[name="picture3"]').val(data.data.path);
                            } else {
                                console.log(data.message + ' 上传图片失败，请重试!')
                            }
                        },
                        error: function () {
                            console.log('系统出错，请联系网站管理员！')
                        }

                    });
                }
            });
//headImage 的 value
            var dragImgUpload2 = new DragImgUpload("#drop_area_headImg2", img_url2, {
                callback: function (files) {
                    //回调函数，可以传递给后台等等
                    var form = new FormData();
                    form.append("image", files[0]);
                    $.ajax({
                        url: '/uploadHeaderImg',
                        type: 'post',
                        data: form,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data.code == 100) {
                                $('input[name="picture2"]').val(data.data.path);
                            } else {
                                console.log(data.message + ' 上传图片失败，请重试!')
                            }
                        },
                        error: function () {
                            console.log('系统出错，请联系网站管理员！')
                        }

                    });
                }
            });
//headImage 的 value
            var dragImgUpload1 = new DragImgUpload("#drop_area_headImg", img_url1, {
                callback: function (files) {
                    //回调函数，可以传递给后台等等
                    var form = new FormData();
                    form.append("image", files[0]);
                    $.ajax({
                        url: '/uploadHeaderImg',
                        type: 'post',
                        data: form,
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data.code == 100) {
                                $('input[name="picture1"]').val(data.data.path);
                            } else {
                                console.log(data.message + ' 上传图片失败，请重试!')
                            }
                        },
                        error: function () {
                            console.log('系统出错，请联系网站管理员！')
                        }

                    });
                }
            });

        }
    });
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
            url: '/EN/editResume',
            type: data.form.method,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $(data.form).serialize(),
            dataType: 'json',
            success: function (data) {

                if (data.code === 100) {
                    setTimeout(function () {
                        location.href = '/EN/myCenter';
                        // location.reload();
                    }, 1000);
                }
                layer.msg(data.msg);
            }
        });
        return false;
    });

});


// <!--上传简历文件-->
layui.use('upload', function () {
    var $ = layui.jquery, upload = layui.upload;
    //指定允许上传的文件类型
    upload.render({
        elem: '#uploadFile',
        url: '/uploadFile',
        accept: 'file', //普通文件
        done: function (data) {
            if (data.code == 100) {
                layer.msg('上传成功');
            } else {
                layer.msg('上传失败');
            }
        }
    });
});