<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public function index(Request $request,File $fileModel){

        $data = [
            'files' => $fileModel->orderBy('id','desc')->paginate(15),
        ];
        return view('admin.file.index',$data);
    }

    //上传表单
    public function up(Request $request){
        $data = [];
        return view('admin.file.up',$data);
    }

    //保存上传
    public function save(Request $request,File $fileModel){
        if( $request->hasFile('filename') && $request->file('filename')->isValid() ){

            $file = $request->file('filename');
            if( !in_array( $file->extension(), config('project.upload.files') ) ){
                alert('不被允许的文件类型', 'danger');
                return back();
            } 

            //保存文件到指定位置
            $filepath = $file->store('other','public');//other是指定存储的文件夹
            $fileModel->saveFile('other_upload',$filepath,$file);//（上传渠道：独立上传，文件路径，文件对象）

            alert('上传成功');
            return redirect()->route('admin.file');

        }else{
            alert('上传失败','danger');
            return back();
        }
    }
}
