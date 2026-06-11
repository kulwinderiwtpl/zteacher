//加载发布记录
layui.use('flow', function () {
    var flow = layui.flow;
    flow.load({
        elem: '#talentPool' //流加载容器
        ,scrollElem: '' //滚动条所在元素，一般不用填，此处只是演示需要。
        ,isAuto: false
        ,isLazyimg: true
        ,done: function(page, next){ //加载下一页
            var resume;
            var pageCount;
            $.ajax({
                url: '/talentPoolList',
                type: 'get',
                data: {page: page},
                dataType: 'json',
                success: function (data) {
                    resume = data.resume;
                    pageCount = data.pageCount;
                }
            });
            //模拟插入
            setTimeout(function(){
                var lis = [];
                for(var i = 0; i < resume.length; i++){
                    lis.push(' <a href="/getResume/'+resume[i].id+'" class="talentPoolA">\n' +
                        '                <dl class="talentPoolDl">\n' +
                        '                    <dt class="talentPoolDt"><img src="/'+resume[i].picture1+'" alt=""></dt>' +
                        '<dd class="talentPoolDd">人才编号:<span>0'+resume[i].id+'</span></dd>'+
                        '                    <dd class="talentPoolDd">\n' +
                        '                        <div class="textLeft teacherName">姓名：<span>'+resume[i].frist_name+'</span></div>\n' +
                        '                        <div class="textRight">年龄：<span>'+resume[i].age+'</span></div>\n' +
                        '                    </dd>\n' +
                        '                    <dd class="talentPoolDd">\n' +
                        '                        <div class="textLeft textLeft2">国籍：<span>'+resume[i].nationality+'</span></div>\n' +
                        '                        <div class="textRight textRight2">学历：<span>'+resume[i].degree+'</span></div>\n' +
                        ' <span  class="check hidden-md hidden-lg hidden-sm">查看</span>'+
                        '                    </dd>\n' +
                        '                </dl>\n' +
                        '            </a>')
                }
                //执行下一页渲染，第二参数为：满足“加载更多”的条件，即后面仍有分页
                //pages为Ajax返回的总页数，只有当前页小于总页数的情况下，才会继续出现加载更多
                next(lis.join(''), page < pageCount); //假设总页数为 6
                $(".talentPoolA").each(function () {
                    var index = $(this).index();
                    if ((index + 1) % 4 == 0 && index != 0) {
                        $(this).addClass("marginR0")
                    }
                });
            }, 1500);
        }
    });
});