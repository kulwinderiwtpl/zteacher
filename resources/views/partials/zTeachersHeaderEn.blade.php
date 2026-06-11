<div class="topBar2 hidden-xs">
    <div class="container padding0 hidden-xs" style="position: relative">
        <ul class="topUl">
          
                <li class="notLogin"><a href="{{ url('/EN/login') }}" target="_blank" style="display: block"><img class="loginIcon"
                                                                                                     src="{{ url('/themes/default/assets/zhuojiao/English/images/loginIcon.png') }}"
                                                                                                     alt="">Login</a>
                </li>
      
            <li class="middle"><a href="{{ url('index') }}">聘请外教</a></li>
            <li><a href="{{ url('indexEN') }}">GET HIRED</a></li>
        </ul>
        <a href="{{ url('indexEN') }}" class="LogoWarpTop hidden-xs">
            <img class="hidden-xs" src="{{ url('/themes/default/assets/zhuojiao/English/images/TLogo.png')}}" alt="">
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
                <li><a class="aboutUs" href="{{ url('/indexEN') }}">About Us</a></li>
                <li><a class="joinUs" href="{{ url('/joinUs') }}">Join Us</a></li>
                <li><a class="Benefits" href="{{ url('/benefits') }}">Benefits</a></li>
                <li><a class="inChina" href="{{ url('/working') }}">Working in China</a></li>
                <li><a class="lifeInChina" href="{{ url('/life') }}">Life in China</a></li>
                <li><a class="contactUs" href="{{ url('/contactUs_EN') }}">Contact Us</a></li>
                <li><a class="myCenter hidden-lg hidden-md hidden-sm" href="{{ url('EN/myCenter') }}">My Center</a></li>
                <li><a class="login hidden-lg  hidden-md hidden-sm" href="{{ url('/EN/login') }}">Login</a></li>
                <li><a class="login hidden-lg  hidden-md hidden-sm" href="{{ url('/index') }}">聘请外教</a></li>
            </ul>
        </div>
        <a href="{{ url('/indexEN') }}" class="LogoWarp hidden-xs">
            <img class="hidden-xs" src="{{ url('/themes/default/assets/zhuojiao/English/images/TLogo.png')}}" alt="">
        </a>
    </div>

</nav>
<!--导航 end-->
