<?php
/**
 * 后台基础控制器
 */
namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
require_once('resources/org/qiniu/autoload.php');
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
class BaseController extends Controller
{
    protected $url_access = 'http://7xviiw.com1.z0.glb.clouddn.com/';
    public function upload()
    {
        $file = Input::file('Filedata');
        if($file->isValid()){
            $accessKey = 'Rtv6mXOdCXM6XLbWyHlD2Vjh01fQDgJHrldTZZd3';
            $secretKey = 'lsizpOsfMKGP-1PuxBHba8Zu2Fv3TA9BF21vf81b';
            $auth = new Auth($accessKey, $secretKey);
            // 要转码的文件所在的空间
            $bucket = 'xiaowenblog';
            // 生成上传 Token
            $token = $auth->uploadToken($bucket);
            // 要上传文件的本地路径
            $filePath = $file->getRealPath();
            // 上传到七牛后保存的文件名
            $entension = $file -> getClientOriginalExtension();
            $key = date('YmdHis').mt_rand(100,999).'.'.$entension;
            // 初始化 UploadManager 对象并进行文件的上传
            $uploadMgr = new UploadManager();
            // 调用 UploadManager 的 putFile 方法进行文件的上传
            list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
            if ($err !== null) {
                return ['status'=>0,'info'=>$err];
            } else {
                return ['status'=>1,'info'=>$this->url_access.$ret['key']];
            }
        }
    }
}
