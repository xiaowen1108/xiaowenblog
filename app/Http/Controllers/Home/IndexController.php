<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{
    public function index(){
        //轮播图
        $banner = Article::where('is_recom',1)->orderBy('sort','asc')->take(5)->get();
        //文章
        $articles = Article::orderBy('created_at','desc')->take(8)->get()->toArray();
        $articles = $this->check_like($articles);
        if($this->is_pjax()){
            return view('home.index_pjax',['banner'=>$banner,'articals'=>$articles]);
        }
        return view('home.index',['banner'=>$banner,'articals'=>$articles]);
    }
    public function artical($id){
        $info = Article::find($id)->toArray();
        $info['created_at'] = date('Y-m-d H:i',$info['created_at']);
        //统计+1
        Article::where('id',$id)->increment('hits',1);
        $like = Cookie::get('wen_like');
        $like = $like ? unserialize($like) : array();
        $info['is_like'] = 0;
        if(in_array($id,$like)){
            $info['is_like'] = 1;
        }
        $_tags = explode(',',$info['tags']);
        $seminar = array();
        if($_tags){
            //相关文章 3篇
            foreach($_tags as $v){
                $ids  = Article::where('name','like','%'.$v.'%')->lists('id')->toArray();
                $seminar = array_merge($ids,$seminar);
            }
            $seminar = array_unique($seminar);//去重
        }
        if($seminar){
            $seminar_articles = Article::whereIn('id',$seminar)->where('id','>=',(Article::max('id')-Article::min('id'))*RAND(0,10000)/10000+Article::min('id'))->where('id','<>',$id)->take(3)->get()->toArray();
        }else{
            $seminar_articles = Article::where('cid',$info['cid'])->where('id','>=',(Article::max('id')-Article::min('id'))*RAND(0,10000)/10000+Article::min('id'))->where('id','<>',$id)->take(3)->get()->toArray();
        }
        if($this->is_pjax()){
            return view('home.article_pjax',['cat_id'=>$info['cid'],'info'=>$info,'title'=>$info['name'].' - 小文博客','description'=>$info['description'],'keywords'=>$info['tags'],'_tags'=>$_tags,'seminar_articles'=>$seminar_articles]);
        }
        return view('home.article',['cat_id'=>$info['cid'],'info'=>$info,'title'=>$info['name'].' - 小文博客','description'=>$info['description'],'keywords'=>$info['tags'],'_tags'=>$_tags,'seminar_articles'=>$seminar_articles]);
    }
    public function artical_list($id){        
        $cid = $id;
        //取子分类
        $cid = $this->getson($cid);
        //取分类
        $cinfo = Category::find($id);
        $title = $cinfo->seo_title;
        if($pid = $cinfo->pid){
            $cinfo = Category::find($pid);
        } 
        $keywords = $cinfo->seo_key;
        $description = $cinfo->seo_desc;
        $articles = Article::whereIn('cid',$cid)->orderBy('created_at','desc')->take(8)->get()->toArray();
        $articles = $this->check_like($articles);
        if($this->is_pjax()){
            return view('home.list_pjax',['articles'=>$articles,'cid'=>$id,'title'=>$title,'description'=>$description,'keywords'=>$keywords]);
        }
        return view('home.list',['articles'=>$articles,'cid'=>$id,'title'=>$title,'description'=>$description,'keywords'=>$keywords]);               
    }
    public function link(){
        return view('home.link');
    }
    public function liuyan(){
        if($this->is_pjax()){
            return view('home.liuyan_pjax',['title'=>'留言板_php学习_php教程_php技术_php分享_php博客 - 小文博客']);
        }
        return view('home.liuyan',['title'=>'留言板_php学习_php教程_php技术_php分享_php博客 - 小文博客']);
    }
    //搜索
    public function search(){
        $input = Input::all();
        $search = $input['s'];
        if(!$search)
            return back();
        $articles = Article::where('name','like','%'.$search.'%')->orderBy('hits','desc')->get()->toArray();
        $has = 1;
        if(!$articles){
            $articles = Article::orderBy('hits','desc')->get()->toArray();
            $has = 0;
        }
        $articles = $this->check_like($articles);
        if($this->is_pjax()){
            return view('home.search_pjax',['articles'=>$articles,'has'=>$has,'title'=>'搜索结果 - 小文博客']);
        }
        return view('home.search',['articles'=>$articles,'has'=>$has,'title'=>'搜索结果 - 小文博客']);
    }
    //通过tags去匹配文章
    public function tag($tag){
        $articles = Article::where('tags','like','%'.$tag.'%')->orderBy('hits','desc')->get()->toArray();
        $has = 1;
        if(!$articles){
            $articles = Article::orderBy('hits','desc')->get()->toArray();
            $has = 0;
        }
        $articles = $this->check_like($articles);
        if($this->is_pjax()){
            return view('home.search_pjax',['articles'=>$articles,'has'=>$has,'title'=>'搜索结果 - 小文博客']);
        }
        return view('home.search',['articles'=>$articles,'has'=>$has,'title'=>'标签云 - 小文博客']);
    }
    //点赞
    public function like(){
        $input = Input::all();
        $id = $input['id'];
        $like = Cookie::get('wen_like');
        $like = $like ? unserialize($like) : array();
        $like[] = $id;
        $like = serialize($like);
        Article::where('id',$id)->increment('like_num',1);
        return response()->json(['status'=>1,'info'=>'点赞成功'])->withCookie(cookie()->forever('wen_like', $like));
    }
    //ajax加载文章
    public function ajax_article(){
        $input = Input::all();
        $cur = $input['cur'] ? $input['cur'] : 2;
        $num = $input['num'] ? $input['num'] : 8;
        $cur = ($cur-1)*$num;
        $articles = Article::orderBy('created_at','desc')->skip($cur)->take($num)->get()->toArray();
        if($articles){
            $articles = $this->check_like($articles);
            return ['status'=>1,'info'=>$articles];
        }else{
            return ['status'=>0,'info'=>'没有数据了'];
        }
    }
    //ajax加载文章
    public function ajax_cat_article(){
        $input = Input::all();
        $cur = $input['cur'] ? $input['cur'] : 2;
        $num = $input['num'] ? $input['num'] : 8;
        $cid = $input['cid'];
        $cid = $this->getson($cid);
        $cur = ($cur-1)*$num;
        $articles = Article::whereIn('cid',$cid)->orderBy('created_at','desc')->skip($cur)->take($num)->get()->toArray();
        if($articles){
            $articles = $this->check_like($articles);
            return ['status'=>1,'info'=>$articles];
        }else{
            return ['status'=>0,'info'=>'没有数据了'];
        }
    }
    //文章是否被喜欢+文章时间格式化
    protected function check_like($articles){
        $like = Cookie::get('wen_like');
        //dd($like);
        $like = $like ? unserialize($like) : array();
        foreach($articles as $k => $v){
            $articles[$k]['is_like'] = 0;
            if(in_array($v['id'],$like)){
                $articles[$k]['is_like'] = 1;
            }
            $articles[$k]['created_at'] = date('Y-m-d H:i',$v['created_at']);
        }
        return $articles;
    }
    //取分类的子ID
    protected function getson($id){
        $info = Category::find($id);
        $arr = array();
        if($info['pid']){
            $arr[] = $id;
        }else{
            $arr = Category::where('pid',$id)->lists('id')->toArray();
        }
        return $arr;
    }
    protected function is_pjax(){
        $input = Input::all();
        if(isset($input['_pjax']) && !empty($input['_pjax'])){
            return true;
        }else{
            return false;
        }
    }
}
