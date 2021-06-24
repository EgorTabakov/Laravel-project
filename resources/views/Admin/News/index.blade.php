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
        @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Дата</th>
                <th colspan="2">Действие</th>
            </tr>

            @forelse($newsList as $news)
                <tr>
                    <td>{{$news->id}}</td>
                    <td>{{$news->category_id}}</td>
                    <td>{{$news->title}}</td>
                    <td>{{$news->description}}</td>
                    <td>{{$news->created_at->format('d-m-Y H:i')}}</td>
                    <td><a href="{{ route('news.edit', ['news' => $news]) }}">Ред.</a></td>
                    <td>
                        <form action="{{ route('news.destroy', ['news' => $news]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Уд</button>

                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h3>Записей нет</h3></td>
                </tr>
            @endforelse

        </table>
    </div>

@endsection
