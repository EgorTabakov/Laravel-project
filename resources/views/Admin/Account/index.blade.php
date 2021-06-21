@extends('layout.admin')
@section('title') Список пользователей @parent @stop
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>

    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            Добро пожаловать: {{ Auth::user()->name }} <br>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Статус</th>
                <th colspan="2">Действие</th>
            </tr>

            @forelse($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if ($user->is_admin)
                        <td>Админ</td>
                    @else
                        <td>Пользователь</td>

                    @endif

                    <td><a href="{{ route('account.edit', $user->id) }}">Ред.</a></td>

                    <td>
                        <form action="{{ route('account.destroy', $user->id) }}" method="post">
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
