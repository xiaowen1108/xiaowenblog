<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>{{$title or Config::get('web.title')}}</title>
    <meta name="keywords" content="{{$keywords or Config::get('web.keywords')}}" />
    <meta name="description" content="{{$description or Config::get('web.description')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=4,minimum-scale=1, user-scalable=no" />
    <link rel="shortcut icon" href="{{asset('resources/views/home/style/images/favicon.ico')}}" />
    <script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/home/style/js/suxingme.js')}}"></script>
    <link rel='stylesheet' id='fontello-css'  href='{{asset('resources/views/home/style/css/fontello.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' id='main-css'  href='{{asset('resources/views/home/style/css/style.css')}}' type='text/css' media='all' />
    <script type='text/javascript' src='{{asset('resources/views/home/style/js/jquery-2.1.4.min.js')}}'></script>
    <script type='text/javascript' src='{{asset('resources/views/home/style/js/pjax.js')}}'></script>
    <script type='text/javascript' src='{{asset('resources/views/home/style/js/jquery-migrate.min.js')}}'></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
    <link rel="stylesheet" href="{{asset('resources/org/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css')}}">
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/third-party/SyntaxHighlighter/shCore.js')}}"></script>
    <script type='text/javascript' src='{{asset('resources/views/home/style/js/spin.min.js')}}'></script>
    <script type="text/javascript">
           /*SyntaxHighlighter.all(); */
    </script>
    <style>
        /*.thumbnailxm{*/
            /*height:130px!important;*/
            /*width: 210px!important;*/
        /*}*/
        div.loading{
            display: block;
            height: 100%;
            width: 100%;
            background: rgba(237,237,237,0.5);
            position: fixed;
            z-index:20000;
            font-size: 12px;
        }
/*        div.loading .foo{
            margin: auto;
            position:absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }*/
        .code{word-break: break-all!important;}
        #feedAv{ margin-top: -250px!important;transform: scale(0);}
        #MZAD_POP_PLACEHOLDER{display: none!important;}
    </style>
</head>
<body class="custom-background">
<div class="loading" id="foo">
</div>
<script type="text/javascript">
    var opts = {
      lines: 13, // The number of lines to draw
      length: 24, // The length of each line
      width: 3, // The line thickness
      radius: 31, // The radius of the inner circle
      corners: 1, // Corner roundness (0..1)
      rotate: 13, // The rotation offset
      color: '#000', // #rgb or #rrggbb
      speed: 1.7, // Rounds per second
      trail: 60, // Afterglow percentage
      shadow: true, // Whether to render a shadow
      hwaccel: false, // Whether to use hardware acceleration
      className: 'spinner', // The CSS class to assign to the spinner
      zIndex: 2e9, // The z-index (defaults to 2000000000)
      top: 'auto', // Top position relative to parent in px
      left: 'auto' // Left position relative to parent in px
    };
    var target = document.getElementById('foo');
    var spinner = new Spinner(opts).spin(target);
    $('#foo').hide();
</script>
@include('home.layout.header')
<div id="wrapper">
    <div id="main">
        @section('left_bar')
        <div class="visible-lg-block main-left ">
            <div id="sidebar-left-xf">
                <div class="sidebox  widget_suxing_leftnav"><div id="left-menu">
                        <ul>
                            @foreach($sub_navs as $k=>$v)
                            <li><a href="{{$v->url}}"><i class="icons @if($k == 0)
                                            icon-glass
                                        @elseif($k == 1)
                                            icon-headphones
                                        @elseif($k == 2)
                                            icon-heart
                                        @elseif($k == 3)
                                            icon-lightbulb
                                        @elseif($k == 4)
                                            icon-shield
                                        @elseif($k == 5)
                                            icon-rocket
                                        @endif"></i> {{$v->alias}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="sidebox  suxing_social">
                    <h2>加入学习</h2>
                    <div class="post-right-item follow-us animate">
                       {{-- <div class="follow-2wm">
                            <img src="" alt="微信二维码">
                        </div>--}}
                        <div class="">
                            &nbsp;&nbsp;&nbsp;php交流群：<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=280cf831a89876ebe69c97975948bd073ecc8f8c886d14e924ea029a718eadc8"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="php学习交流" title="php学习交流"></a>
                        </div>
                    </div>
                </div>
                {{--<div class="sidebox  widget_vfilmtime_ad">
                    <a href="javascript:;" target="_blank"><img src="{{asset('resources/views/home/style/picture/zhifubao.png')}}" title="小文blog" width="100%" height="auto"></a>
                </div>--}}
            </div>
        </div>
        @show
        <div id="wrap">
<div class="main-content" id="pjax-container">
@yield('content')
</div>
@section('right_bar')
    <div id="sidebar-right">
        <div class="sidebox  widget_vfilm_search">
            <form method="post" class="search-form" id="search-formhybrid-search" action="{{url('search')}}">
                {{csrf_field()}}
                <div class="search-input">
                    <b class="search-liaosheji" style="height: 0px; top: 0px;"></b>
                    <input class="search-text" placeholder="要不找一找？" type="text" name="s" id="search-texthybrid-search" value="">
                    <i class="icon-search-1"></i>
                </div>
            </form>            
        </div>
        <div class="sidebox  widget_vfilmtime_ad">
            <a href="javascript:;" target="_blank"><img src="{{asset('resources/views/home/style/picture/cat.jpg')}}" title="小文blog" width="100%" height="auto"></a>
        </div>
        <div class="sidebox  widget_vfilm_tab">
            <div id="tab-title" class="investment_title">
                <div class="on"><i class="icon-arrows-cw"></i> 随机推荐</div>
                <div><i class="icon-clock"></i> 最新发布</div>
            </div>
            <div id="tab-content"  class="investment_con">
                <div class="investment_con_list" >
                    <ul class="tab_post_links" >
                        @foreach($rand as $v)
                        <li><a href="{{url('art')}}/{{$v->id}}" title="{{$v->name}}" class='tab_post_title'>{{$v->name}}</a><i class='dot'></i></li>
                        @endforeach
                    </ul>
                </div>
                <div  class="investment_con_list">
                    <ul class="tab_post_links">
                        @foreach($new as $v)
                            <li><a href="{{url('art')}}/{{$v->id}}" title="{{$v->name}}" class='tab_post_title'>{{$v->name}}</a><i class='dot'></i></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div><div class="sidebox  widget_vfilm_recommend"><h2>推荐阅读</h2><ul>
                @foreach($recom as $v)
                <li class= "tuijian">
                    <a href="{{url('art')}}/{{$v['id']}}" title="{{$v->name}}" ><img src="{{asset('resources/views/home/style/images/default.gif')}}" alt="{{$v->name}}" class="thumbnail thumbnailxm" style="width:222px!important;height:132px!important;" data-echo="{{$v->cover}}?imageView2/1/w/210/h/130"/><span>{{$v->name}}</span> </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="sidebox  vfilmtime_tag">
            <h2>热门标签</h2>
            <div class="widge_tags">
                @foreach($tags as $v)
                <a href="{{url('tag')}}/{{$v->name}}" title="有{{$v->article_num}}篇文章">{{$v->name}} </a>
                @endforeach
            </div>
        </div>
    </div>
    @show
    </div>
</div>
</div>

@include('home.layout.footer')
<script type="text/javascript" charset="utf-8" src="{{asset('resources/views/home/style/js/echo.js')}}"></script>
<style>
#Share_Bar {
    position: fixed;
    top: 30%;
    left: -265px;
    overflow: hidden;
    width: 298px;
    height: 224px;
    padding: 10px 0 10px 0;
    color: #555555;
    text-shadow: 0px 0px .07px #DCDCDC;
    font: 12px/2.1 "Century Gothic","Microsoft yahei","Helvetica Neue",Helvetica,Arial,sans-serif;
    line-height: 20px;
    z-index: 9999;
}
.share_main {
    position: relative;
    padding-left: 10px;
    width: 288px;
    height: 225px;
}
.share_link {
    float: left;
    overflow: hidden;
    width: 260px;
    height: 221px;
    border-radius: 5px;
    background-color: #fff;
}
.share_btnn {
    float: left;
    margin-top: 58px;
    padding: 0px;
    width: 27px;
    height: 100px;
    border-radius: 0px 5px 5px 0px;
    background-color: rgb(137, 137, 137);
    color: #fff;
    text-align: center;
    font-size: 14px;
    line-height: 50px;
    cursor: pointer;
}
.share_btnn>p {
    display: block;
    margin: 0px;
    padding: 0px;
    width: 100%;
    height: auto;
    text-align: center;
    line-height: 90px;
    transform: rotate(90deg);
}
</style>
<div id="Share_Bar" style="left: -265px;">
  <div class="share_main">
    <div class="share_link"> 
    <div class="share_link_music">
      <iframe frameborder="no" border="10px solid red" margin="0" marginwidth="0" marginheight="0" width="280" height="270" src="{{Config::get('web.music')}}"></iframe>
    </div>
    </div>
    <div class="share_btnn">
      <p>music</p>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('.share_main').hover(function(){
        if($('#Share_Bar').is(":animated")){
            $(this).stop(false,true).animate({'left':'0px'},400);
        } else{
            $('#Share_Bar').animate({'left':'0px'},400);
        }
    },function(){
        if($('#Share_Bar').is(":animated")){
             $(this).stop(false,true).animate({'left':'0px'},400);
        } else{
             $('#Share_Bar').animate({'left':'-265px'},400);
        }
    });
</script>
<!--表单提交-->
<script type="text/javascript">
    echo.init({
        offset:0,
        throttle:0
    });
    $(function(){
        function tabs(tabTit,on,tabCon){
            $(tabCon).each(function(){
                $(this).children().eq(0).show();
            });
            $(tabTit).each(function(){
                $(this).children().eq(0).addClass(on);
            });
            $(tabTit).children().click(function(){
                $(this).addClass(on).siblings().removeClass(on);
                var index = $(tabTit).children().index(this);
                $(tabCon).children().eq(index).slideDown('1500').siblings().slideUp('1500');
            });
        }
        tabs(".investment_title","on",".investment_con");
    })
    jQuery(".search-input .search-text").bind('focus',function(){
        jQuery(".search-input .search-liaosheji").animate({height:'23px',top:'-23px'})
    })
    jQuery(".search-input .search-text").bind('blur',function(){
        jQuery(".search-input .search-liaosheji").animate({height:0,top:0})
    })
    $('#search-formhybrid-search').bind('keydown', function(event) {
        if (event.keyCode == "13") {
            //回车执行查询
            event.preventDefault();
            if(!$("#search-texthybrid-search").val()){
               layer.msg('请输入搜索关键词~', function(){
                });                        
                return false; 
            }
            $('#search-formhybrid-search').submit();                    
        }
    });
    $("#search-formhybrid-search .icon-search-1").click(function(){
        if(!$('#search-texthybrid-search').val()){
            layer.msg('请输入搜索关键词~', function(){
            });
            return false;
        }
        $('#search-formhybrid-search').submit();
    })
</script>
<!--表单提交-->
{!!Config::get('web.baidu')!!}
{{--<script type='text/javascript' src='{{asset('resources/views/home/style/js/dig.js?version=2')}}'></script>--}}
<script>
    $(document).pjax('a', '#pjax-container');
    $(document).on("pjax:timeout", function(event) {
        // 阻止超时导致链接跳转事件发生
        event.preventDefault();
    });
    $(document).on('pjax:send', function() { 
    //pjax链接点击后显示加载动画；
    $("div.loading").css("display", "block");
    });
    /*var refer = window.location.href;*/
    $(document).on('pjax:complete', function() {
        $("div.loading").css("display", "none");      
        echo.init({
            offset:0,
            throttle:0
        });
        $('.banner').owlCarousel({
            items: 1,
            loop:true,
            nav:true,
            animateOut: 'fadeOut',
            autoplay:true,
            autoplayTimeout:3000,
            responsive:{
                765:{
                    items:1
                }
            }
        }); 
        //pajx_loadDuodsuo();
        window.changyan = undefined;window.cyan = undefined;
        $.getScript("http://changyan.sohu.com/upload/changyan.js", function(){window.changyan.api.config({appid: "cyt30bSHE",conf: "prod_0e561974add5b2cbd2189046e6e8ee16"});});

        SyntaxHighlighter.highlight();
        /*$(".pjax_loading").css("display", "none");*/
        //打点上报
        /*console.log(refer);
        dig(refer);
        refer = window.location.href;*/
    });
    /*$(function () {
        dig();
    })*/
</script>

<script type='text/javascript' src='{{asset('resources/views/home/style/js/input.js')}}'></script>

</body>
</html>
