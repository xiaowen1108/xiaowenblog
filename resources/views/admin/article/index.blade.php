@extends('admin.layout.base')
@section('content')
<script type="text/javascript" src="{{asset('resources/views/admin/style/js/myJs.js')}}"></script>
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 文章管理
</div>
<!--面包屑导航 结束-->

<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <!--快捷导航 开始-->
        <div class="result_title">
            <h3>文章列表</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加文章</a>
                <a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部文章</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">ID</th>
                    <th>标题</th>
                    <th width="80px">封面图</th>
                    <th width="80px">推荐</th>
                    <th>点击</th>
                    <th>作者</th>
                    <th>发布时间</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                <tr>
                    <td class="tc">{{$v->id}}</td>
                    <td>
                        <a href="#">{{$v->name}}</a>
                    </td>
                    <td style="vertical-align:top;text-align:center">
                        <img src="{{$v->cover}}" style="width:75px;height:50px;margin-top:8px;" pre="yes"/>
                    </td>
                    <td><a href="javascript:;" onclick="recom({{$v->id}},{{$v->is_recom}})">{{$v->is_recom ? '是': '否'}}</a></td>
                    <td>{{$v->hits}}</td>
                    <td>{{$v->nickname}}</td>
                    <td>{{$v->created_at}}</td>
                    <td>
                        <a href="{{url('admin/article/'.$v->id.'/edit')}}">修改</a>
                        <a href="javascript:;" onclick="del({{$v->id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="page_list">
                {{$data->links()}}
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->

<style>
    .result_content ul li span {
        font-size: 15px;
        padding: 6px 12px;
    }
</style>

<script>
    preview();
    function del(id) {
        layer.confirm('确定要删除这个文章吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/article/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==1){
                    layer.msg(data.info, {icon: 6});
                    setInterval(function(){window.location.reload();},2000);
                }else{
                    layer.msg(data.info, {icon: 5});
                }
            });
        })
    }
    function recom(id,recom){
        var str = recom ? '确定取消推荐这篇文章吗？' : '确定要推荐这篇文章吗？';
        layer.confirm(str, {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/article/set_recom')}}/"+id,{'recom':recom,'_token':"{{csrf_token()}}"},function (data) {
                if(data.status==1){
                    layer.msg(data.info, {icon: 6});
                }else{
                    layer.msg(data.info, {icon: 6});
                }
                setInterval(function(){window.location.reload();},2000);
            });
        })
    }
</script>

@endsection
