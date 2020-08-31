<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <a class="navbar-brand" href="{{ route('principal') }}">CoolBlogger</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown border-right border-left">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @forelse(\App\Category::orderBy('category')->get() as $category)
            <a class="dropdown-item" href="{{ route('categories.posts.show', ['category' => $category->slug]) }}">{{ $category->category }}</a>
          @empty
            <span class="dropdown-item">No categories available</span>
          @endforelse
        </div>
      </li>
    <!-- Check if user is authenticated if is not, then print the options to register or login -->
    @if(!auth()->check())
      <li class="nav-item border-right">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Register</a>
      </li>
    @else
      <li class="nav-item border-right">
        <a class="nav-link" href="{{ route('users.index', ['user' => auth()->user()->alias ]) }}">{{ '@'.auth()->user()->alias }}</a>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <input type="submit" class="nav-link border-0 bg-transparent text-primary" value="Logout">
        </form>
      </li>
    @endif
    </ul>
    <form class="form-inline my-2 my-lg-0" method="get" action="{{ route('search') }}">
      <input class="form-control mr-sm-2" type="search" name="string" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>