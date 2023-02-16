<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="site-logo" src="https://mij-hrest.com/storage/app/public/images/hrest.png" alt="logo">
            <h5 class="title-logo">Мій Хрест</h5>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{route('main')}}" class="nav-link px-2 link-dark">Головна</a></li>
            <li><a href="{{route('articles')}}" class="nav-link px-2 link-dark">Статті</a></li>
            <li><a href="{{route('albums')}}" class="nav-link px-2 link-dark">Альбоми</a></li>
            <li><a href="{{route('sviata-gora')}}" class="nav-link px-2 link-dark">Свята гора</a></li>
            <li><a href="{{route('forum')}}" class="nav-link px-2 link-dark">Форум</a></li>
            @if (Route::has('login'))
                    @auth
                    <div class="dropdown">
                        <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('profile')}}">Профіль</a></li>
                            @if(Auth::user()->role == 'admin')
                                <li><a class="dropdown-item" href="{{route('admin-home')}}">Адмін панель</a></li>
                            @endif
                            <li><hr class="dropdown-divider">
                            <li style="cursor: pointer">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Вийти</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                        <li><a href="{{ route('login') }}" class="nav-link px-2 link-dark">Вхід</a></li>
                        @if (Route::has('register'))@endif
                    @endauth
            @endif
        </ul>

    </header>
</div>
