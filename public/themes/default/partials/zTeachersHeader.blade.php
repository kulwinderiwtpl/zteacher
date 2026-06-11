<div class="topBar2 hidden-xs">
    <div class="container padding0 hidden-xs" style="position: relative">
        <ul class="topUl">
            @if(Theme::get('user'))
                <li class="hidden-xs userLi" style="padding-right: 20px">
                    <a href="javascript:void(0)" class="userName">{!!  Theme::get('user')['username'] !!}</a>
                    <div class="userHead" style="transform: translateY(11%)">
                        @if(isset(Theme::get('user')['headerImg']))
                            <img src="{{ url(Theme::get('user')['headerImg']) }}" alt="">
                        @else
                            <img src="{{ url('/themes/default/assets/zhuojiao/images/headImgBig.png') }}" alt="">
                        @endif
                    </div>
                    <ul class="dropDown">
                        <li class="dropDownLi">
                            <a target="_blank" href="{{ url('publish') }}">个人中心</a>
                        </li>
                        <li class="dropDownLi">
                            <a target="_blank" href="{{ url('CN/changePassword') }}">修改密码</a>
                        </li>
                        <li class="dropDownLi">
                            <a class="logOut" href="javascript:void(0)">退出登录</a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="notLogin"><a href="/CN/login" target="_blank" style="display: block"><img class="loginIcon"
                                                                                                     src="{{ url('/themes/default/assets/zhuojiao/images/loginIcon.png') }}"
                                                                                                     alt="">登录</a></li>
            @endif
            <li class="middle"><a href="{{ url('index') }}">聘请外教</a></li>
            <li><a href="{{ url('indexEN') }}">GET HIRED</a></li>
        </ul>
        <a href="{{ url('index') }}" class="LogoWarpTop hidden-xs">
            <img class="hidden-xs" src="{{ url('/themes/default/assets/zhuojiao/images/TLogo.png') }}" alt="">
        </a>
    </div>
</div>
<!--导航-->
<nav class="navbar navbar-default navbar-fixed-top topBig" role="navigation">
    <div class="container indexTop">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
                <span class="icon-bar"> </span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a class="aboutUs" href="{{ url('/index') }}">关于我们</a></li>
                <li><a class="hiring" href="{{ url('/hiring') }}">聘请外教</a></li>
                <li><a class="publish" href="{{ url('/publish') }}">发布工作</a></li>
                <li><a class="talentPool" href="{{ url('/talentPool') }}">外教人才库</a></li>
                <li><a class="contactUs" href="{{ url('/contactUs') }}">联系我们</a></li>
                <li><a class="login hidden-lg  hidden-md hidden-sm" href="{{ url('/CN/login') }}">登录</a></li>
                <li><a class="login hidden-lg  hidden-md hidden-sm" href="{{ url('/indexEN') }}">GET HIRED</a></li>
            </ul>
        </div>
        <a href="{{ url('/index') }}" class="LogoWarp hidden-xs">
            <img class="hidden-xs" src="{{ url('/themes/default/assets/zhuojiao/images/TLogo.png') }}" alt="">
        </a>
    </div>

</nav>
<!--导航 end-->
