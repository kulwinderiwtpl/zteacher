<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/themes/admin/assets/zhuojiao/layui/css/layui.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/themes/admin/assets/zhuojiao/css/main.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ url('/themes/admin/assets/zhuojiao/css/chamberCommercelist.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/themes/admin/assets/zhuojiao/fonts/iconfont.css') }}"/>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="{{ url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
{{----}}

    <!-- inline styles related to this page -->
    

    {{--分页样式--}}
    <style type="text/css">
        #pull_right{
            text-align:center;
        }
        .pull-right {
            /*float: left!important;*/
        }
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination > li {
            display: inline;
        }
        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #428bca;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
            color: #2a6496;
            background-color: #eee;
            border-color: #ddd;
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #428bca;
            border-color: #428bca;
        }
        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }
        .clear{
            clear: both;
        }
    </style>
</head>
<body class="app sidebar-mini rtl">
<!-- 导航条-->
<header class="app-header">
    <a class="app-header__logo" href="/manage">Z Teachers</a>
    <!-- 侧边栏切换按钮-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- 导航菜单-->
    <ul class="app-nav">
        <!--<li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>-->
        <!--通知菜单-->
        <li class="dropdown">
            <!--<a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>-->
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <!--<li class="app-notification__title">You have 4 new notifications.</li>
    <div class="app-notification__content">
      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
          <div>
            <p class="app-notification__message">Lisa sent you a mail</p>
            <p class="app-notification__meta">2 min ago</p>
          </div></a></li>
      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
          <div>
            <p class="app-notification__message">Mail server not working</p>
            <p class="app-notification__meta">5 min ago</p>
          </div></a></li>
      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
          <div>
            <p class="app-notification__message">Transaction complete</p>
            <p class="app-notification__meta">2 days ago</p>
          </div></a></li>
      <div class="app-notification__content">
        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
            <div>
              <p class="app-notification__message">Lisa sent you a mail</p>
              <p class="app-notification__meta">2 min ago</p>
            </div></a></li>
        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
            <div>
              <p class="app-notification__message">Mail server not working</p>
              <p class="app-notification__meta">5 min ago</p>
            </div></a></li>
        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
            <div>
              <p class="app-notification__message">Transaction complete</p>
              <p class="app-notification__meta">2 days ago</p>
            </div></a></li>
      </div>
    </div>
    <li class="app-notification__footer"><a href="#">See all notifications.</a></li>-->
            </ul>
        </li>
        <!-- 用户菜单-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">admin<img
                        src="{{ url('/themes/admin/assets/zhuojiao/img/person.png') }}"/></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="{{ url('manage/logout') }}"><i class="fa fa-sign-out fa-lg"></i> 注销</a>
                </li>
                <li>
                    <a class="dropdown-item" href="{!! url('manage/managerDetail/1') !!}"><i class="fa fa-sign-out fa-lg"></i>
                        设置</a>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- 侧边栏菜单-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<!--左侧导航条-->
<aside class="app-sidebar">
    
	@include('admin.partials.aside')
</aside>
<main class="app-content">
    @yield('content')

</main>
{{------------------------------------------------------------------------------}}

<script src="{{ url('/themes/admin/assets/zhuojiao/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('/themes/admin/assets/zhuojiao/js/popper.min.js') }}"></script>
<script src="{{ url('/themes/admin/assets/zhuojiao/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/themes/admin/assets/zhuojiao/layui/layui.js') }}"></script>
<script src="{{ url('/themes/admin/assets/zhuojiao/js/main.js') }}"></script>

<script src="{{ url('/themes/admin/assets/zhuojiao/js/vue.js') }}"></script>
{{-----------------------------------end-------------------------------------------}}
<!-- 与此页面相关的内联脚本 -->

<script src="{{ url('/themes/admin/assets/zhuojiao/js/nav.js') }}"></script>

</body>
</html>