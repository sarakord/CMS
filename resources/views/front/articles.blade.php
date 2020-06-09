@extends('front.index')

@section('content')
    <section id="intro2" class="clearfix"></section>

    <main class="container main2">

        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bgcolor">
                <li class="breadcrumb-item"><a href="{{route('home')}}">خانه</a></li>
                <li class="breadcrumb-item active" aria-current="page">مطالب</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-center">
            <section class="container">
                <section class="row">
                    @foreach($articles as $article)
                        <section class="col-3 pr-5">
                            <img src="@php echo '/photos/2/thumbs/'.basename($article->image) @endphp" alt="">
                            <h3><a href="{{route('article' , $article->slug)}}">{{$article->name}}</a></h3>
                            <p>@php echo substr(strip_tags($article->description),0,200).'. . .' ;  @endphp</p>
                        </section>
                    @endforeach
                </section>
                {{$articles->links()}}
            </section>
        </div>
    </main>
@endsection
