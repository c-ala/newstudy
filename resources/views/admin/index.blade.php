@extends('admin.layouts.app')

@section('content')
    <?php

use Illuminate\Support\Facades\Auth;

    //获取当前登陆者的信息
    dump( Auth::guard('admin')->user() );

    echo '管理员管理页面';

    ?>
@endsection