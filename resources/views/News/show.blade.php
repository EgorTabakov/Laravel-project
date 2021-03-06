@extends('layout.main')
@section('title') Новость-{{$news->title}} -@parent @stop
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">{{$news->title}}</h1>
                <p class="lead text-muted">{{$news->category_title}}</p>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">{{ $news->description }}</div>
    </div>
@endsection
