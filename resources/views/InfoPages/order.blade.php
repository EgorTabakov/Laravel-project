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
                        <label for="name">Имя *</label>
                        <input type="name" class="form-control" name="name" id="title" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Номер телефона</label>
                        <input type="phone" pattern="\+7\-[0-9]{3}\-[0-9]{3}\-[0-9]{2}\-[0-9]{2}" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">e-mail</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="order">Заказ на выгрузку</label>
                        <textarea class="form-control" name="order" id="order">{!! old('order') !!}</textarea>
                    </div>
                    <br>
                    <button class="btn btn-success" type="submit">Оставить отзыв</button>
                </form>


            </div>
        </div>
    </div>
@endsection
