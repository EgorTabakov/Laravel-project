@extends('layout.admin')
@section('title') Редактировать профиль @parent @stop
@section('content')
    <div class="col-md-8">
        <br>
        <h1 class="h2">Редактировать профиль</h1>
        <div>


            <form method="post" action="{{ route('account.update', ['user' => $user]) }}">
                @csrf


                @if($errors->has('name'))
                    @foreach($errors->get('name') as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <div class="form-group">
                    <label for="name">Имя *</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                </div>

                @if($errors->has('email'))
                    @foreach($errors->get('email') as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                </div>


                <div class="form-group">
                    <label for="isAdmin">Статус</label>
                    <input type="text" class="form-control" name="isAdmin" id="isAdmin" value="{{ $user->Is_Admin }}">
                </div>

                @if($errors->has('password'))
                    @foreach($errors->get('password') as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="password">Текущий Пароль</label>
                    <input type="text" class="form-control" name="password" id="password">
                </div>

                @if($errors->has('newPassword'))
                    @foreach($errors->get('newPassword') as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="newPassword">Новый Пароль</label>
                    <input type="text" class="form-control" name="newPassword" id="newPassword">
                </div>

                <br>
                <button class="btn btn-success" type="submit">Сохранить изменения</button>
            </form>


        </div>

    </div>



@endsection
