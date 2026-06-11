<div class="footer container hidden-xs">
    <ul class="footInner">
        <li class="footTittle">Contact us</li>
        <li class="footLi">
            <span class="iconfont icon-shouji"> </span>
            <a class="footText" href="javascript:void(0)">{!!  Theme::get('webSite')['phone'] !!}</a>
        </li>
        <li class="footLi">
            <span class="iconfont icon-youxiang"> </span>
            <a class="footText" href="javascript:void(0)">{!!  Theme::get('webSite')['email'] !!}</a>
        </li>
        <li class="footLi">
            <span class="iconfont icon-weixin"> </span>
            <a class="footText" href="javascript:void(0)">{!!  Theme::get('webSite')['weChat'] !!}</a>
        </li>
    </ul>
    <div class="footInner2">
        <div class="footTittle">About Us</div>
        <div class="intro">{!!  Theme::get('aboutUs') !!}
        </div>
        <div style="clear: both"></div>
        <a href="{{ url('/indexEN#aboutUs') }}" class="moreBottom">Learn more</a>
    </div>
    <div style="clear: both"></div>
    <div class="copyright">
        <span>{!!  Theme::get('webSite')['copyright'] !!}</span>
        <a style="display: block;float: right;color: #ffffff"
           href="javascript:void(0)">Legal Statements and Privacy Policies. Intellectual Property Rights</a>
    </div>
</div>
<div class="footer-m hidden-lg hidden-md hidden-sm">
    <a href="{{ url('/indexEN') }}" class="footer-mBtn index">
        <span class="iconfont icon-shouye1"> </span>
        <span class="bottomText">About us</span>
    </a>
    <a href="{{ url('/benefits') }}" class="footer-mBtn benefits">
        <span class="iconfont icon-kejiqiyefuhuaqipinrenchuangyedaoshipeitaobutie"> </span>
        <span class="bottomText">Benefits</span>
    </a>
    <a href="{{ url('/joinUs') }}" class="footer-mBtn joinUs">
        <span class="iconfont icon-zhaopin-copy"> </span>
        <span class="bottomText">Join us</span>
    </a>
    <a href="{{ url('/contactUs_EN') }}" class="footer-mBtn contactUs">
        <span class="iconfont icon-lianxi"> </span>
        <span class="bottomText">Contact Us</span>
    </a>
    </a>
</div>