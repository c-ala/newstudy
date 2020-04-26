<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLogin;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('admin.login');
    }

    public function check(AdminLogin $request){
        $data = $request->validated();
        $data['state'] = AdminUser::NORMAL;
        
        $is = Auth::guard('admin')->attempt($data);
        if(!$is){
            return back()->withErrors(['username'=>'账号不可能']);
        }

        //跳转到会员首页
        return redirect()->route('admin.index');
    }

    public function logout(){
        Auth::guard('admin')->logout();

        //退出后，跳转到游客页面
        return redirect()->route('admin.login');
    }
}
