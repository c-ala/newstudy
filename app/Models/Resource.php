<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;
    //白名单
    protected $fillable=['adminuser_id','type','title','desc'];

    const VIDEO = 1;
    const DOC = 2;

    //资源类型获取器，定义一个访问器，以便在资源列表获得状态
    public function getTypeNameAttribute()
    {
        $config = config('project.resource.type');
        return $config[$this->type];
    }

    //反向一对多关联到用户
    public function adminUser(){
        return $this->belongsTo('App\Models\AdminUser','adminuser_id');
    }

    //一对一关联到视频子表
    public function video()
    {
        return $this->hasOne('App\Models\ResourceVideo');
    }
    
    //一对一关联到文档子表
    public function doc()
    {
        return $this->hasOne('App\Models\ResourceDoc');
    }

    public function chapter(){
        return $this->belongsToMany('App\Models\Chapter','chapter_resources')
                    ->orderBy('sort','asc')
                    ->withPivot('sort')
                    ->withTimestamps();
    }
}
