<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Article;
use App\Http\Model\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends BaseController
{

    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    public function pass()
    {
        if($input = Input::all()){
            $role = ['new_pwd'=>'required|between:6,20|confirmed'];
            $msg = ['new_pwd.required'=>'新密码不能为空！',
                'new_pwd.between'=>'新密码必须在6-20位之间！',
                'new_pwd.confirmed'=>'新密码和确认密码不一致！'];
            $validator = Validator::make($input,$role,$msg);//表单信息，规则，信息；
            if($validator->passes()){
                $user = User::first();
                $pwd = Crypt::decrypt($user->pwd);
                if($pwd != $input['old_pwd'])
                    return back()->withErrors(['原密码错误！']);
                $user->pwd = Crypt::encrypt($input['new_pwd']);
                return $user->update() != false ? back()->withErrors(['密码修改成功！']) : back()->withErrors(['密码修改失败！']);
            }else{
                return back()->withErrors($validator);
            }
        }
        return view('admin.pass');
    }

    public function layout()
    {
        session(['admin'=>null]);
        return redirect('admin/login');
    }

    public function recom(){
        $data = Article::select('article.*','admin_users.nickname as nickname')->leftJoin('admin_users', 'article.uid', '=', 'admin_users.id')->where('is_recom',1)->orderBy('sort','asc')->paginate(8);
        return view('admin.article.recom',compact('data'));
    }
}
