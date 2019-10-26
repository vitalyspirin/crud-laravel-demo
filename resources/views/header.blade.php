
<nav class="navbar col-12 navbar-expand-lg navbar-dark bg-dark">
  <img src="{{'/images/Logo.png'}}" alt="" />

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

      <li class="nav-item {{ Request::segment(1) == '' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
      </li>

      <li class="nav-item {{ Request::segment(1) == 'users' ? 'active' : '' }}">
        <a class="nav-link" href="{{ asset(route('users.index')) }}">Users</a>
      </li>

      <li class="nav-item {{ Request::segment(1) == 'users' &&  Request::segment(2) == optional(Auth::user())->user_id ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.edit', optional(Auth::user())->user_id ?? 1) }}">My Profile</a>
      </li>

      <li class="nav-item {{ Request::segment(1) == 'system' ? 'active' : '' }}">
        <a class="nav-link" href="{{ asset(route('system')) }}">System</a>
      </li>
    </ul>
  </div>
  <a id="logout" class="nav-link" href="{{ route('logout') }}">Logout {{optional(Auth::user())->user_firstname}}</a>
</nav>
