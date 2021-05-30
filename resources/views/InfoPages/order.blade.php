@extends('layout.main')
@section('title') Обратная связь -@parent @stop
@section('content')

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Обратная связь</h1>
                <p class="lead text-muted">Новости дня</p>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div>

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Имя *</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="mail">Номер телефона</label>
                        <input type="tel" pattern="\+7\-[0-9]{3}\-[0-9]{3}\-[0-9]{2}\-[0-9]{2}" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="mail">e-mail</label>
                        <input type="email" class="form-control" name="mail" id="mail" value="{{ old('mail') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Запрос</label>
                        <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                    </div>
                    <br>
                    <button class="btn btn-success" type="submit">Оставить отзыв</button>
                </form>


            </div>
        </div>
    </div>
@endsection
