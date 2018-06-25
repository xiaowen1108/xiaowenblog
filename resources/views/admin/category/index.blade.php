@extends('admin.layout.base')
@section('content')
<body>
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 所有分类
</div>
<!--面包屑导航 结束-->
<div class="result_wrap">
    <div class="result_title">
        <h3>分类管理</h3>
    </div>
    <!--快捷导航 开始-->
    <div class="result_content">
        <div class="short_wrap">
            <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>新增分类</a>
            <a href="{{url('admin/category')}}"><i class="fa fa-refresh"></i>更新排序</a>
        </div>
    </div>
    <!--快捷导航 结束-->
</div>
{{--<!--结果页快捷搜索框 开始-->--}}
{{--<div class="search_wrap">
    <form action="" method="post">
        <table class="search_tab">
            <tr>
                <th width="120">选择分类:</th>
                <td>
                    <select onchange="javascript:location.href=this.value;">
                        <option value="">全部</option>
                        <option value="http://www.baidu.com">百度</option>
                        <option value="http://www.sina.com">新浪</option>
                    </select>
                </td>
                <th width="70">关键字:</th>
                <td><input type="text" name="keywords" placeholder="关键字"></td>
                <td><input type="submit" name="sub" value="查询"></td>
            </tr>
        </table>
    </form>
</div>--}}
{{--<!--结果页快捷搜索框 结束-->--}}

<!--搜索结果页面 列表 开始-->
<form action="#" method="post">

    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc" width="5%">排序</th>
                    <th class="tc" width="5%">ID</th>
                    <th>分类名称</th>
                    <th>title</th>
                    <th>keywords</th>
                    <th>description</th>
                    <th>操作</th>
                </tr>

                @foreach($data as $v)
                <tr>
                    <td class="tc">
                        <input type="text" value="{{$v->sort}}" onchange="sort(this,'{{$v->id}}')">
                    </td>
                    <td class="tc">{{$v->id}}</td>
                    <td>
                        <a href="#">{{$v->name}}</a>
                    </td>
                    <td>{{$v->seo_title}}</td>
                    <td>{{$v->seo_key}}</td>
                    <td>{{$v->seo_desc}}</td>
                    <td>
                        <a href="{{url('admin/category/'.$v->id.'/edit')}}">修改</a>
                        <a href="javascript:;" onclick="del({{$v->id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>


{{--            <div class="page_nav">
                <div>
                    <a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a>
                    <a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a>
                    <a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
                    <a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
                    <span class="current">8</span>
                    <a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
                    <a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a>
                    <a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a>
                    <a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a>
                    <span class="rows">11 条记录</span>
                </div>
            </div>



            <div class="page_list">
                <ul>
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>--}}
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<script>
    function sort(obj,id){
        var sort = $(obj).val();
        $.post("{{url('admin/category/changeorder')}}",{'_token':'{{csrf_token()}}','id':id,'sort':sort},function(data){
            if(data.status){
                layer.msg(data.info, {icon: 6});
            }else{
                layer.msg(data.info, {icon: 5});
            }
        });
    }
    function del(id) {
        layer.confirm('确定要删除这个分类吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/category/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==1){
                    layer.msg(data.info, {icon: 6});
                    setInterval(function(){window.location.reload();},2000);
                }else{
                    layer.msg(data.info, {icon: 5});
                }
            });
        })
    }
</script>
</body>
@endsection
