@extends('admin.layout.base')
@section('content')
    <script src="{{asset('resources/org/uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('resources/org/uploadify/uploadify.css')}}">
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <style>
        .uploadify{display:inline-block;}
        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
        .edui-default{line-height: 28px;}
        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
        {overflow: hidden; height:20px;}
        div.edui-box{overflow: hidden; height:22px;}
    </style>
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 文章管理
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>添加文章</h3>
        @if(count($errors)>0)
            <div class="mark">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
        @endif
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/article')}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i> 文章标题：</th>
                <td>
                    <input type="text" class="lg" name="name">
                </td>
            </tr>
            <tr>
                <th width="120"><i class="require">*</i> 分类：</th>
                <td>
                    <select name="cid">
                        <option value="" >==请选择文章分类==</option>
                        @foreach($data as $d)
                        <option value="{{$d->id}}" @if($d->pid == 0)  disabled="true" @endif>{{$d->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 封面图：</th>
                <td>
                    <input type="hidden" size="50" name="cover" >
                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                    <img src="" id="artical_cover" style="max-width: 350px; max-height:100px;">
                </td>
            </tr>
            <tr>
                <th>关键词：</th>
                <td>
                    <input type="text" class="lg" name="tags">
                </td>
            </tr>
            <tr>
                <th>描述：</th>
                <td>
                    <textarea name="description"></textarea>
                </td>
            </tr>

            <tr>
                <th>文章内容：</th>
                <td>
                    <script id="editor" name="content" type="text/plain" style="width:860px;height:500px;"></script>
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
<script type="text/javascript">
    $(function() {
        $('#file_upload').uploadify({
            'buttonText' : '上传图片',
            'formData'     : {
                'timestamp' : '{{time()}}',
                '_token'     : "{{csrf_token()}}"
            },
            'swf'      : "{{asset('resources/org/uploadify/uploadify.swf')}}",
            'uploader' : "{{url('admin/upload')}}",
            'onUploadSuccess' : function(file, data, response) {
                data = $.parseJSON(data);
                if(data.status){
                   $('input[name=cover]').val(data.info);
                    $('#artical_cover').attr('src',data.info); 
                }             
            }
        });
    });
    var ue = UE.getEditor('editor');
</script>
@endsection
