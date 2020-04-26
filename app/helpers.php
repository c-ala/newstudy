<?php

use App\Exceptions\ApiException;
use App\Exceptions\ExceptionCode;

function alert($msg,$type='success'){
    session()->flash($type,$msg);
}

// 获取指定key的数据库配置信息
function setting($key){
    $data = app('App\Models\Setting')->kv();
    return $data[$key];
}
// API抛出异常的辅助函数
function apiErr($message,$code=ExceptionCode::ERROR,$data=[],$statusCode=400)
{
    throw new ApiException($message,$code,$data,$statusCode);
}