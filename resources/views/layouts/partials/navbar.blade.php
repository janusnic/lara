<ul class="nav navbar-nav">
  <li><a href="/">Blog Home</a></li>
  @if (Auth::check())
    <li @if (Request::is('adm/posts*')) class="active" @endif>
      <a href="/adm/posts">Posts</a>
    </li>
    <li @if (Request::is('adm/tag*')) class="active" @endif>
      <a href="/adm/tag">Tags</a>
    </li>
    <li @if (Request::is('adm/upload*')) class="active" @endif>
      <a href="/adm/upload">Uploads</a>
    </li>
  @endif
</ul>

<ul class="nav navbar-nav navbar-right">
  @if (Auth::guest())
    <li><a href="/auth/login">Login</a></li>
  @else
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
         aria-expanded="false">{{ Auth::user()->name }}
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="/auth/logout">Logout</a></li>
      </ul>
    </li>
  @endif
</ul>