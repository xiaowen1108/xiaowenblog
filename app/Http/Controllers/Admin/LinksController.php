<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{
    //get.admin/links  全部友情链接列表
    public function index()
    {
        $data = Links::orderBy('sort','asc')->get();
        return view('admin.links.index',compact('data'));
    }

    public function changeorder()
    {
        $input = Input::all();
        $info = Links::find($input['id']);
        $info->sort = $input['sort'];
        $res = $info->update();
        return $res ? ['status'=>'1','info'=>'更新排序成功哦！'] : ['status'=>'1','info'=>'更新排序失败啦！'];
    }

    //get.admin/links/create   添加友情链接
    public function create()
    {
        return view('admin/links/add');
    }

    //post.admin/links  添加友情链接提交
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'name'=>'required',
            'url'=>'required',
        ];

        $message = [
            'name.required'=>'友情链接名称不能为空！',
            'url.required'=>'友情链接URL不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Links::create($input);
            return $res ? redirect('admin/links') : back()->withErrors(['添加时出现错误！']);
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/links/{links}/edit  编辑友情链接
    public function edit($id)
    {
        $info = Links::find($id);
        return view('admin.links.edit',compact('info'));
    }

    //put.admin/links/{links}    更新友情链接
    public function update($id)
    {
        $input = Input::except('_token','_method');
        $re = Links::where('id',$id)->update($input);
        if($re){
            return redirect('admin/links');
        }else{
            return back()->with('errors','友情链接更新失败，请稍后重试！');
        }
    }

    //delete.admin/links/{links}   删除友情链接
    public function destroy($id)
    {
        $res = Links::where('id',$id)->delete();
        return $res ? ['status'=>1,'info'=>'友情链接删除成功！'] : ['status'=>0,'info'=>'友情链接删除失败，请稍后重试！'];
    }


    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }

}
