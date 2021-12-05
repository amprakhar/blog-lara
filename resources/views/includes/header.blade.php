<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/">Blog</a> 
    @if(Session::get('user')) Welcome, {{Session::get('user.name')}} ! @endif
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @if(Session::get('user'))
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/mypost">My Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/add">Add Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/logout">Logout</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>