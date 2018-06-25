@extends('admin.layout.base')
@section('content')
<body>
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a href="{{url('admin/category')}}">所有分类</a>  &raquo;  添加分类
</div>
<!--面包屑导航 结束-->
<div class="result_wrap">
    <div class="result_title">
        <h3>添加分类</h3>
        @if(count($errors)>0)
            <div class="mark">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
    </div>
</div>
<div class="result_wrap">
    <form action="{{url('admin/category')}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>分类名称：</th>
                <td>
                    <input type="text" name="name">
                    <span><i class="fa fa-exclamation-circle yellow"></i>分类名称必须填写</span>
                </td>
            </tr>
            <tr>
                <th width="120"><i class="require">*</i>父级分类：</th>
                <td>
                    <select name="pid">
                        <option value="0">==顶级分类==</option>
                        @foreach($cates as $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>SEO-标题：</th>
                <td>
                    <input type="text" class="lg" name="seo_title">
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>SEO-关键词：</th>
                <td>
                    <textarea name="seo_key"></textarea>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>SEO-描述：</th>
                <td>
                    <textarea name="seo_desc"></textarea>
                </td>
            </tr>
            <tr>
                <th>排序：</th>
                <td>
                    <input type="text" class="sm" name="sort" value="0">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</body>
@endsection
