@extends('back.index')

@section('title')
    نمونه کار جدید
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">نمونه کار جدید</h4>
                    </div>
                </div>
            </div>

            @include('back.messages')

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.portfolio.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">نام آیتم</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{old('name')}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">توضیحات</label>
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                              name="description" >{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="link">لینک</label>
                                    <input type="text" class="form-control @error('link') is-invalid @enderror"
                                           name="link" value="{{old('link')}}">
                                    @error('link')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tag">تگ</label>
                                    <input type="text" class="form-control @error('tag') is-invalid @enderror"
                                           name="tag" value="{{old('tag')}}">
                                    @error('tag')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" class="form-control">
                                        <option value=0>منتشر نشده</option>
                                        <option value=1>منتشر شده</option>
                                    </select>
                                </div>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a href="#" id="lfm" data-input="image" data-preview="holder"
                                           class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> انتخاب
                                        </a>
                                    </span>
                                    <input id="image" class="form-control" type="text" name="image">
                                </div>

                                <br>
                                <br>

                                <div class="form-group">
                                    <label for="title"></label>
                                    <button type="submit" class="btn btn-success">ذخیره</button>
                                    <a href="{{route('admin.portfolio')}}" class="btn btn-warning pr-2">انصراف</a>
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
