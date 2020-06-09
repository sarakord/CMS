@extends('back.index')

@section('title')
    مدیریت مطالب
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="col-10 float-right  page-title"> مدیریت مطالب</h4>
                            <a href="{{route('admin.articles.create')}}" class=" col-2 btn btn-primary float-left
                            d-block font-weight-bold " style="font-size: 16px;line-height: 20px;">مطلب جدید</a>
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
                                    <th>نویسنده</th>
                                    <th>دسته یندی</th>
                                    <th>بازدید</th>
                                    <th>وضعیت</th>
                                    <th>مدیریت</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($articles as $article)

                                    @switch($article->status)
                                        @case(0)
                                        @php
                                            $url=route('admin.articles.status', $article->id);
                                            $status = '<a href="'.$url.'" class="badge badge-danger">منتشر نشده</a>'
                                        @endphp
                                        @break
                                        @case(1)
                                        @php
                                            $url=route('admin.articles.status', $article->id);
                                            $status = '<a href="'.$url.'" class="badge badge-success">منتشر شده</a>'
                                        @endphp
                                        @break
                                    @endswitch

                                    <tr>
                                        <td>{{$article->name}}</td>
                                        <td>{{$article->slug}}</td>
                                        <td>{{ $article->user->name }}</td>
                                        <td>
                                            @foreach($article->categories()->pluck('name') as $category)
                                                <span class="badge badge-primary">{{$category}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{$article->hit}}</td>
                                        <td>{!! $status !!}</td>
                                        <td>
                                            <a href="{{route('admin.articles.edit', $article->id)}}" class="badge
                                            badge-success">ویرایش</a>
                                            <a href="{{route('admin.articles.destroy', $article->id)}}"
                                               class="badge badge-danger"
                                               onclick="return confirm('آیا دسته بندی مورد نظر حذف شود؟')">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>

        @include('back.footer')

    </div>

@endsection
