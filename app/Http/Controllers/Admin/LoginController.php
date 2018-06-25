<?php
/**
 * 登陆控制器
 */
namespace App\Http\Controllers\Admin;
use App\Http\Model\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Resources\Org\Code\Code;
class LoginController extends BaseController
{
    /**
     * 登陆
     */
    public function login()
    {
        if($input = Input::all())
        {
            //dd($input);
            $code = new Code();
            if(!$input['name'] || !$input['name'] || !$input['name'])
                return back()->with('msg','请正确填写登录信息！');
            if(strtoupper($input['code']) != $code->get())
                return back()->with('msg','验证码错误！');
            $info = User::first();
            if($input['name'] != $info->name || $input['pwd'] != Crypt::decrypt($info->pwd))
                return back()->with('msg','账号或密码错误！');
            session(['admin'=>$info]);
            return redirect('admin/index');
        }else
        {
            //echo Crypt::encrypt('tfwlcz1314');
            return view('admin.login');
        }
    }
    /**
     * 验证码
     */
    public function code()
    {
        $code = new Code();
        return $code->make();
    }
}
