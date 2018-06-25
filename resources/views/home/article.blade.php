@extends('home.layout.common')
@section('left_bar')
    @parent
@endsection
@section('content')
<script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/third-party/SyntaxHighlighter/shCore.js')}}"></script>
<script type="text/javascript">
        SyntaxHighlighter.all();
</script>
<div id="article">
	<div id="post">
		<div class="title">
			<div class="post-title">
				<h1>{{$info['name']}}</h1>
					<div class="post_icon">
					<span class="author-head"><img alt="小文blog" src="{{asset('resources/views/home/style/images/author.jpg')}}" class="avatar avatar-96 photo" height="96" width="96">小文</span>
					<span><i class="icon-clock"></i>{{$info['created_at']}}</span>
					<span class="postcat"><i class="icon-align-left"></i>{{$info['hits']}}人围观</span>
					<span class="post-like-right"><a title="喜欢就赞一个！" href="javascript:;" class="favorite like_art" id="like_art"><i class="  icon-thumbs-up"   @if($info['is_like']) style="color:#f66" @endif></i> 喜欢 <span class="count">({{$info['like_num']}})</span></a></span>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<!--article-->
		<div class="post">
			{!!$info['content']!!}
		</div>
		<!--article-->
	<div class="mt15"></div>
	<div class="post-statement">
		<p>转载请注明来自<a href="http://www.az1314.cn" title="小文博客"><strong>小文博客</strong></a>，本文标题：<a href="javascript:;" title="">{{$info['name']}}</a></p>
		<p></p>
	</div>
	<div class="post-tags">标签：
		@foreach($_tags as $v)
		<a href="{{url('tag')}}/{{$v}}" rel="tag">{{$v}}</a>
		@endforeach
	</div>
		<div class="post-share">
		<div class="post-like">
		<a title="喜欢就赞一个！" href="javascript:;"  class="favorite btn btn-like like_art"><i class="icon-thumbs-up"></i> 喜欢 <span class="count" id="like_art_1">{{$info['like_num']}}</span></a>
		<a href="#comment" class="btn btn-comments"><i class="icon-comment"></i> 发布评论</a>
	</div>
</div>
<div class="clear"></div>
<div id="authorarea">
	<div class="authorinfo">
	<div class="author-avater"><img alt="" src="{{asset('resources/views/home/style/images/author.jpg')}}" class="avatar avatar-50 photo" height="50" width="50"></div>
	<div class="author-des">
		<div class="author-meta">
			<span class="post-author-name">小文</span><span class="post-author-url"><a href="javascript:;" rel="nofollow" target="_blank">就是那么吊</a></span> <span class="post-author-weibo"><a href="javascript:;" rel="nofollow" target="_blank">就是那么帅</a></span>
		</div>
		<div class="author-description">生活是一场戏，主角当累了，你亦可成为观众，停下脚步，歇一歇</div>
	</div>
	</div>
</div>
</div>
<div id="related">
	<div class="related-title">与本文相关的文章</div>
		<ul class="related_img">
			@foreach($seminar_articles as $v)
			<li>
			<a href="{{url('art')}}/{{$v['id']}}" title="{{$v['name']}}" target="_blank"><img src="{{asset('resources/views/home/style/images/default.gif')}}" data-echo="{{$v['cover']}}" alt="{{$v['name']}}" class="thumbnail thumbnailxm">
			<h2>{{$v['name']}}</h2>
			</a>
            </li>
			@endforeach
		</ul>
	</div>
	<div class="clear"></div>
	<div class="clearfix" id="comment">
		<!-- 多说评论框 start -->
		<!-- <div class="ds-thread" data-thread-key="{{$info['id']}}" data-title="{{$info['name']}}" data-url="{{url('art')}}/{{$info['id']}}"></div> -->
		<!-- 多说评论框 end -->
		<!-- 多说公共JS代码 start (一个网页只需插入一次) 
		<script type="text/javascript">
			var duoshuoQuery = {short_name:"az1314"};
			(function() {
				var ds = document.createElement('script');
				ds.type = 'text/javascript';ds.async = true;
				ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.unstable.js';
				ds.charset = 'UTF-8';
				(document.getElementsByTagName('head')[0]
				|| document.getElementsByTagName('body')[0]).appendChild(ds);
			})();
		</script> 
		多说公共JS代码 end -->
		<!--PC和WAP自适应版-->
		<div id="SOHUCS" sid="{{$info['id']}}" ></div> 
			<script type="text/javascript"> 
			(function(){ 
			var appid = 'cyt30bSHE'; 
			var conf = 'prod_0e561974add5b2cbd2189046e6e8ee16'; 
			var width = window.innerWidth || document.documentElement.clientWidth; 
			if (width < 960) { 
			window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("http://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })();
			</script>
		</div>
	<div class="mb15"></div>
</div>
<script>
	$(".like_art").click(function(){
		var _this = $(this);
		if($("#like_art").find('i').attr('style') == 'color:#f66'){
			layer.msg('已经喜欢~感谢支持~', function(){
			});
			return false;
		}
		$.get('{{url("like")}}',{id:'{{$info['id']}}','_token':'{{csrf_token()}}'},function(data){
			if(data.status){
				$("#like_art").find('i').attr('style','color:#f66');
				$(".like_art .count").html(parseInt($("#like_art_1").html()) + 1);
			}
		})
	})
</script>
<script>
//nav样式
$(function(){
    function check_url(url,id){
        var cat_id= url.split("/");
        cat_id = cat_id[cat_id.length-1];
        if(id == cat_id){
            return true;
        }else{
            return false;
        }
    }
    var cur_url = window.location.href;
    var cur_cid = '{{$cat_id or ''}}';
    $("li.top").attr('class','menu-item-has-children submenu top');
    var flag = false;
    $.each($("li.top"),function(k,v){
        var url = $(v).find('a').attr('href');
        if((cur_cid && check_url(url,'{{$cat_id or ""}}')) || cur_url == url){
                $(v).removeClass('submenu').removeClass('menu-item-has-children').addClass('current-menu-item');
                flag = true;
                return;

        }
    })
    if(!flag){
        $.each($("ul.sub-menu li"),function(k,v){
            var url = $(v).find('a').attr('href');
            if((cur_cid && check_url(url,'{{$cat_id or ""}}')) || cur_url == url){
                $(v).parent().parent().removeClass('submenu').removeClass('menu-item-has-children').addClass('current-menu-item');
                return;
            }
        })
    }
})
</script>
@endsection
@section('right_bar')
	@parent
@endsection
