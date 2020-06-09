@extends('back.index')

@section('title')
    ویرایش نظر
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('multiselect/chosen.min.css')}}">
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">ویرایش نظر</h4>
                    </div>
                </div>
            </div>

            @include('back.messages')

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.Comments.update' , $comment->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">نام </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{$comment->name}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">ایمیل</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{$comment->email}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="body">محتوای نظر</label>
                                    <textarea type="text" class="form-control @error('body') is-invalid @enderror"
                                              name="body">{{$comment->body}}</textarea>
                                    @error('body')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" class="form-control">
                                        <option value=0>منتشر نشده</option>
                                        <option value=1 @php if($comment->status==1) echo 'selected'; @endphp>منتشر
                                            شده
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title"></label>
                                    <button type="submit" class="btn btn-success">ذخیره</button>
                                    <a href="{{route('admin.comments')}}" class="btn btn-warning pr-2">انصراف</a>
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

