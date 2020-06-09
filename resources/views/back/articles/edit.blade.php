@extends('back.index')

@section('title')
    ویرایش مطلب
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
                        <h4 class="page-title">ویرایش مطلب</h4>
                    </div>
                </div>
            </div>

            @include('back.messages')

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('admin.articles.update' , $article->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">نام مطلب</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{$article->name}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="slug">نام مستعار - slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                           name="slug" value="{{$article->slug}}">
                                    @error('slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">محتوای مطلب</label>
                                    <textarea type="text" id="editor"
                                              class="form-control @error('description') is-invalid @enderror"
                                              name="description">{{$article->description}}</textarea>
                                    @error('slug')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" class="form-control">
                                        <option value=0>منتشر نشده</option>
                                        <option value=1 @php if($article->status==1) echo 'selected'; @endphp>منتشر
                                            شده
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="categories">انتخاب دسته بندی</label>
                                    <div id="output"></div>
                                    <select class="chosen-select" name="categories[]" multiple id="select"
                                            style="width: 400px;">
                                        @foreach($categoreis as $cat_id => $cat_name)
                                            <option value={{$cat_id}} <?php if (in_array($cat_id,
                                                $article->categories->pluck('id')->toarray())) echo 'selected';
                                                ?>>{{$cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="description">نویسنده : {{Auth::user()->name}}</label>
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                </div>

                                <div class="input-group">
                                <span class="input-group-btn">
                                    <a href="#" id="lfm" data-input="image" data-preview="holder"
                                       class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> انتخاب
                                    </a>
                                </span>
                                    <input id="image" class="form-control" type="text" name="image"
                                           value="{{$article->image}}">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;margin-bottom: 50px;" src="{{$article->image}}">

                                <div class="form-group">
                                    <label for="title"></label>
                                    <button type="submit" class="btn btn-success">ذخیره</button>
                                    <a href="{{route('admin.articles')}}" class="btn btn-warning pr-2">انصراف</a>
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

@section('js')

    <script type="text/javascript" src="{{asset('multiselect/chosen.jquery.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#select').chosen();
        });

    </script>

@endsection
