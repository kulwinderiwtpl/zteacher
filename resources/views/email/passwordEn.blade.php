<head>
    <base target="_blank"/>
</head>
<body tabindex="0" role="listitem">

<style>
    .email-body {
        color: #40485B;
        font-size: 14px;
        font-family: -apple-system, "Helvetica Neue", Helvetica, "Nimbus Sans L", "Segoe UI", Arial, "Liberation Sans", "PingFang SC", "Microsoft YaHei", "Hiragino Sans GB", "Wenquanyi Micro Hei", "WenQuanYi Zen Hei", "ST Heiti", SimHei, "WenQuanYi Zen Hei Sharp", sans-serif;
        background: #f8f8f8
    }

    a {
        color: #FE7300;
        text-decoration: underline
    }

    a:hover {
        color: #fe9d4c
    }

    a:active {
        color: #b15000
    }

    .logo {
        text-align: center;
        margin-bottom: 20px
    }

    .panel {
        background: #fff;
        border: 1px solid #E3E9ED;
        margin-bottom: 10px
    }

    .panel-header {
        font-size: 18px;
        line-height: 30px;
        padding: 10px 20px;
        background: #fcfcfc;
        border-bottom: 1px solid #E3E9ED
    }

    .panel-body {
        padding: 20px;
        line-height: 1.7
    }

    .container {
        width: 100%;
        max-width: 600px;
        padding: 20px;
        margin: 0 auto
    }

    .footer {
        color: #9B9B9B;
        font-size: 12px;
        margin-top: 20px
    }

    .footer a {
        color: #9B9B9B
    }

    .footer a:hover {
        color: #fe9d4c
    }

    .footer a:active {
        color: #b15000
    }
</style>

<div class="email-body">
    <div class="container">
        <div class="logo">
            <img alt="Logo-black" style="height: 70px;" height="30" src="{{ url('/themes/default/assets/zhuojiao/English/images/TLogo.png') }}">
        </div>
        <div class="panel">
            <div class="panel-header">
                Reset the password

            </div>
            <div class="panel-body">
                <p>Hello <A data-auto-link=1 href="mailto:{!! $mail['to'] !!}"> {!! $mail['to'] !!}</A>！</p>
                <p>
                    You have requested a password reset, which can be done by clicking on the link below.
                </p>
                <p>
                    <a href="{!! url('EN/password/edit?email='.urlencode($mail['to']).'&reset_password_token='.$mail['reset_password_token']) !!}">{!! url('password/edit?email='.urlencode($mail['to']).'&reset_password_token='.$mail['reset_password_token']) !!}</a>
                </p>
                <p>{{--如果您没有请求重置密码，请忽略这封邮件。--}}This link is valid for 12 hours and needs to be verified again after 12 hours. If it is not an email sent by you, please check your account</p>
                <p>Your password will remain the same until you click the link above to change it.</p>

            </div>
        </div>
        <div class="footer">
            @Z Teachers
            <div class="pull-right"></div>
        </div>
    </div>
</div>

<style type="text/css">
    body {
        line-height: 1.666;
        padding: 0;
        margin: 0;
        overflow: auto;
        white-space: normal;
        word-wrap: break-word;
        min-height: 100px
    }

    img {
        border: 0
    }

    header, footer, section, aside, article, nav, hgroup, figure, figcaption {
        display: block
    }

    blockquote {
        margin-right: 0px
    }
</style>


<style id="ntes_link_color" type="text/css">
    a, td a {
        color: #064977
    }
</style>

</body>