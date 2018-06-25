<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
    protected $table='nav';
    protected $dateFormat = 'U';
    protected $guarded=[];
    public static function getTree(){
        $data = self::orderBy('sort','asc')->get();
        $tree = array();
        foreach($data as $k=>$v){
            if($v->pid == 0){
                $tree[] = $v;
                foreach($data as $m=>$n){
                    if($n->pid == $v->id){
                        $n->name = '├─ '.$n->name;
                        $tree[] = $n;
                    }
                }
            }
        }
        return $tree;
    }
    public static function getSub(){
        $data = self::orderBy('sort','asc')->get()->toArray();
        $tree = array();
        foreach($data as $k=>$v){
            if($v['pid'] == 0){
                foreach($data as $m=>$n){
                    if($n['pid'] == $v['id']){
                        $v['child'][] = $n;
                    }
                }
                $tree[] = $v;
            }
        }
        return $tree;
    }
}
