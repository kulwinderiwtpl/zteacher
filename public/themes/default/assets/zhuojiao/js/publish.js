layui.use(['upload', 'laydate', 'form', 'util'], function () {
    var $ = layui.jquery,
        upload = layui.upload;
    //图片上传
    var uploadInst = upload.render({
        elem: '#uploadBtn',
        url: '/upHeaderImg',
        before: function (obj) {
            //预读本地文件示例，不支持ie8
            obj.preview(function (index, file, result) {
                $('#headImgBig').attr('src', result); //图片链接（base64）
            });
        },
        done: function (res) {
            //如果上传失败
            if (res.code != 1) {
                return layer.msg('上传失败');
            } else {
                setTimeout(function () {
                    location.reload();
                }, 1000);
                return layer.msg('上传成功');

            }
            //上传成功
        },
        error: function () {
            //演示失败状态，
            var demoText = $('#demoText');
            demoText.html('<span style="color: #FF5722;display: block;width: 100%;text-align: center;margin: 8px auto">上传失败</span>');
            // demoText.find('.demo-reload').on('click', function () {
            //     uploadInst.upload();
            // });
        }
    });
    //日期
    var laydate = layui.laydate;
    //执行一个laydate实例
    laydate.render({
        elem: '#time', //指定元素
    });
    //    合同期限
    laydate.render({
        elem: '#limit'
        , range: true
    });


//表单
    var form = layui.form;
    // form.render();
// //  //监听提交
    /** 通用表单验证**/
    form.verify({
        het: [/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/, '账号格式不正确'],
        pass: [/^[\S]{6,12}$/, '密码必须6到12位，且不能出现空格']
    });
    /**** 通用表单提交(AJAX方式)*/
    form.on('submit(formDemo)', function (data) {
        $.ajax({
            url: '/publishWork',
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
                        // location.href = data.url;
                    }, 1000);
                }
                layer.msg(data.msg);
            }
        });
        return false;
    });


});

//加载发布记录
layui.use('flow', function () {
    var flow2 = layui.flow;

    flow2.load({
        elem: '#published', //流加载容器
        scrollElem: '',//滚动条所在元素，一般不用填，此处只是演示需要。
        done: function (page, next) { //执行下一页的回调
            var work;
            var pageCount;
            $.ajax({
                url: '/getWork',
                type: 'get',
                data: {page: page},
                dataType: 'json',
                async: 'false',
                success: function (data) {
                    work = data.works;
                    pageCount = data.pageCount;
                }
            });
            //模拟数据插入
            setTimeout(function () {
                var lis = [];
                for (var i = 0; i < work.length; i++) {
                    lis.push(' <ul class="jobCase">' + '<li class="editWarp">' +
                        '<a class="edit" href="/editWork/' + work[i].id + '">编辑</a>' +
                        '<a class="delete" href="javascript:void(0)" data-id="' + work[i].id + '"><span >删除</span></a>' +
                        '</li>' + '<div style="clear: both;"></div>' +
                        '                    <li class="caseList">\n' +
                        /*'                        <div class="caseSpan">发布人：<span class="promulgator">小包子</span> </div>\n' +*/
                        '                        <div style="width: 100%;">发布时间：<span class="date">' + work[i].created_at + '</span></div>\n' +
                        '                    </li>\n' +
                        '                    <li class="caseList">\n' +
                        '                        <div style="width: 100%;" class="caseSpan">开始时间：<span class="promulgator">' + work[i].start_time + '</span> </div>\n' +
                        '                        <div style="width: 100%;">合同期限：<span class="date">' + work[i].deadline + '</span></div>\n' +
                        '                    </li>\n' +
                        '                    <li class="caseList">\n' +
                        '                        <div class="caseSpan">需求数量：<span class="promulgator">' + work[i].count + '</span> </div>\n' +
                        '                        <div> 学历要求：<span class="date">' + work[i].education + '</span></div>\n' +
                        '                    </li>\n' +
                        '                    <li class="caseList">\n' +
                        '                        <div class="caseSpan">科目要求：<span class="promulgator">' + work[i].course + ' </span> </div>\n' +
                        '                        <div>年龄及性别：<span class="date">' + work[i].sex + '   ' + work[i].age + '</span></div>\n' +
                        '                    </li>\n' +
                        '                    <li class="caseList">\n' +
                        '                        <div class="caseSpan">授课地点：<span class="promulgator">' + work[i].site + '</span> </div>\n' +
                        '                        <div>授课科目：<span class="date">' + work[i].teach_course + '</span></div>\n' +
                        '                    </li>\n' +
                        '                    <li class="caseList">\n' +
                        '                        <div class="caseSpan">授课内容：<span class="promulgator">' + work[i].teach_content + '</span> </div>\n' +
                        '                        <div>课时安排：<span class="date">' + work[i].class_hour + '</span></div>\n' +
                        '                    </li>\n' +
                        '                    <li class="caseList">\n' +
                        '                        <div class="caseSpan">税前工资：<span class="promulgator">' + work[i].salary + '</span> </div>\n' +
                        '                        <div>福利：<span class="date">' + work[i].weal + '</span></div>\n' +
                        '                    </li>\n' +
                        '                    <li class="caseList">\n' +
                        '                        <div class="caseSpan">住宿：<span class="promulgator">' + work[i].putUp + '</span> </div>\n' +
                        '                        <div>对外教有无基础中文培训：<span class="date">' + work[i].is_train + '</span></div>\n' +
                        '                    </li>\n' +
                        '<div style="clear: both"></div>'+
                        '                </ul>')
                }
                //执行下一页渲染，第二参数为：满足“加载更多”的条件，即后面仍有分页
                //pages为Ajax返回的总页数，只有当前页小于总页数的情况下，才会继续出现加载更多
                next(lis.join(''), page < pageCount); //假设总页数为 10
                $(".delete").each(function () {
                    $(this).click(function () {
                        $(this).parents(".jobCase").remove();
                        var id = $(this).data('id');
                        $.ajax({
                            type: 'get',
                            url: '/deleteWork', // ajax请求路径
                            data: {id: id},
                            dataType: 'json',
                            async: 'false',
                            success: function (data) {
                                if (data == 'ok') {
                                    layer.msg('删除成功');
                                } else if (data == 'error') {
                                    layer.msg('删除失败');
                                }
                                // setTimeout(function () {//刷新
                                //     location.reload();
                                // }, 1000);
                            }
                        });
                    });
                });
            }, 1000);
        }
    });
});

/*layui.use('layer', function () {
    var $ = layui.jquery;       // 删除操作
    alert($('li a.delete').html());
    $('a.delete').click(function () {
        var sid = $(this).data('id'); // 获取点击项的id
        layer.confirm("确认要删除吗，删除后不能恢复", {
            title: "删除确认"
        }, function (index) {
            $.get("/delect" + sid, function (data) {
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
})*/

$('.tabUl li').click(function () {
    var i = $(this).index();//下标第一种写法
    $(this).addClass('select').siblings().removeClass('select');
    $('.rightBox').eq(i).show().siblings(".rightBox").hide();
});



//按钮事件
$("a.delete").each(function (ojb) {
    $(this).click(function () {
        // $(this).parents(".jobCase").remove()
        alert(1212);
        alert("hi")
    });
});

// alert(document.referrer);

// $('.rightBox').eq(1).show().siblings(".rightBox").hide();
/*function deleteWork(id) {
    $.ajax({
        type: 'get',
        url: '/deleteWork', // ajax请求路径
        data: {id: id},
        dataType: 'json',
        success: function (data) {
            if (data == 'ok') {
                layer.msg('删除成功');
            } else if (data == 'error') {
                layer.msg('删除失败');
            }
            setTimeout(function () {//刷新
                location.reload();
            }, 1000);
        }
    });
}*/


