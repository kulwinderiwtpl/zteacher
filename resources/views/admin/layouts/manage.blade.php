<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">--}}
   = 1)
        <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
 
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<link rel="shortcut icon" href="/themes/default/assets/beer/img/news.png" type="img/x-ico" />--}}

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="/themes/default/assets/plugins/ace/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/themes/default/assets/plugins/ace/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="/themes/default/assets/plugins/ace/css/jquery.gritter.css">

    <!-- text fonts -->
    <link rel="stylesheet" href="/themes/default/assets/plugins/ace/css/ace-fonts.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="/themes/default/assets/plugins/ace/css/ace.min.css" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/themes/default/assets/plugins/ace/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="/themes/default/assets/plugins/ace/css/ace-skins.min.css" />
    <link rel="stylesheet" href="/themes/default/assets/plugins/ace/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/themes/default/assets/plugins/ace/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="/themes/default/assets/plugins/ace/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="/themes/default/assets/plugins/ace/js/html5shiv.min.js"></script>
    <script src="/themes/default/assets/plugins/ace/js/respond.min.js"></script>
    <![endif]-->
    <!--[if !IE]>-->
    <script type="text/javascript">
        window.jQuery || document.write("<script src='/themes/default/assets/plugins/ace/js/jquery.min.js'>"+"<"+"/script>");
    </script>

<!--[endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/themes/default/assets/plugins/ace/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
</head>
<body class="no-skin">

<!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        
          @include('admin.partials.manageheader')
    </div><!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar responsive">
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
        </script>

        {{--<div class="sidebar-shortcuts" id="sidebar-shortcuts">
            
			@include('admin.partials.manageshortcut')
        </div>--}}

        <ul class="nav nav-list">
            
			
			@include('admin.partials.managesidebar')
        </ul>

        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
    </div>
    <!-- /section:basics/sidebar -->
    <div class="main-content">
        <!-- #section:basics/content.breadcrumbs -->
        
        <!-- /section:basics/content.breadcrumbs -->

        <div class="page-content">
            <!-- #section:settings.box -->
            <div class="ace-settings-container" id="ace-settings-container">
                
				@include('admin.partials.managesetting')
            </div>
            <!-- /.ace-settings-container -->
            <div class="page-content-area">
                @yield('content')
            </div><!-- /.page-content-area -->
        </div><!-- /.page-content -->

    </div><!-- /.main-content -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
    <div class="footer">
        <div class="footer-inner">
            <!-- #section:basics/footer -->
            <div class="footer-content" style="z-index:-2">
						{{--<span class="bigger-120">
							
						</span>--}}

                {{--&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
						</span>--}}
            </div>

            <!-- /section:basics/footer -->
        </div>
    </div>
</div><!-- /.main-container -->

<!-- basic scripts -->


<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='/themes/default/assets_bak/plugins/ace/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="/themes/default/assets/plugins/ace/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="/themes/default/assets/plugins/ace/js/jquery.gritter.min.js"></script>

<!-- ace scripts -->
<script src="/themes/default/assets/plugins/ace/js/ace-elements.min.js"></script>
<script src="/themes/default/assets/plugins/ace/js/ace.min.js"></script>

<!-- inline scripts related to this page -->

</body>
<script type="text/javascript">
    function tab(tt){
        $(tt).show().siblings('.item').hide();
    }
</script>
</html>