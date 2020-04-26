<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    //引用软删除才能支持软删除，否则即便有软删除字段也是不能生效的
    use SoftDeletes;

    //每个模型都必须设置白名单
    protected $fillable = ['username','password','state'];
    
    //定义类常量-管理员的状态
    const NORMAL = 1;//正常，可登录
    const BAN = 0;//禁用，不可登录

    //状态获取器，定义一个访问器，以便在管理员列表获得状态
    public function getStateTextAttribute()
    {
        $config = config('project.admin.state');
        return $config[$this->state];
    }

}
