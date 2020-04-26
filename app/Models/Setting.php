<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    //引用软删除才能支持软删除，否则即便有软删除字段也是不能生效的
    use SoftDeletes;

    //每个模型都必须设置白名单
    protected $fillable = ['key','value','name','comment','sort'];

    protected $kvs = null;

    public function kv(){
        if($this->kvs === null){
            $this->kvs = $this->orderBy('sort','asc')->get()->mapWithKeys(function($item){
                return[
                    $item['key'] => $item['value']
                ];
            });
        }

        return $this->kvs;
    }
}
