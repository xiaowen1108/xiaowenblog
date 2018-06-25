<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     *显示列表 admin/category GET
     */
    public function index()
    {
        $categorys = Category::getTree();
        //dd($categorys);
        return view('admin.category.index',['data'=>$categorys]);
    }

    /**
     * admin/category/create GET 新加
     */
    public function create()
    {
        $cates = Category::where('pid',0)->orderBy('sort','asc')->get();
        return view('admin.category.add',['cates'=>$cates]);
    }

    /**
     * admin/category POST 保存
     *
     */
    public function store(Request $request)
    {
        $input = Input::except(['_token']);
        $role = ['name'=>'required'];
        $msg = ['name.required'=>'分类名称不能少哟！'];
        $validator = Validator::make($input,$role,$msg);
        if($validator->passes()){
            $res = Category::create($input);
            return $res ? redirect('admin/category') : back()->withErrors(['添加时出现错误！']);
        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * admin/category/{category} get 展示一个
     *
     */
    public function show($id)
    {

    }

    /**
     *
     * admin/category/{category}/edit GET
     */
    public function edit($id)
    {
        $cates = Category::where('pid',0)->orderBy('sort','asc')->get();
        $info = Category::find($id);
        return view('admin.category.edit',['cates'=>$cates,'info'=>$info]);
    }

    /**
     * admin/category/{category} PUT
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = Input::except('_token','_method');
        $res = Category::where('id',$id)->update($input);
        if($res){
            return redirect('admin/category');
        }else{
            return back()->withErrors(['分类信息更新失败，请稍后重试！']);
        }
    }

    /**
     * admin/category/{category} DELETE
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Article::where('cid',$id)->count() > 0){
            return ['status'=>0,'info'=>'该分类存在文章，请先删除文章哦！'];
        }
        if(Category::where('pid',$id)->count() > 0){
            return ['status'=>0,'info'=>'该分类存在子分类，请先删除子分类哦！'];
        }
        $res = Category::where('id',$id)->delete();
        return $res ? ['status'=>1,'info'=>'分类删除成功！'] : ['status'=>0,'info'=>'分类删除失败，请稍后重试！'];
    }

    public function changeorder()
    {
        $input = Input::all();
        $info = Category::find($input['id']);
        $info->sort = $input['sort'];
        $res = $info->update();
        return $res ? ['status'=>'1','info'=>'更新排序成功哦！'] : ['status'=>'1','info'=>'更新排序失败啦！'];
    }
}
