@extends('back.index')

@section('title')
    ویرایش کاربران
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">ویرایش کاربران</h4>
                    </div>
                </div>
            </div>

            @include('back.messages')

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.profileupdate',$user->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">نام و نام خانوادگی</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{$user->name}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">ایمیل</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{$user->email}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">تلفن همراه</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{$user->phone}}">
                                    @error('phone')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">رمز ورود</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">تکرار رمز ورود</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                           name="password_confirmation">
                                    @error('password_confirmation')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title"></label>
                                    <button type="submit" class="btn btn-success">ویرایش</button>
                                    <a href="{{route('admin.users')}}" class="btn btn-warning pr-2">انصراف</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('back.footer')

    </div>

@endsection
