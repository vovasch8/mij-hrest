<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="site-logo" src="{{asset('storage') . '/images/hrest.png'}}" alt="logo">
            <h5 class="title-logo">Мій Хрест</h5>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{route('home')}}" class="nav-link px-2 link-dark">Головна</a></li>
            <li><a href="{{route('calendar')}}" class="nav-link px-2 link-dark">Календар</a></li>
            <li><a href="{{route('forum')}}" class="nav-link px-2 link-dark">Форум</a></li>
            <li><a href="{{route('dictionary')}}" class="nav-link px-2 link-dark">Словник</a></li>
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
{{--                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>--}}
                    @else
                        <li><a href="{{ route('login') }}" class="nav-link px-2 link-dark">Вхід</a></li>
                        @if (Route::has('register'))
{{--                            <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>--}}
                        @endif
                    @endauth
            @endif
        </ul>

    </header>
</div>
