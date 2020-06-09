@extends('back.index')

@section('title')
    مدیریت دسته بندی ها
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="col-10 float-right  page-title"> مدیریت دسته بندی ها</h4>
                            <a href="{{route('admin.categories.create')}}" class=" col-2 btn btn-primary float-left
                            d-block font-weight-bold " style="font-size: 16px;line-height: 20px;">دسته بندی جدید</a>
                    </div>
                </div>
            </div>

            @include('back.messages')

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>نام مستعار - slug</th>
                                    <th>مدیریت</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            <a href="{{route('admin.categoreis.edit', $category->id)}}" class="badge
                                            badge-success">ویرایش</a>
                                            <a href="{{route('admin.categories.destroy', $category->id)}}"
                                               class="badge badge-danger"
                                               onclick="return confirm('آیا دسته بندی مورد نظر حذف شود؟')">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>

        @include('back.footer')

    </div>

@endsection
