@extends('layout.admin')
@section('title') Список новостей @parent @stop
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('news.create')}}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Действие</th>
            </tr>

            @forelse($newsList as $news)
                <tr>
                    <td>{{$news->id}}</td>
                    <td>{{$news->category_id}}</td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->description}}</td>
                    <td><a href="">Ред.</a>&nbsp;||&nbsp;<a href="">Уд.</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h3>Записей нет</h3></td>
                </tr>
            @endforelse

        </table>
    </div>

@endsection
