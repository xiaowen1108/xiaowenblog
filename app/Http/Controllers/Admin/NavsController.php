<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends BaseController
{
    //get.admin/navs  全部自定义导航列表
    public function index()
    {
        $data = Navs::getTree();
        return view('admin.navs.index',compact('data'));
    }

    //get.admin/navs/create   添加自定义导航
    public function create()
    {
        $navs = Navs::where('pid',0)->orderBy('sort','asc')->get();
        return view('admin/navs/add',['navs'=>$navs]);
    }

    //post.admin/navs  添加自定义导航提交
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'name'=>'required',
            'url'=>'required',
        ];

        $message = [
            'name.required'=>'自定义导航名称不能为空！',
            'url.required'=>'自定义导航URL不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Navs::create($input);
            if($re){
                return redirect('admin/navs');
            }else{
                return back()->with('errors','自定义导航失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/navs/{navs}/edit  编辑自定义导航
    public function edit($id)
    {
        $navs = Navs::where('pid',0)->orderBy('sort','asc')->get();
        $field = Navs::find($id);
        return view('admin.navs.edit',['navs'=>$navs,'field'=>$field]);
    }

    //put.admin/navs/{navs}    更新自定义导航
    public function update($id)
    {
        $input = Input::except('_token','_method');
        $re = Navs::where('id',$id)->update($input);
        if($re){
            return redirect('admin/navs');
        }else{
            return back()->with('errors','自定义导航更新失败，请稍后重试！');
        }
    }

    //delete.admin/navs/{navs}   删除自定义导航
    public function destroy($id)
    {
        if(Navs::where('pid',$id)->count() > 0){
            return ['status'=>0,'info'=>'该导航存在子导航，请先删除子导航哦！'];
        }
        $res = Navs::where('id',$id)->delete();
        return $res ? ['status'=>1,'info'=>'自定义导航删除成功！'] : ['status'=>0,'info'=>'自定义导航删除失败，请稍后重试！'];
    }


    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }

    public function changeorder()
    {
        $input = Input::all();
        $info = Navs::find($input['id']);
        $info->sort = $input['sort'];
        $res = $info->update();
        return $res ? ['status'=>'1','info'=>'更新排序成功哦！'] : ['status'=>'1','info'=>'更新排序失败啦！'];
    }

}
