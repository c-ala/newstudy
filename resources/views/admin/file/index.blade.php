@extends('admin.layouts.app')

@section('title')
    文件管理
@endsection

@section('sidebar')
@include('admin.file.menu')
@endsection

@section('content')

    <!-- 页头组件引用 12345覆盖的是slot部分-->
    @page_title(['title'=>'文件管理','comment'=>'你的文件管理中心'])
    <!-- 1234 -->
    @endpage_title

<div class='row'>
    <div class='col-12'>
        <table class="table table-sm">
            <thead class="thead-light">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">作者</th>
                    <th scope="col">类别</th>
                    <th scope="col">类型</th>
                    <th scope="col">大小</th>
                    <th scope="col">文件名</th>
                    <th scope="col">地址</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">查看文件</th>

                </tr>
            </thead>
            <tbody>
                @foreach($files as $file)
                <tr>
                    <th scope="row">{{$file->id}}</th>
                    <td>{{$file->adminUser->username ?? '---'}}</td>
                    <td>{{$file->file_type_format}}</td>
                    <td>{{$file->fileext}}</td>
                    <td>{{$file->file_size_format}}</td>
                    <td>
                        <input class='form-control form-control-sm' type='text' value='{{$file->client_filename}}' />
                    </td>
                    <td>
                        <input class='form-control form-control-sm' type='text' value='{{$file->file_link}}' />
                    </td>
                    <td>{{$file->created_at}}</td>
                    <td><a href='{{$file->file_link}}' target='_blank'>查看</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$files->links()}}
    </div>
</div>

@endsection