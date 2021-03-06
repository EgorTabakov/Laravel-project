@extends('layout.admin')
@section('title') Редактировать новость @parent @stop
@section('content')
    <div class="col-md-8">
        <br>
        <h1 class="h2">Редактировать новость</h1>
        <div>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <form method="post" action="{{ route('news.update', ['news' =>$news]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if($category->id === $news->category_id) selected @endif>{{ $category->title }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="title">Заголовок *</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
                </div>
                <div class="form-group">
                    <label for="image">Лого</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="form-group">
                    <label for="description">Заголовок</label>
                    <textarea class="form-control" name="description"
                              id="description">{!! $news->description !!}</textarea>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Редактировать новость</button>
            </form>


        </div>

    </div>



@endsection
@push('js')

    <script src="{{ asset('/js/ckeditor5-build-classic/ckeditor.js') }}"
            type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>


@endpush
