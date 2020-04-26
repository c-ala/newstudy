<?php 


//信息提示，在任何页面只要有这行代码就可以了
// session()->flash('success','test');
 //alert('ok');
?>
@foreach(['success', 'danger'] as $message)
@if( session()->has($message) )
<div class='message mt-2'>
    <div class="alert alert-{{$message}}">
        {{session()->get($message)}}
    </div>
    <script>
    setTimeout(() => {
        $(".alert").alert('close');
    }, 5000);
    </script>
</div>
@endif
@endforeach