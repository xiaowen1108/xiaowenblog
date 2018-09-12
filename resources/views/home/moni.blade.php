@extends('home.layout.common')
@section('left_bar')
    @parent
@endsection
@section('content')
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/third-party/SyntaxHighlighter/shCore.js')}}"></script>
    <script type="text/javascript">
        //SyntaxHighlighter.all();
    </script>
    <style>
        body {
            background-color: white;
        }
        .markdown-body {
            min-width: 200px;
            max-width: 760px;
            margin: 0 auto;
            padding: 20px;

            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            color: #333;
            overflow: hidden;
            font-family: "Helvetica Neue", Helvetica, "Segoe UI", Arial, freesans, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            word-wrap: break-word;
        }
        .markdown-body a {
            background: transparent;;word-wrap: break-word; word-break: break-all;
        }
        .markdown-body a:active,
        .markdown-body a:hover {
            outline: 0;
        }
        .markdown-body strong {
            font-weight: bold;
        }

        .markdown-body h1 {
            font-size: 2em;
            margin: 0.67em 0;
        }

        .markdown-body img {
            border: 0;
        }

        .markdown-body hr {
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            height: 0;
        }

        .markdown-body pre {
            overflow: auto;
        }

        .markdown-body code,
        .markdown-body kbd,
        .markdown-body pre {
            font-family: monospace, monospace;
            font-size: 1em;
        }

        .markdown-body input {
            color: inherit;
            font: inherit;
            margin: 0;
        }

        .markdown-body html input[disabled] {
            cursor: default;
        }

        .markdown-body input {
            line-height: normal;
        }

        .markdown-body input[type="checkbox"] {
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0;
        }

        .markdown-body table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .markdown-body td,
        .markdown-body th {
            padding: 0;
        }

        .markdown-body * {
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .markdown-body input {
            font: 13px/1.4 Helvetica, arial, freesans, clean, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol";
        }

        .markdown-body a {
            color: #4183c4;
            text-decoration: none;
        }

        .markdown-body a:hover,
        .markdown-body a:focus,
        .markdown-body a:active {
            text-decoration: underline;
        }

        .markdown-body hr {
            height: 0;
            margin: 15px 0;
            overflow: hidden;
            background: transparent;
            border: 0;
            border-bottom: 1px solid #ddd;
        }

        .markdown-body hr:before {
            display: table;
            content: "";
        }

        .markdown-body hr:after {
            display: table;
            clear: both;
            content: "";
        }

        .markdown-body h1,
        .markdown-body h2,
        .markdown-body h3,
        .markdown-body h4,
        .markdown-body h5,
        .markdown-body h6 {
            margin-top: 15px;
            margin-bottom: 15px;
            line-height: 1.1;
        }

        .markdown-body h1 {
            font-size: 25px;
        }

        .markdown-body h2 {
            font-size: 16px;
        }

        .markdown-body h3 {
            font-size: 11px;
        }

        .markdown-body h4 {
            font-size: 9px;
        }

        .markdown-body h5 {
            font-size: 7px;
        }

        .markdown-body h6 {
            font-size: 6px;
        }

        .markdown-body blockquote {
            margin: 0;
        }

        .markdown-body ul,
        .markdown-body ol {
            padding: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        .markdown-body ol ol,
        .markdown-body ul ol {
            list-style-type: lower-roman;
        }

        .markdown-body ul ul ol,
        .markdown-body ul ol ol,
        .markdown-body ol ul ol,
        .markdown-body ol ol ol {
            list-style-type: lower-alpha;
        }

        .markdown-body dd {
            margin-left: 0;
        }

        .markdown-body code {
            font: 12px Consolas, "Liberation Mono", Menlo, Courier, monospace;
        }

        .markdown-body pre {
            margin-top: 0;
            margin-bottom: 0;
            font: 12px Consolas, "Liberation Mono", Menlo, Courier, monospace;
        }

        .markdown-body kbd {
            background-color: #e7e7e7;
            background-image: -webkit-linear-gradient(#fefefe, #e7e7e7);
            background-image: linear-gradient(#fefefe, #e7e7e7);
            background-repeat: repeat-x;
            border-radius: 2px;
            border: 1px solid #cfcfcf;
            color: #000;
            padding: 3px 5px;
            line-height: 10px;
            font: 11px Consolas, "Liberation Mono", Menlo, Courier, monospace;
            display: inline-block;
        }

        .markdown-body>*:first-child {
            margin-top: 0 !important;
        }

        .markdown-body>*:last-child {
            margin-bottom: 0 !important;
        }

        .markdown-body .anchor {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            display: block;
            padding-right: 6px;
            padding-left: 30px;
            margin-left: -30px;
        }

        .markdown-body .anchor:focus {
            outline: none;
        }

        .markdown-body h1,
        .markdown-body h2,
        .markdown-body h3,
        .markdown-body h4,
        .markdown-body h5,
        .markdown-body h6 {
            position: relative;
            margin-top: 1em;
            margin-bottom: 16px;
            font-weight: bold;
            line-height: 1.4;
        }

        .markdown-body h1 .octicon-link,
        .markdown-body h2 .octicon-link,
        .markdown-body h3 .octicon-link,
        .markdown-body h4 .octicon-link,
        .markdown-body h5 .octicon-link,
        .markdown-body h6 .octicon-link {
            display: none;
            color: #000;
            vertical-align: middle;
        }

        .markdown-body h1:hover .anchor,
        .markdown-body h2:hover .anchor,
        .markdown-body h3:hover .anchor,
        .markdown-body h4:hover .anchor,
        .markdown-body h5:hover .anchor,
        .markdown-body h6:hover .anchor {
            height: 1em;
            padding-left: 8px;
            margin-left: -30px;
            line-height: 1;
            text-decoration: none;
        }

        .markdown-body h1:hover .anchor .octicon-link,
        .markdown-body h2:hover .anchor .octicon-link,
        .markdown-body h3:hover .anchor .octicon-link,
        .markdown-body h4:hover .anchor .octicon-link,
        .markdown-body h5:hover .anchor .octicon-link,
        .markdown-body h6:hover .anchor .octicon-link {
            display: inline-block;
        }

        .markdown-body h1 {
            padding-bottom: 0.3em;
            font-size: 2.25em;
            line-height: 1.2;
            border-bottom: 1px solid #eee;
        }

        .markdown-body h2 {
            padding-bottom: 0.3em;
            font-size: 1.75em;
            line-height: 1.225;
            border-bottom: 1px solid #eee;
        }

        .markdown-body h3 {
            font-size: 1.5em;
            line-height: 1.43;
        }

        .markdown-body h4 {
            font-size: 1.25em;
        }

        .markdown-body h5 {
            font-size: 1em;
        }

        .markdown-body h6 {
            font-size: 1em;
            color: #777;
        }

        .markdown-body p,
        .markdown-body blockquote,
        .markdown-body ul,
        .markdown-body ol,
        .markdown-body dl,
        .markdown-body table,
        .markdown-body pre {
            margin-top: 0;
            margin-bottom: 16px;
        }

        .markdown-body hr {
            height: 4px;
            padding: 0;
            margin: 16px 0;
            background-color: #e7e7e7;
            border: 0 none;
        }

        .markdown-body ul,
        .markdown-body ol {
            padding-left: 2em;
        }

        .markdown-body ul ul,
        .markdown-body ul ol,
        .markdown-body ol ol,
        .markdown-body ol ul {
            margin-top: 0;
            margin-bottom: 0;
        }

        .markdown-body li>p {
            margin-top: 16px;
        }

        .markdown-body dl {
            padding: 0;
        }

        .markdown-body dl dt {
            padding: 0;
            margin-top: 16px;
            font-size: 1em;
            font-style: italic;
            font-weight: bold;
        }

        .markdown-body dl dd {
            padding: 0 16px;
            margin-bottom: 16px;
        }

        .markdown-body blockquote {
            padding: 0 15px;
            color: #777;
            border-left: 4px solid #ddd;
        }

        .markdown-body blockquote>:first-child {
            margin-top: 0;
        }

        .markdown-body blockquote>:last-child {
            margin-bottom: 0;
        }

        .markdown-body table {
            display: block;
            width: 100%;
            overflow: auto;
            word-break: normal;
            word-break: keep-all;
        }

        .markdown-body table th {
            font-weight: bold;
        }

        .markdown-body table th,
        .markdown-body table td {
            padding: 6px 13px;
            border: 1px solid #ddd;
        }

        .markdown-body table tr {
            background-color: #fff;
            border-top: 1px solid #ccc;
        }

        .markdown-body table tr:nth-child(2n) {
            background-color: #f8f8f8;
        }

        .markdown-body img {
            max-width: 100%;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .markdown-body code {
            padding: 0;
            padding-top: 0.2em;
            padding-bottom: 0.2em;
            margin: 0;
            font-size: 85%;
            background-color: rgba(0,0,0,0.04);
            border-radius: 3px;
        }

        .markdown-body code:before,
        .markdown-body code:after {
            letter-spacing: -0.2em;
            content: "\00a0";
        }

        .markdown-body pre>code {
            padding: 0;
            margin: 0;
            font-size: 100%;
            word-break: normal;
            white-space: pre;
            background: transparent;
            border: 0;
        }

        .markdown-body .highlight {
            margin-bottom: 16px;
        }

        .markdown-body .highlight pre,
        .markdown-body pre {
            padding: 16px;
            overflow: auto;
            font-size: 85%;
            line-height: 1.45;
            background-color: #f7f7f7;
            border-radius: 3px;
        }

        .markdown-body .highlight pre {
            margin-bottom: 0;
            word-break: normal;
        }

        .markdown-body pre {
            word-wrap: normal;
        }

        .markdown-body pre code {
            display: inline;
            max-width: initial;
            padding: 0;
            margin: 0;
            overflow: initial;
            line-height: inherit;
            word-wrap: normal;
            background-color: transparent;
            border: 0;
        }

        .markdown-body pre code:before,
        .markdown-body pre code:after {
            content: normal;
        }

        .markdown-body .highlight {
            background: #fff;
        }

        .markdown-body .highlight .mf,
        .markdown-body .highlight .mh,
        .markdown-body .highlight .mi,
        .markdown-body .highlight .mo,
        .markdown-body .highlight .il,
        .markdown-body .highlight .m {
            color: #945277;
        }

        .markdown-body .highlight .s,
        .markdown-body .highlight .sb,
        .markdown-body .highlight .sc,
        .markdown-body .highlight .sd,
        .markdown-body .highlight .s2,
        .markdown-body .highlight .se,
        .markdown-body .highlight .sh,
        .markdown-body .highlight .si,
        .markdown-body .highlight .sx,
        .markdown-body .highlight .s1 {
            color: #df5000;
        }

        .markdown-body .highlight .kc,
        .markdown-body .highlight .kd,
        .markdown-body .highlight .kn,
        .markdown-body .highlight .kp,
        .markdown-body .highlight .kr,
        .markdown-body .highlight .kt,
        .markdown-body .highlight .k,
        .markdown-body .highlight .o {
            font-weight: bold;
        }

        .markdown-body .highlight .kt {
            color: #458;
        }

        .markdown-body .highlight .c,
        .markdown-body .highlight .cm,
        .markdown-body .highlight .c1 {
            color: #998;
            font-style: italic;
        }

        .markdown-body .highlight .cp,
        .markdown-body .highlight .cs {
            color: #999;
            font-weight: bold;
        }

        .markdown-body .highlight .cs {
            font-style: italic;
        }

        .markdown-body .highlight .n {
            color: #333;
        }

        .markdown-body .highlight .na,
        .markdown-body .highlight .nv,
        .markdown-body .highlight .vc,
        .markdown-body .highlight .vg,
        .markdown-body .highlight .vi {
            color: #008080;
        }

        .markdown-body .highlight .nb {
            color: #0086B3;
        }

        .markdown-body .highlight .nc {
            color: #458;
            font-weight: bold;
        }

        .markdown-body .highlight .no {
            color: #094e99;
        }

        .markdown-body .highlight .ni {
            color: #800080;
        }

        .markdown-body .highlight .ne {
            color: #990000;
            font-weight: bold;
        }

        .markdown-body .highlight .nf {
            color: #945277;
            font-weight: bold;
        }

        .markdown-body .highlight .nn {
            color: #555;
        }

        .markdown-body .highlight .nt {
            color: #000080;
        }

        .markdown-body .highlight .err {
            color: #a61717;
            background-color: #e3d2d2;
        }

        .markdown-body .highlight .gd {
            color: #000;
            background-color: #fdd;
        }

        .markdown-body .highlight .gd .x {
            color: #000;
            background-color: #faa;
        }

        .markdown-body .highlight .ge {
            font-style: italic;
        }

        .markdown-body .highlight .gr {
            color: #aa0000;
        }

        .markdown-body .highlight .gh {
            color: #999;
        }

        .markdown-body .highlight .gi {
            color: #000;
            background-color: #dfd;
        }

        .markdown-body .highlight .gi .x {
            color: #000;
            background-color: #afa;
        }

        .markdown-body .highlight .go {
            color: #888;
        }

        .markdown-body .highlight .gp {
            color: #555;
        }

        .markdown-body .highlight .gs {
            font-weight: bold;
        }

        .markdown-body .highlight .gu {
            color: #800080;
            font-weight: bold;
        }

        .markdown-body .highlight .gt {
            color: #aa0000;
        }

        .markdown-body .highlight .ow {
            font-weight: bold;
        }

        .markdown-body .highlight .w {
            color: #bbb;
        }

        .markdown-body .highlight .sr {
            color: #017936;
        }

        .markdown-body .highlight .ss {
            color: #8b467f;
        }

        .markdown-body .highlight .bp {
            color: #999;
        }

        .markdown-body .highlight .gc {
            color: #999;
            background-color: #EAF2F5;
        }

        .markdown-body .octicon {
            font: normal normal 16px octicons-anchor;
            line-height: 1;
            display: inline-block;
            text-decoration: none;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .markdown-body .octicon-link:before {
            content: '\f05c';
        }

        .markdown-body .task-list-item {
            list-style-type: none;
        }

        .markdown-body .task-list-item+.task-list-item {
            margin-top: 3px;
        }

        .markdown-body .task-list-item input {
            float: left;
            margin: 0.3em 0 0.25em -1.6em;
            vertical-align: middle;
        }
        table td{ word-wrap: break-word !important; word-break: break-all !important; }
        /*

        github.com style (c) Vasily Polovnyov <vast@whiteants.net>

        */

        .hljs {
            display: block;
            overflow-x: auto;
            padding: 0.5em;
            color: #333;
            background: #f8f8f8;
            -webkit-text-size-adjust: none;
        }

        .hljs-comment,
        .diff .hljs-header {
            color: #998;
            font-style: italic;
        }

        .hljs-keyword,
        .css .rule .hljs-keyword,
        .hljs-winutils,
        .nginx .hljs-title,
        .hljs-subst,
        .hljs-request,
        .hljs-status {
            color: #333;
            font-weight: bold;
        }

        .hljs-number,
        .hljs-hexcolor,
        .ruby .hljs-constant {
            color: #008080;
        }

        .hljs-string,
        .hljs-tag .hljs-value,
        .hljs-doctag,
        .tex .hljs-formula {
            color: #d14;
        }

        .hljs-title,
        .hljs-id,
        .scss .hljs-preprocessor {
            color: #900;
            font-weight: bold;
        }

        .hljs-list .hljs-keyword,
        .hljs-subst {
            font-weight: normal;
        }

        .hljs-class .hljs-title,
        .hljs-type,
        .vhdl .hljs-literal,
        .tex .hljs-command {
            color: #458;
            font-weight: bold;
        }

        .hljs-tag,
        .hljs-tag .hljs-title,
        .hljs-rule .hljs-property,
        .django .hljs-tag .hljs-keyword {
            color: #000080;
            font-weight: normal;
        }

        .hljs-attribute,
        .hljs-variable,
        .lisp .hljs-body,
        .hljs-name {
            color: #008080;
        }

        .hljs-regexp {
            color: #009926;
        }

        .hljs-symbol,
        .ruby .hljs-symbol .hljs-string,
        .lisp .hljs-keyword,
        .clojure .hljs-keyword,
        .scheme .hljs-keyword,
        .tex .hljs-special,
        .hljs-prompt {
            color: #990073;
        }

        .hljs-built_in {
            color: #0086b3;
        }

        .hljs-preprocessor,
        .hljs-pragma,
        .hljs-pi,
        .hljs-doctype,
        .hljs-shebang,
        .hljs-cdata {
            color: #999;
            font-weight: bold;
        }

        .hljs-deletion {
            background: #fdd;
        }

        .hljs-addition {
            background: #dfd;
        }

        .diff .hljs-change {
            background: #0086b3;
        }

        .hljs-chunk {
            color: #aaa;
        }


    </style>

    <style> @media print{ .hljs{overflow: visible; word-wrap: break-word !important;} }</style>
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
            <div class="markdown-body">
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
