@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @if($errors->any())
            <div class="container-fluid ">
                @foreach($errors->all() as $error)
                    <p class="text-danger text-center">{{$error}}</p>
                @endforeach
            </div>
        @endif
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

@if (session('warning'))
<div class="alert alert-danger">
    یک خطا رخ داد.کد خطا: {{session('warning')}}
</div>
@endif
