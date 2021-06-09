@extends('layout.admin')
@section('title') Создать категорию @parent @stop
@section('content')
    <div class="col-md-8">
        <br>
        <h1 class="h2">Создать категорию</h1>
        <div>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <form method="post" action="{{ route('categories.store') }}">
                @csrf

                <div class="form-group">
                    <label for="title">Заголовок *</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Добавить категорию</button>
            </form>


        </div>

    </div>



@endsection
