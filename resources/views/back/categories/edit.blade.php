@extends('back.index')

@section('title')
    ویرایش دسته بندی
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">ویرایش دسته بندی</h4>
                    </div>
                </div>
            </div>

            @include('back.messages')

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.categories.update',$category->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="title">نام دسته بندی</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{$category->name}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">نام مستعار - slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                           name="slug"  value="{{$category->slug}}">
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title"></label>
                                    <button type="submit" class="btn btn-success">ویرایش</button>
                                    <a href="{{route('admin.categories')}}" class="btn btn-warning pr-2">انصراف</a>
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
