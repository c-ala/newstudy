<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    //
    use SoftDeletes;
    //白名单
    protected $fillable=['adminuser_id','title', 'desc','image','sort'];

    //在api资源里面使用了这种方式
    // protected $appends = ['image_link'];

    //获取器：获取课程的封面图片，如果没有，返回默认图
    function getImageLinkAttribute(){

        if(empty($this->image)){
            return asset('static/images/course_default.jpg');
        }
        return asset("storage/".$this->image);
    }

    //一对多关联到章节表
    public function chapter(){
        return $this->hasMany('App\Models\Chapter')->orderBy('sort','asc');
    }
}
