<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Config;
use App\Http\Model\Links;
use App\Http\Model\Navs;
use App\Http\Model\Tags;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct()
    {
        //随机推荐的8篇文章
        $rand = Article::where('id','>=',(Article::max('id')-Article::min('id'))*RAND(0,10000)/10000+Article::min('id'))->take(8)->select('name','id')->get();
        //最新发布文章8篇
        $new = Article::orderBy('created_at','desc')->take(8)->select('name','id')->get();
        //推荐阅读5个
        $recom = Article::orderBy('hits','desc')->take(5)->get();
        //导航
        $navs = Navs::getSub();
        $sub_navs = Navs::where('pid',0)->orderBy('sort','asc')->select('id','alias','url')->take(6)->get();
        //标签云（15个标签）
        $tags = Tags::take(15)->where('article_num','>',0)->orderBy('article_num','desc')->get();
        //友情链接
        $links = Links::orderBy('sort','asc')->get();
        View::share('navs',$navs);
        View::share('sub_navs',$sub_navs);
        View::share('rand',$rand);
        View::share('new',$new);
        View::share('tags',$tags);
        View::share('recom',$recom);
        View::share('links',$links);
    }
}
