<div id="article">
    <!--轮播开始-->
    <div class="metro">
        <div class="banner">
            @foreach($banner as $v)
            <div class="item">
            <a href="{{url('art')}}/{{$v->id}}"  target="_blank" title="{{$v->name}}">
            <img src="{{$v->cover}}" alt="{{$v->name}}" class="thumbnail" style="width:715px!important;height: 300px!important; "/><div class="item-title">
            <h2>{{$v->name}}</h2></div>
            </a>
            </div>
            @endforeach
        </div>
    </div>
    <!--轮播结束-->
    <!--文章开始-->
    <div class="posts">
        <!--artical_s-->
        @foreach($articals as $v)
        <div class="loop">
            <div class="content">
                <div class="content-img">
                    <a href="{{url('art')}}/{{$v['id']}}" title="{{$v['name']}}"><img data-echo="{{$v['cover']}}" alt="{{$v['name']}}" src="{{asset('resources/views/home/style/images/default.gif')}}" class="thumbnail thumbnailxm"/></a>
                </div>
                <div class="content_body">
                    <h2><a href="{{url('art')}}/{{$v['id']}}" title="{{$v['name']}}">{{$v['name']}}</a>
                    </h2>
                    <p>{{$v['description']}}</p>
                </div>
            </div>
            <div class="clear"></div>
            <div class="content_infor">
                <span class="more"><a href="{{url('art')}}/{{$v['id']}}" title="阅读全文" >阅读全文 <i class=" icon-angle-circled-right" style="font-size: 13px;"></i></a></span>
                <span class="auther"><img alt='小文博客' src='{{asset('resources/views/home/style/images/author.jpg')}}' class='avatar avatar-96 photo' height='96' width='96' />小文</span>
                <span><i class="icon-clock"></i>{{$v['created_at']}}</span>
                <span><i class="icon-align-left"></i> {{$v['hits']}}人围观</span>
                <span><a title="喜欢就赞一个！" href="javascript:;" aid="{{$v['id']}}" class="favorite"><i class="icon-thumbs-up" @if($v['is_like']) style="color:#f66" @endif></i> <span class="count">{{$v['like_num']}}</span></a></span>
            </div>
        </div>
        @endforeach
        <!--e-->
    </div>
    <div id="page">
        <div id="ajax-load-posts">
            <button id="fa-loadmore" class="button button-more" >加载更多</button>				                  </div>
    </div>
</div>
<script>
    //点赞
    $("#article").on('click','.favorite',function(){
        var _this = $(this);
       if(_this.find('i').attr('style') == 'color:#f66'){
           layer.msg('已经喜欢~感谢支持~', function(){
           });
           return false;
       }
        var id = $(this).attr('aid');
       $.get('{{url("like")}}',{id:id,'_token':'{{csrf_token()}}'},function(data){
            if(data.status){
                _this.find('i').attr('style','color:#f66');
                _this.find('span').html(parseInt(_this.find('span').html()) + 1);
            }
       })
    })
    var page = {
        cur:2,
        num:8,
        _token:'{{csrf_token()}}'
    }
    //加载文章
    $("#fa-loadmore").click(function(){
        var _this = $(this);
        if(_this.html() == '没有更多数据了'){
            return false;
        }
        $(this).html('<i class="icon-spin5 animate-spin"></i> 加载中...');
        $.post("{{url('ajax_article')}}",page,function(data){
            if(data.status){
                var html = '';
                $.each(data.info,function(k,v){
                    var style = '';
                    if(v.is_like ==1){
                        style = 'style="color:#f66"';
                    }
                    html += '<div class="loop"><div class="content"><div class="content-img"><a href="{{url('art')}}/'+v.id+'" title="'+v.name+'"><img data-echo="'+v.cover+'"  src="{{asset('resources/views/home/style/images/default.gif')}}" alt="'+v.name+'" class="thumbnail thumbnailxm"/></a></div><div class="content_body"><h2><a href="{{url('art')}}/'+v.id+'" title="'+v.name+'">'+v.name+'</a></h2><p>'+v.description+'</p></div></div><div class="clear"></div><div class="content_infor"><span class="more"><a href="{{url('art')}}/'+v.id+'" title="阅读全文" >阅读全文 <i class=" icon-angle-circled-right" style="font-size: 13px;"></i></a></span><span class="auther"><img alt="小文博客" src="{{asset('resources/views/home/style/images/author.jpg')}}" class="avatar avatar-96 photo" height="96" width="96" />小文</span><span><i class="icon-clock"></i>'+v.created_at+'</span> <span><i class="icon-align-left"></i> '+v.hits+'人围观</span><span><a title="喜欢就赞一个！" href="javascript:;" aid="'+v.id+'" class="favorite"><i class="icon-thumbs-up" '+style+'></i> <span class="count">'+v.like_num+'</span></a></span></div></div>';
                })
                $("#page").before(html);
                echo.render();
                _this.html('加载更多');
                page.cur++;
            }else{
                _this.html('没有更多数据了');
            }
        })
    })
</script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var owl = $('.banner');
        owl.owlCarousel({
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
    });
</script>
<script>
//nav样式
$(function(){
    $("li.top").attr('class','menu-item-has-children submenu top');
    $("li.top").eq(0).removeClass('submenu').removeClass('menu-item-has-children').addClass('current-menu-item');
})
</script>