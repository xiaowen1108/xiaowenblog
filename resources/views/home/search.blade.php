@extends('home.layout.common')
@section('content')
<div id="article">
					@if(!$has)
					<h2 class="search-title">没有找到有关的内容，给您推荐以下内容：</h2>
					@endif
<div class="posts">
	@foreach($articles as $v)
		<div class="loop">
			<div class="content">
				<div class="content-img">
					<a href="{{url('art')}}/{{$v['id']}}" title="{{$v['name']}}"><img src="{{asset('resources/views/home/style/images/default.gif')}}" data-echo="{{$v['cover']}}" alt="{{$v['name']}}" class="thumbnail thumbnailxm"/></a>
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
				<span class="auther"><img alt='' src='{{asset('resources/views/home/style/images/author.jpg')}}' class='avatar avatar-96 photo' height='96' width='96' />小文</span>
				<span><i class="icon-clock"></i>{{$v['created_at']}}</span>
				<span><i class="icon-align-left"></i> {{$v['hits']}}人围观</span>
				<span><a title="喜欢就赞一个！" href="javascript:;" aid="{{$v['id']}}" class="favorite"><i class="icon-thumbs-up" @if($v['is_like']) style="color:#f66" @endif></i> <span class="count">{{$v['like_num']}}</span></a></span>
			</div>
		</div>
	@endforeach
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
	</script>
</div>
@endsection