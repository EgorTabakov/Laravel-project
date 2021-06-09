@extends('layout.admin')
@section('title') Список категорий @parent @stop
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список категорий</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('categories.create')}}" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
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
                <th>Заголовок</th>
                <th>Описание</th>
                <th colspan="2">Действие</th>
            </tr>

            @forelse($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->description}}</td>
                    <td><a href="{{ route('categories.edit', ['category' => $category]) }}">Ред.</a></td>
                    <td><form action="{{ route('categories.destroy', ['category' => $category]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"  class="btn btn-sm btn-danger">Уд</button>

                        </form></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"><h3>Записей нет</h3></td>
                </tr>
            @endforelse

        </table>
    </div>

@endsection
