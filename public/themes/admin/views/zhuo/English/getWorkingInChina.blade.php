<div class="chamberCommercelist-content">
    <!--Benefits-->
    <div class="app-title">
        <div>
            <!--展示文本-->
            <h1 class="introduce">Working in China</h1>
        </div>
        {{--<ul class="app-breadcrumb breadcrumb">
            <li><button class="layui-btn layui-btn-radius" id="benefitsEnglishversionTitleEdit">栏目标题编辑</button></li>
        </ul>--}}
    </div>
</div>


<!--What are the requirements for teaching in China?-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $requirements['id'] }}">
        <div class="app-title">
            <!--展示文本-->
            <h3 class="target">{{ $requirements['title'] }}</h3>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题：</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $requirements['title'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($requirements['image']))
                    <img id="uploadPictures" src="{{ url($requirements['image']) }}"/>
                @else
                    <img id="uploadPictures" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（456*341）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">介绍：</label>
            <div class="layui-input-block">
                <input type="text" name="introduce" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $requirements['introduce'] }}">
                {{--<textarea name="introduce" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $requirements['introduce'] !!}</textarea>--}}
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开</i>
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $requirements['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>


<!--What is TEFL and TESOL-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $certified['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $certified['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题：</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $certified['title'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img2">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($certified['image']))
                    <img id="uploadPictures2" src="{{ url($certified['image']) }}"/>
                @else
                    <img id="uploadPictures2" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（1140*425）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><strong>TEFL</strong>：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开</i>
                <textarea name="introduce" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $certified['introduce'] !!}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><strong>TESOL</strong>：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开</i>
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $certified['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>


<!--Get a Working Permit From School To Apply For a Working Visa-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $permit['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $permit['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题：</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $permit['title'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img3">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($permit['image']))
                    <img id="uploadPictures3" src="{{ url($permit['image']) }}"/>
                @else
                    <img id="uploadPictures3" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（418*418）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">介绍：</label>
            <div class="layui-input-block">
                <input type="text" name="introduce" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $permit['introduce'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开,标题与内容之间用&&隔开 例：1.标题&&内容【回车】2.标题&&内容</i>
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $permit['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>

<!--How to get a Chinese Z visa-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $visa['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $visa['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题：</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $visa['title'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img4">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($visa['image']))
                    <img id="uploadPictures4" src="{{ url($visa['image']) }}"/>
                @else
                    <img id="uploadPictures4" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（555*260）</i>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">介绍：</label>
            <div class="layui-input-block">
                <input type="text" name="introduce" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $visa['introduce'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开</i>
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $visa['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>

<!--After Arriving In China-->
<div class="chamberCommercelist-content">
    <form class="layui-form">
        <input type="hidden" name="id" value="{{ $arriving['id'] }}">
        <div class="app-title">
            <div>
                <!--展示文本-->
                <h3 class="target">{{ $arriving['title'] }}</h3>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题：</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $arriving['title'] }}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片：</label>
            <div class="layui-input-block">
                <button type="button" class="layui-btn" id="Album_img5">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
                @if(!empty($arriving['image']))
                    <img id="uploadPictures5" src="{{ url($arriving['image']) }}"/>
                @else
                    <img id="uploadPictures5" src="/themes/admin/assets/zhuojiao/img/upload-bgimg.png"/>
                @endif
                <i style="color: #f77;">##建议图片尺寸为（1140*426）</i>
            </div>
        </div>
        {{--<div class="layui-form-item">
            <label class="layui-form-label">介绍：</label>
            <div class="layui-input-block">
                <input type="text" name="introduce" required lay-verify="required" autocomplete="off"
                       class="layui-input add-input" value="{{ $requirements['introduce'] }}">
            </div>
        </div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">内容：</label>
            <div class="layui-input-block">
                <i style="color: #f77;">多条数据请按【回车】键断开</i>
                <textarea name="content" placeholder="请输入内容"
                          class="layui-textarea layui-textareanew">{!! $arriving['content'] !!}</textarea>
            </div>
        </div>
        <!--内容提交按钮-->
        <button lay-submit lay-filter="formDemo" class="layui-btn layui-btn-radius affirm">确认</button>
    </form>
</div>

{!! Theme::asset()->container('custom-js')->usePath()->add('getWorkingInChina', 'zhuojiao/js/English/getWorkingInChina.js') !!}