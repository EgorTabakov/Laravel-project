@extends('layout.admin')
@section('title') Редактировать категорию @parent @stop
@section('content')
    <div class="col-md-8">
        <br>
        <h1 class="h2">Редактировать категорию</h1>
        <div>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <form method="post" action="{{ route('categories.update', ['category' =>$category]) }}">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
                </div>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" id="description">{!! $category->description !!}</textarea>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Редактировать категорию.</button>
            </form>


        </div>

    </div>



@endsection
