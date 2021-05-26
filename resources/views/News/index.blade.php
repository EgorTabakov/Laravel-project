@extends('layout.main')
@section('title') Список новостей -@parent @stop
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Новости</h1>
                <p class="lead text-muted">Новости дня</p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @forelse ($newsList as $key => $news)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Новость - {{ $key }}</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Картинка</text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text">{{ $news }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('news.show', ['id' => $key]) }}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                    </div>
                                    <small class="text-muted">добавлена: {{ now()->format('d-m-Y H-i') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>записи отсутствуют</h2>
                @endforelse
            </div>
        </div>
    </div>
@endsection
