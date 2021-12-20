<nav class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
  <a href="{{route('index.page')}}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
    <span class="fs-4">Jakiś nagłówek</span>
  </a>

  <ul class="nav nav-pills">
    <li class="nav-item"><a href="{{route('index.page')}}" class="nav-link active" aria-current="page">Home</a></li>
    @auth<li class="nav-item"><a href="{{route('post.create')}}" class="nav-link">Dodaj wpis</a></li>@endauth
    @auth<li class="nav-item"><a href="{{route('user.page')}}" class="nav-link"> {{auth()->user()->name}}  </a></li>@endauth
    @auth<li class="nav-item"><a href="{{route('index.logout')}}" class="nav-link"> Do widzenia! </a></li>@endauth
    @guest<li class="nav-item"><a href="{{route('login.page')}}" class="nav-link"> Zaloguj się! </a></li>@endguest
    @guest<li class="nav-item"><a href="{{route('register.page')}}" class="nav-link"> Zarejestruj się! </a></li>@endguest
  </ul>
</nav>
@auth
@endauth
@guest

@endguest


