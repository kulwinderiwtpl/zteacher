<div class="page-content-area">
    <h1>欢迎进入后台管理</h1>
</div><!-- /.page-content-area -->

<div id="broken" data-data='{!! $broken !!}'></div>
<div id="maxDay" data-data='{!! $maxDay !!}'></div>
<div id="dateArr" data-data='{!! $dateArr !!}'></div>


{!! Theme::asset()->container('specific-js')->usePath()->add('excanvas-js', 'plugins/ace/js/jquery.min.js') !!}
{!! Theme::asset()->container('specific-js')->usePath()->add('easypiechart-js', 'plugins/ace/js/jquery.easypiechart.min.js') !!}
{!! Theme::asset()->container('specific-js')->usePath()->add('sparkline-js', 'plugins/ace/js/jquery.sparkline.min.js') !!}
{!! Theme::asset()->container('specific-js')->usePath()->add('flot-js', 'plugins/ace/js/flot/jquery.flot.min.js') !!}
{!! Theme::asset()->container('specific-js')->usePath()->add('flotPie-js', 'plugins/ace/js/flot/jquery.flot.pie.min.js') !!}
{!! Theme::asset()->container('specific-js')->usePath()->add('flotResize-js', 'plugins/ace/js/flot/jquery.flot.resize.min.js') !!}
{!! Theme::asset()->container('custom-js')->usePath()->add('backstage-js', 'js/backstage.js') !!}
