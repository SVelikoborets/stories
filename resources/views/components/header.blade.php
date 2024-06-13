<div class="container-fluid">
    @guest
        <a href="{{ route('main') }}" class="nav-item nav-link blue-link">Главная</a>
        <button type="button" class="btn btn-light">
            <a href="{{ route('create') }} " class="nav-item nav-link ">Добавить историю</a>
        </button>
        <button type="button" class="btn btn-danger">
            <a href="{{ route('login') }}"  class="nav-item nav-link ">Администратор</a>
        </button>
    @endguest
    @auth
        <button type="button" class="btn btn-light">
            <a href="{{ route('new_admin') }}" class="nav-item nav-link blue-link">Добавить администратора</a>
        </button>
        <a href="{{ route('admin') }}" class="nav-item nav-link blue-link">Администратор {{ Auth::user()->name }}</a>
        <form action="{{ route('logout') }}" method="POST" class="form-inline">
            @csrf
            <input type="submit" class="btn btn-danger" value="Выход">
        </form>
    @endauth
</div>
