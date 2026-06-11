layui.use(['upload', 'laydate', 'form', 'util'], function () {
    var $ = layui.jquery
        , upload = layui.upload;
    //图片上传
    var uploadInst = upload.render({
        elem: '#uploadBtn',
        url: '/EN/uploadHeaderImg',
        before: function (obj) {
            //预读本地文件示例，不支持ie8
            obj.preview(function (index, file, result) {
                $('#headImgBig').attr('src', result); //图片链接（base64）
            });
        }
        , done: function (res) {
            //如果上传失败
            if (res.code != 1) {
                return layer.msg('上传失败');
            }else{
                setTimeout(function () {
                    location.reload();
                }, 1000);
                return layer.msg('上传成功');

            }
            //上传成功
        }
        , error: function () {
            //演示失败状态，
            var demoText = $('#demoText');
            demoText.html('<span style="color: #FF5722;display: block;width: 100%;text-align: center;margin: 8px auto">上传失败</span>');
            // demoText.find('.demo-reload').on('click', function () {
            //     uploadInst.upload();
            // });
        }
    });
});
//加载发布记录
layui.use('flow', function () {
    var flow2 = layui.flow;

    $(".delete").each(function () {
        $(this).click(function () {
            $(this).parents(".jobCase").remove();
            // alert("hi")
            $.ajax({
                url: '/EN/delResume',
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
        });
    });
    function caseList(){
        if (screen.width <= 1440) {
            $(".caseList div").each(function () {
                if($(this).text().length>14){
                    // $(this).addClass("sad")
                    $(this).css('width','100%')
                }
            });
        }
    }
    $(window).resize(function () {
        caseList()
    });
    $(document).ready(function () {
        caseList()
    });
})
;
