<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Tags;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::select('article.*','admin_users.nickname as nickname')->leftJoin('admin_users', 'article.uid', '=', 'admin_users.id')->orderBy('article.id','desc')->paginate(8);
        return view('admin.article.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::getTree();
        //dd($data);
        return view('admin.article.add')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $input = Input::except(['_token','']);
        $role = ['name'=>'required',
                 'cid'=>'required',
                 'cover'=>'required'];
        $msg = ['name.required'=>'文章名称不能少哟！',
                'cid.required'=>'文章分类不能少哟！',
                'cover.required'=>'封面图不能少哟！'];
        $validator = Validator::make($input,$role,$msg);
        if($validator->passes()){
            //作者信息
            $user = session('admin');
            $input['uid'] = $user['id'];
            //标签云
            if($input['tags']){
                $input['tags'] = str_replace('，',',',$input['tags']);
                $tags = explode(',',$input['tags']);
                $info = Tags::lists('name')->toArray();
                foreach($tags as $v){
                    if (in_array($v, $info)) {
                        //增加文章数目
                        Tags::where('name', $v)->increment('article_num',1);
                    } else {
                        Tags::create(['name' => $v, 'article_num' => 1]);
                    }
                }
            }
            $res = Article::create($input);
            return $res ? redirect('admin/article') : back()->withErrors(['添加时出现错误！']);
        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::getTree();
        $info = Article::find($id);
        return view('admin.article.edit',compact('data','info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = Input::except('_token','_method');
        $info = Article::find($id)->toArray();
        //先将原来的全部减一
        if($info['tags']){
            $info['tags'] = explode(',',$info['tags']);
            foreach($info['tags'] as $v){
                Tags::where('name', $v)->decrement('article_num',1);
            }
        }
        //再将添加的重新计数
        if($input['tags']){
            $input['tags'] = str_replace('，',',',$input['tags']);
            $tags = explode(',',$input['tags']);
            foreach($tags as $v){
                if (in_array($v, $info)) {
                    //增加文章数目
                    Tags::where('name', $v)->increment('article_num',1);
                } else {
                    Tags::create(['name' => $v, 'article_num' => 1]);
                }
            }
        }
        $res = Article::where('id',$id)->update($input);
        if($res){
            return redirect('admin/article');
        }else{
            return back()->with('errors','文章更新失败，请稍后重试！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Article::find($id)->toArray();
        //先将原来的全部减一
        if($info['tags']){
            $info['tags'] = explode(',',$info['tags']);
            foreach($info['tags'] as $v){
                Tags::where('name', $v)->decrement('article_num',1);
            }
        }
        $res = Article::where('id',$id)->delete();
        return $res ? ['status'=>1,'info'=>'文章删除成功！'] : ['status'=>0,'info'=>'文章删除失败，请稍后重试！'];
    }

    public function set_recom($id)
    {
        $info = Article::find($id);
        $input = Input::all();
        $info->is_recom = $input['recom'] ? 0 : 1;
        $info->update();
        return $input['recom'] ? ['status'=>0,'info'=>'取消推荐成功！'] : ['status'=>1,'info'=>'推荐成功！'];
    }

    public function changeorder()
    {
        $input = Input::all();
        $info = Article::find($input['id']);
        $info->sort = $input['sort'];
        $res = $info->update();
        return $res ? ['status'=>'1','info'=>'更新排序成功哦！'] : ['status'=>'1','info'=>'更新排序失败啦！'];
    }
}
