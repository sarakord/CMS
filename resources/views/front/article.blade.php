@extends('front.index')

@section('content')
    <section id="intro2" class="clearfix"></section>

    <main class="container main2">

        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bgcolor">
                <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
                <li class="breadcrumb-item"><a href="{{route('articles')}}">مطلب</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$article->name}}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-center">
            <section class="container">
                <h3>{{$article->name}}</h3>
                <img src="@php echo '/photos/2/'.basename($article->image) @endphp" alt="">
                <p class="mt-4">@php echo mb_substr(strip_tags($article->description),0,200,'UTF8').'. . .' ;
                    @endphp</p>
                <br><br>
                <p>نویسنده : {{$article->user->name}}</p>
                <p>تعداد بازدید : {{$article->hit}}</p>
                <p>تاریخ : {!! jdate($article->created_at)->format('%d - %m - %Y') !!}</p>

            </section>
        </div>

        <div>
            <hr>
            @include('back.messages')
            <form action="{{route('comment.store', $article->slug)}}" method="POST" class="form-group">
                @csrf
                @auth
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="name">نام :</label>
                            <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="name">ایمیل :</label>
                            <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}"
                                   readonly>
                        </div>
                    </div>
                @else
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="name">نام :</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group col-6">
                            <label for="name">ایمیل :</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                @endauth
                <div class="form-group">
                    <label for="body">متن نظر شما :</label>
                    <textarea name="body" cols="30" rows="10" class="form-control"> </textarea>
                </div>

                <div class="form-group">
                    <label for="recaptcha">تصویر امنیتی :</label>
                    {!! htmlFormSnippet() !!}
                </div>


                <button class="btn btn-primary" type="submit">ثبت نظر</button>
            </form>
        </div>

        <div>
            @foreach($comments as $comment)
                <h4>{{$comment->name}}</h4>
                <h4>{{$comment->email}}</h4>
                <p>{{$comment->body}}</p>
                <hr>
            @endforeach
        </div>
    </main>
@endsection
