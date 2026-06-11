<div class="chamberCommercelist-content">
    <!--Benefits-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">Life in China</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li><button class="layui-btn layui-btn-radius" id="benefitsEnglishversionTitleEdit">栏目标题编辑</button></li>
        </ul>
    </div>
</div>


<!--Benefit package-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $living['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $navs[0]['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开</i>
                <textarea style="height: 200px;" name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $living['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
    <a id="1"></a>
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h3 class="service">平均消费&nbsp;&nbsp;<span>Blended ARPU</span></h3>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li>
                <button class="layui-btn layui-btn-radius" id="foreignTeacherTalentPoolAdd">添加</button>
            </li>
        </ul>
    </div>
    <table id="demo" class="layui-table" lay-even lay-skin="nob" lay-filter="listof">
        <colgroup>
            <col width="100">
            <col width="100">
            <col width="100">
            <col class="min" width="100">
        </colgroup>
        <thead>
        <tr>
            <th>消费类型</th>
            <th>城市等级/1级（单位：元）</th>
            <th>城市等级/2级（单位：元）</th>
            <th>城市等级/3级（单位：元）</th>
            <th style="width: 20px;">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($consumption as $v)
            <tr>
                <td>{{ $v['type'] }}</td>
                <td>{{ $v['tier1'] }}</td>
                <td>{{ $v['tier2'] }}</td>
                <td>{{ $v['tier3'] }}</td>
                <td>
                    <!--编辑-->
                    <a href="{{ url('/manage/upConsumption/'.$v['id']) }}" class="update"><i class="iconfont icon-ai-edit"
                                                                                            style="font-size: 25px; color: #919aaa;"></i></a>
                    <!--删除-->
                    <a href="javascript:void(0);" class="delete" data-id="{{ $v['id'] }}"><i
                                class="iconfont icon-chahao"
                                style="font-size: 25px; color: #919aaa;"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


{!! Theme::asset()->container('custom-js')->usePath()->add('getLifeInChina', 'zhuojiao/js/English/getLifeInChina.js') !!}