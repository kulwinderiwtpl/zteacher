<div class="chamberCommercelist-content">
    <!--Benefits-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">Benefits</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li>
                <button class="layui-btn layui-btn-radius" id="benefitsEnglishversionTitleEdit">栏目标题编辑</button>
            </li>
        </ul>
    </div>
</div>


<!--Benefit package-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $benefitPackage['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $navs[0]['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($benefitPackage['image']))
                    <img id="uploadPictures" src="{{ url($benefitPackage['image']) }}"/>
                @else
                    <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（456*341）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">介绍：</label>
            <div class="layui-input-block">
                <textarea name="introduce" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $benefitPackage['introduce'] !!}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开</i>
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $benefitPackage['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>


<!--Hiring Process-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $salary['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $navs[1]['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img2">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($salary['image']))
                    <img id="uploadPictures2" src="{{ url($salary['image']) }}"/>
                @else
                    <img id="uploadPictures2" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（1917*469）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                {{--<i style="color: #f77;">多条数据请按【回车】键断开</i>--}}
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $salary['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
    <a id="1"></a>
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h3 class="service">平均工资&nbsp;&nbsp;<span>AVERAGE WAGE</span></h3>
        </div>
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
            <th>教育者类型</th>
            <th>
                城市等级/1级<br>
                【一般工资范围<strong style="color: red;">|</strong>美元计价】
            </th>
            <th>
                城市等级/2级<br>
                【一般工资范围<strong style="color: red;">|</strong>美元计价】
            </th>
            <th>
                城市等级/3级<br>
                【一般工资范围<strong style="color: red;">|</strong>美元计价】
            </th>
            <th style="width: 20px;">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($averageWage as $v)
            <tr>
                <td>{{ $v['genre'] }}</td>
                <td>{{ $v['tier1'] }} <strong style="color: red;">|</strong> {{ $v['tier1En'] }}</td>
                <td>{{ $v['tier2'] }} <strong style="color: red">|</strong> {{ $v['tier2En'] }}</td>
                <td>{{ $v['tier3'] }} <strong style="color: red">|</strong> {{ $v['tier3En'] }}</td>
                <td>
                    <!--编辑-->
                    <a href="{{ url('manage/upAverageWage/'.$v['id']) }}" class="update"><i
                                class="iconfont icon-ai-edit"
                                style="font-size: 25px; color: #919aaa;"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!--Extra benefit that only happens when working overseas-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $benefit['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $navs[2]['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img3">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($benefit['image']))
                    <img id="uploadPictures3" src="{{ url($benefit['image']) }}"/>
                @else
                    <img id="uploadPictures3" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（456*341）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开</i>
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $benefit['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>

{!! Theme::asset()->container('custom-js')->usePath()->add('getBenefits', 'zhuojiao/js/English/getBenefits.js') !!}