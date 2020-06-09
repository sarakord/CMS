@extends('front.index')

@section('content')
    @include('front.intro')
    @include('front.messages')
    <main id="main">
        @include('front.about')
        @include('front.services')
        @include('front.whyUs')
        @include('front.callToAction')
        @include('front.features')
        @include('front.portfolio')
        @include('front.testimonials')
        @include('front.team')
        @include('front.client')
        @include('front.pricing')
        @include('front.faq')
    </main>
@endsection
