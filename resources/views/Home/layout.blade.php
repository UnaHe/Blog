<!DOCTYPE html>
<!--[if IE 6]><html class="ie lt-ie8"><![endif]-->
<!--[if IE 7]><html class="ie lt-ie8"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">

    <meta name="description"  content="简书是一个优质的创作社区，在这里，你可以任性地创作，一篇短文、一张照片、一首诗、一幅画……我们相信，每个人都是生活中的艺术家，有着无穷的创造力。">
    <meta name="keywords"  content="简书,简书官网,图文编辑软件,简书下载,图文创作,创作软件,原创社区,小说,散文,写作,阅读">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - {{ $title }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/Home/logo_ico_16X16.ico') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">

    <link rel="stylesheet" media="all" href="{{ asset('home/css/web-e7e403d2843dd1edd8db.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('home/css/entry-7642b94e17df29096c13.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('home/css/entry-0a03cade4dfc10c5a79b.css') }}" />
    <style>
        .layui-carousel {
            left: 15px;
        }
    </style>
</head>

<body lang="zh-CN" class="reader-black-font">
<!-- 全局顶部导航栏 -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="width-limit">
        <!-- 左上方 Logo -->
        <a class="logo" href="/"><img src="{{ asset('images/home/logo_home.png') }}" alt="Logo" /></a>

        <!-- 右上角 -->
        <!-- 未登录显示登录/注册/写文章 -->
        <!--<a class="btn write-btn" target="_blank" href="/writer#/">-->
        <!--<i class="iconfont ic-write"></i>写文章-->
        <!--</a>-->
        <!--<a class="btn sign-up" href="/sign_up">注册</a>-->
        <!--<a class="btn log-in" href="/sign_in">登录</a>-->

        <!-- 登录显示写文章 -->
        <a class="btn write-btn" target="_blank" href="{{url('/writer#/')}}">
            <i class="iconfont ic-write"></i>写文章
        </a>
        <!-- 如果用户登录，显示下拉菜单 -->

        <!--js移入事件 class加 open-->
        <div class="user" id="yonghu">
            <div data-hover="dropdown">
                <a class="avatar" href="/u/d6fc8a033b98"><img src="{{asset('home/images/picture/72f15e83-7f50-45ab-af3a-d031fb4e8934.jpg')}}" alt="120" /></a>
            </div>
            <ul class="dropdown-menu">
                <li>
                    <a href="/u/d6fc8a033b98">
                        <i class="iconfont ic-navigation-profile"></i><span>我的主页</span>
                    </a>
                </li>
                <li>
                    <!-- TODO bookmarks_path -->
                    <a href="/bookmarks">
                        <i class="iconfont ic-navigation-mark"></i><span>收藏的文章</span>
                    </a>
                </li>
                <li>
                    <a href="/users/d6fc8a033b98/liked_notes">
                        <i class="iconfont ic-navigation-like"></i><span>喜欢的文章</span>
                    </a>
                </li>
                <li>
                    <a href="/wallet">
                        <i class="iconfont ic-navigation-wallet"></i><span>我的钱包</span>
                    </a>
                </li>
                <li>
                    <a href="/settings">
                        <i class="iconfont ic-navigation-settings"></i><span>设置</span>
                    </a>
                </li>
                <li>
                    <a href="/faqs">
                        <i class="iconfont ic-navigation-feedback"></i><span>帮助与反馈</span>
                    </a>
                </li>
                <li>
                    <a rel="nofollow" data-method="delete" href="/sign_out">
                        <i class="iconfont ic-navigation-signout"></i><span>退出</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="navbar-header">
                <button id="caidan" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu" aria-expanded="true">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="menu" aria-expanded="false" style="230px">
                <ul class="nav navbar-nav">
                    <!--未登录显示 首页 -->
                    <!--<li class="active">-->
                    <!--<a href="/">-->
                    <!--<span class="menu-text">首页</span><i class="iconfont ic-navigation-discover menu-icon"></i>-->
                    <!--</a>-->
                    <!--</li>-->
                    <!--登录显示 发现 关注 消息-->
                    <li class="active">
                        <a href="/">
                            <span class="menu-text">发现</span><i class="iconfont ic-navigation-discover menu-icon"></i>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('/home/attention') }}">
                            <span class="menu-text">关注</span><i class="iconfont ic-navigation-follow menu-icon"></i>
                        </a>
                    </li>
                    <li class="notification" id="xiaoxi">
                        <a data-hover="dropdown" href="/notifications" class="notification-btn">
                            <span class="menu-text">消息</span>
                            <i class="iconfont ic-navigation-notification menu-icon"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/notifications#/comments">
                                    <i class="iconfont ic-comments"></i>
                                    <span>评论</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/home/messages') }}">
                                    <i class="iconfont ic-chats"></i>
                                    <span>简信</span>
                                </a>
                            </li>
                            <li>
                                <a href="/notifications#/requests">
                                    <i class="iconfont ic-requests"></i>
                                    <span>投稿请求</span>
                                </a>
                            </li>
                            <li>
                                <a href="/notifications#/likes">
                                    <i class="iconfont ic-likes"></i>
                                    <span>喜欢和赞</span>
                                </a>
                            </li>
                            <li>
                                <a href="/notifications#/follows">
                                    <i class="iconfont ic-follows"></i>
                                    <span>关注</span>
                                </a>
                            </li>
                            <li>
                                <a href="/notifications#/money">
                                    <i class="iconfont ic-money"></i>
                                    <span>赞赏</span>
                                </a>
                            </li>
                            <li>
                                <a href="/notifications#/others">
                                    <i class="iconfont ic-others"></i>
                                    <span>其他消息</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="search">
                        <form target="_blank" action="/search" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />
                            <input type="text" name="q" id="q" value="" autocomplete="off" placeholder="搜索" class="search-input" />
                            <a class="search-btn" href="javascript:void(null)"><i class="iconfont ic-search"></i></a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

@yield('content')


<!--返回顶部代码-->

<footer class="container">
    <div class="row">
        <div class="col-xs-17 main">
            <a target="_blank" href="http://www.jianshu.com/c/jppzD2">关于简书</a><em> · </em><a target="_blank" href="http://www.jianshu.com/contact">联系我们</a><em> · </em><a target="_blank" href="http://www.jianshu.com/c/bfeec2e13990">加入我们</a><em> · </em><a target="_blank" href="http://www.jianshu.com/p/fc1c113e5b6b">简书出版</a><em> · </em><a target="_blank" href="http://www.jianshu.com/press">品牌与徽标</a><em> · </em><a target="_blank" href="http://www.jianshu.com/faqs">帮助中心</a><em> · </em><a target="_blank" href="http://www.jianshu.com/p/cabc8fa39830">合作伙伴</a>      <div class="icp">
                ©2012-2017 上海佰集信息科技有限公司 / Tel:021-61995350 / 简书 / 沪ICP备11018329号-5 /  <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010402002252">沪公网安备31010402002252号 / </a>
                <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010402002252">
                    <img src="{{ asset('home/images/picture/smrz-14723344f0991457bfc9f5172c219a5f.png') }}" alt="Smrz" />
                </a>
                <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010402002252">沪公网安备31010402002252号 / </a>
                <a target="_blank" href="http://www.shjbzx.cn/">
                    <img src="{{ asset('home/images/picture/wxb-a216456895eb66c17497dbd3da443cf8.png') }}" alt="Wxb" />
                </a>        举报电话：021-34770013
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('layui/layui.all.js') }}"></script>

<script>
    layui.use(['util','layer'], function(){
        var util = layui.util,
            layer = layui.layer
            $ = layui.jquery;

        // 导航栏鼠标移入移除事件.
        // 消息.
        $('#xiaoxi').mouseover(function(){
            $('#xiaoxi').attr('class','notification open');
        });
        $('#xiaoxi').mouseout(function(){
            $('#xiaoxi').attr('class','notification');
        });
        // 用户.
        $('#yonghu').mouseover(function(){
            $('#yonghu').attr('class','user open');
        });
        $('#yonghu').mouseout(function(){
            $('#yonghu').attr('class','user');
        });
        // 菜单.
        var flag = 1;
        $('#caidan').on('click',function(){
            if(flag == 1){
                $('#menu').attr({'aria-expanded':true,'class':'navbar-collapse collapse in'});
                flag = 0;
            }else{
                $('#menu').attr({'aria-expanded':false,'class':'navbar-collapse collapse'});
                flag = 1;
            }
        });

        //固定块
        util.fixbar({
            bar1: '&#xe600;'
            ,bar2: '&#xe641;'
            ,css: {right: 50, bottom: 100}
            ,bgcolor: '#393D49'
            ,click: function(type){
                if(type === 'bar1'){
                    layer.msg('icon是可以随便换的')
                } else if(type === 'bar2') {
                    layer.msg('两个bar都可以设定是否开启')
                }
            }
        });
    });
</script>

@yield('js')

</body>
</html>