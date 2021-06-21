Добро пожаловать: {{ Auth::user()->name }} <br>
@if(Auth::user()->avatar)
    <img src="{{ Auth::user()->avatar }}" style="width: 50px"><br>
@endif
<a href="{{ route('news.index') }}">В админку</a><br>
<a href="{{ route('account.logout') }}">Выход</a><br>

