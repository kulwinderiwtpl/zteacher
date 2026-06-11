<ul class="app-menu">
    {{--<li class="treeview treeview1">
        <a class="app-menu__item" href="#" data-toggle="treeview"><span class="iconfont icon-hengfuguanli"
                                                                        style="padding: 0 8px 0 3px;font-size: 20px;"></span><span
                    class="app-menu__label">Banner</span></span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="{{ url('manage/getChineseBanner') }}">中文Banner</a>
            </li>
            <li>
                <a class="treeview-item" href="{{ url('manage/getEnglishBanner') }}">英文Banner</a>
            </li>
        </ul>
    </li>--}}
    <li class="treeview treeview2">
        <a class="app-menu__item" href="#" data-toggle="treeview"><span class="iconfont icon-zhongwenyuyan"
                                                                        style="padding: 0 5px 0 0;font-size: 25px;"></span><span
                    class="app-menu__label">中文版管理</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="{{ url('manage/getChineseBanner') }}">Banner</a>
            </li>
            <li>
                <a class="treeview-item" href="{{ url('manage/aboutUs') }}">关于我们</a>
            </li>
            <li>
                <a class="treeview-item" href={{ url('manage/hiringForeign') }}>聘请外教</a>
            </li>
           {{-- <li>
                <a class="treeview-item" href="{{ url('manage/talentPool') }}">外教人才库</a>
            </li>--}}
            <li>
                <a class="treeview-item" href="{{ url('manage/contactUs') }}">联系我们</a>
            </li>
        </ul>
    </li>
    <li class="treeview treeview3">
        <a class="app-menu__item" href="#" data-toggle="treeview"><span class="iconfont icon-yingwenyuyan"
                                                                        style="padding: 0 5px 0 0;font-size: 25px;"></span><span
                    class="app-menu__label">英文版管理</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="{{ url('manage/getEnglishBanner') }}">Banner</a>
            </li>
            <li>
                <a class="treeview-item" href="{{ url('/manage/EnglishVersion/aboutUs') }}">About Us</a>
            </li>
            <li>
                <a class="treeview-item" href="{{ url('/manage/EnglishVersion/joinUs') }}">Join Us</a>
            </li>
            <li>
                <a class="treeview-item" href="{{ url('/manage/EnglishVersion/benefits') }}">Benefits</a>
            </li>
            <li>
                <a class="treeview-item" href="{{ url('/manage/EnglishVersion/workingInChina') }}">Working in China</a>
            </li>
            <li>
                <a class="treeview-item" href="{{ url('/manage/EnglishVersion/lifeInChina') }}">Life in China</a>
            </li>

            <li>
                <a class="treeview-item" href="{{ url('/manage/EnglishVersion/contactUs') }}">Contact Us</a>
            </li>
        </ul>
    </li>
    <li class="treeview treeview4">
        <a class="app-menu__item" href="#" data-toggle="treeview"><span class="iconfont icon-shujuzhongxin"
                                                                        style="padding: 0 8px 0 2px;font-size: 20px;"></span><span
                    class="app-menu__label">数据管理</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="{{ url('/manage/memberInformation') }}">会员信息</a>
            </li>
            <li>
                <a class="treeview-item" href="{{ url('/manage/publishedWork') }}">发布工作</a>
            </li>
            <li>
                <a class="treeview-item" href="{{ url('manage/talentPool') }}">外教人才库</a>
            </li>
        </ul>
    </li>
    {{--<li class="treeview treeview5">
        <a class="app-menu__item" href="#" data-toggle="treeview"><span class="iconfont icon-shujuzhongxin"
                                                                        style="padding: 0 8px 0 2px;font-size: 20px;"></span><span
                    class="app-menu__label">网站配置</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li>
                <a class="treeview-item" href="{{ url('manage/webSize') }}">站点信息</a>
            </li>
        </ul>
    </li>--}}
</ul>
