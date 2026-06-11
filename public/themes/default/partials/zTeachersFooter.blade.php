<div class="footer container hidden-xs">
    <ul class="footInner">
        <li class="footTittle">联系我们</li>
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
        <div class="footTittle">关于我们</div>
        <div class="intro">{!!  Theme::get('aboutUs') !!}
        </div>
        <div style="clear: both"></div>
        <a href="{{ url('/index#aboutUs') }}" class="moreBottom">了解更多</a>
    </div>
    <div style="clear: both"></div>
    <div class="copyright">
        <span>{!!  Theme::get('webSite')['copyright'] !!}</span>
        <a style="display: block;float: right;color: #ffffff" href="javascript:void(0)">法律声明及隐私权政策·知识产权 </a>
    </div>
</div>
<div class="footer-m hidden-lg hidden-md hidden-sm">
    <a href="{{ url('/index') }}" class="footer-mBtn index">
        <span class="iconfont icon-shouye1"> </span>
        <span class="bottomText">首页</span>
    </a>
    <a href="{{ url('/hiring') }}" class="footer-mBtn hiring">
        <span class="iconfont icon-kejiqiyefuhuaqipinrenchuangyedaoshipeitaobutie"> </span>
        <span class="bottomText">聘请</span>
    </a>
    <a href="{{ url('/publish') }}" class="footer-mBtn publish">
        <span class="iconfont icon-zhaopin-copy"> </span>
        <span class="bottomText">发布</span>
    </a>
    <a href="{{ url('/talentPool') }}" class="footer-mBtn talentPool">
        <span class="iconfont icon-zhaopin2"> </span>
        <span class="bottomText">人才库</span>
    </a>
    <a href="{{ url('/contactUs') }}" class="footer-mBtn contactUs">
        <span class="iconfont icon-lianxi"> </span>
        <span class="bottomText">联系</span>
    </a>
</div>