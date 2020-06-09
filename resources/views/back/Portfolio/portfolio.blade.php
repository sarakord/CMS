@extends('back.index')

@section('title')
    مدیریت نمونه کارها
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="col-10 float-right  page-title"> مدیریت نمونه کار ها</h4>
                        <a href="{{route('admin.portfolio.create')}}" class=" col-2 btn btn-primary float-left
                            d-block font-weight-bold " style="font-size: 16px;line-height: 20px;">نمونه کار جدید</a>
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
                                    <th>توضیحات</th>
                                    <th>لینک</th>
                                    <th>تگ</th>
                                    <th>وضعیت</th>
                                    <th>مدیریت</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($Portfolios as $portfolio)

                                    @switch($portfolio->status)
                                        @case(0)
                                        @php
                                            $url=route('admin.portfolio.status', $portfolio->id);
                                            $status = '<a href="'.$url.'" class="badge badge-danger">منتشر نشده</a>'
                                        @endphp
                                        @break
                                        @case(1)
                                        @php
                                            $url=route('admin.portfolio.status', $portfolio->id);
                                            $status = '<a href="'.$url.'" class="badge badge-success">منتشر شده</a>'
                                        @endphp
                                        @break
                                    @endswitch

                                    <tr>
                                        <td>{{$portfolio->name}}</td>
                                        <td>{{$portfolio->description}}</td>
                                        <td>{{$portfolio->link}}</td>
                                        <td>{{$portfolio->tag}}</td>
                                        <td>{!! $status !!}</td>

                                        <td>
                                            <a href="{{route('admin.portfolio.edit', $portfolio->id)}}" class="badge
                                            badge-success">ویرایش</a>
                                            <a href="{{route('admin.portfolio.destroy', $portfolio->id)}}"
                                               class="badge badge-danger"
                                               onclick="return confirm('آیا نمونه کار مورد نظر حذف شود؟')">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$Portfolios->links()}}
                    </div>
                </div>
            </div>
        </div>

        @include('back.footer')

    </div>

@endsection
