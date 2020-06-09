@extends('back.index')

@section('title')
    مدیریت کاربران
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="page-title">مدیریت کاربران</h4>
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
                                    <th>کاربر</th>
                                    <th>ایمیل</th>
                                    <th>تلفن</th>
                                    <th>نقش</th>
                                    <th>وضعیت</th>
                                    <th>مدیریت</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)

                                    @switch($user->role)
                                        @case(1) @php $role='مدیر' @endphp
                                        @break
                                        @case(2) @php $role='کاربر' @endphp
                                        @break
                                    @endswitch

                                    @switch($user->status)
                                        @case(1)
                                        @php
                                            $url = route('admin.user.status',$user->id);
                                            $status = '<a href="'.$url.'" class="badge badge-success">فعال</a>'
                                        @endphp
                                        @break
                                        @case(0)
                                        @php
                                            $url = route('admin.user.status',$user->id);
                                            $status = '<a href="'.$url.'" class="badge badge-danger">غیرفعال</a>'
                                        @endphp
                                        @break
                                    @endswitch

                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$role}}</td>
                                        <td>{!! $status !!}</td>
                                        <td>
                                            <a href="{{route('admin.profile', $user->id)}}" class="badge badge-success">ویرایش</a>
                                            <a href="{{route('admin.user.delete', $user->id)}}"
                                               class="badge badge-danger"
                                               onclick="return confirm('آیا کاربر مورد نظر حذف شود؟')">حذف</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>

        @include('back.footer')

    </div>

@endsection
