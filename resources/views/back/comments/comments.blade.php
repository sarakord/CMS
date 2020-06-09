@extends('back.index')

@section('title')
    مدیریت نظرات
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="col-10 float-right  page-title"> مدیریت نظرات</h4>
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
                                    <th>خلاصه نظر</th>
                                    <th>نویسنده</th>
                                    <th>مطلب</th>
                                    <th>تاریخ</th>
                                    <th>وضعیت</th>
                                    <th>مدیریت</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($comments as $comment)

                                    @switch($comment->status)
                                        @case(0)
                                        @php
                                            $url=route('admin.Comments.status', $comment->id);
                                            $status = '<a href="'.$url.'" class="badge badge-danger">منتشر نشده</a>'
                                        @endphp
                                        @break
                                        @case(1)
                                        @php
                                            $url=route('admin.Comments.status', $comment->id);
                                            $status = '<a href="'.$url.'" class="badge badge-success">منتشر شده</a>'
                                        @endphp
                                        @break
                                    @endswitch

                                    <tr>
                                        <td>{!! mb_substr($comment->body,0,50,'UTF8') !!}</td>
                                        <td>{{$comment->name}}</td>
                                        <td>{{ $comment->article->name }}</td>
                                        <td>{!! jdate($comment->created_at)->format('%Y-%m-%d') !!}</td>
                                        <td>{!! $status !!}</td>
                                        <td>
                                            <a href="{{route('admin.Comments.edit', $comment->id)}}" class="badge
                                            badge-success">ویرایش</a>
                                            <a href="{{route('admin.Comments.destroy', $comment->id)}}"
                                               class="badge badge-danger"
                                               onclick="return confirm('آیا دسته بندی مورد نظر حذف شود؟')">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$comments->links()}}
                    </div>
                </div>
            </div>
        </div>

        @include('back.footer')

    </div>

@endsection
