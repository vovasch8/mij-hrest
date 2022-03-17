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
            <li><a href="#" class="nav-link px-2 link-dark">About</a></li>
        </ul>

    </header>
</div>
