<div id="footer">
    <div id="footer-bottom">
        <div id="footer-box">
            <div class="nav-foot">
                <nav class="footernav">
                    <ul id="nav" class="menu" style="margin-right: 100px;">
                        <li><a href="javascript:;">友情链接</a></li>
                        @foreach($links as $v)
                        <li><a href="{{$v->url}}" target="_blank">{{$v->name}}</a></li>
                        @endforeach
                    </ul>			    </nav>
                <div class="credit">Copyright © 2016&nbsp;<a class="site-link" href="https://www.az1314.cn" title="小文blog" rel="home">小文blog</a>&nbsp;&nbsp;All Rights Reserved BY 小文 &nbsp;ICP备案号：<a href="http://www.miitbeian.gov.cn">豫ICP备16004541号-1</a>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="{{asset('resources/views/home/style/js/jquery.sticky.js')}}"></script>
    <script>
        jQuery(window).load(function(){
            jQuery("#sidebar-left-xf").sticky({ topSpacing: 10,bottomSpacing: 560 });
        });
    </script>

    <!--wp-compress-html no compression-->
    <script>
        jQuery(document).ready(function (a) {
            var c=2 ,d;
            a.browser.msie && 6 == a.browser.version && !a.support.style || (
                    e = a("#sidebar-right").width(), f = a("#sidebar-right .sidebox"), g = f.length, g >= (c > 0) && g >= (d > 0) && a(window).scroll(function () {
                        var b = document.documentElement.scrollTop + document.body.scrollTop;
                        b > f.eq(g - 1).offset().top + f.eq(g - 1).height() ? 0 == a(".roller").length ? (f.parent().append('<div class="roller"></div>'),
                                f.eq(c - 1).clone().appendTo(".roller"),
                        c !== d && f.eq(d - 1).clone().appendTo(".roller"),
                                a(".roller").css({
                                    position: "fixed",
                                    top: 10,
                                    zIndex: 999,
                                    width: 250
                                }), a(".roller").width(e)) : a(".roller").fadeIn(300) : a(".roller").fadeOut(300)
                    }))
        });
    </script>
    <!--wp-compress-html no compression-->
</div>
<a href="#0" class="cd-top">Top</a>
<script type='text/javascript' src='{{asset('resources/views/home/style/js/app.js')}}'></script>
<script type='text/javascript' src='{{asset('resources/views/home/style/js/wp-embed.min.js')}}'></script>
<script type="text/javascript" src="{{asset('resources/views/home/style/js/owl.carousel.min.js')}}"></script>
