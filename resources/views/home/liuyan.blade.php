@extends('home.layout.common')
@section('content')
                <div id="post">
                    <div id="page_title">
                        <h2>
                            留言板			</h2>
                    </div>
                    <div class="post">
                    </div>
                </div>
                <div class="clearfix">
                        <div id="SOHUCS" sid="0" ></div> 
                            <script type="text/javascript"> 
                            (function(){ 
                            var appid = 'cyt30bSHE'; 
                            var conf = 'prod_0e561974add5b2cbd2189046e6e8ee16'; 
                            var width = window.innerWidth || document.documentElement.clientWidth; 
                            if (width < 960) { 
                            window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="http://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("http://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })();
                            </script>
                        </div>
                </div>
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
@endsection