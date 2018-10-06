<nav class="topNav py-0">
  <ul class="navbar-nav row">
    <li><a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></li>
    <li>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </li>
    <div class="navbar-nav navbar-right">

      @guest
          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->getFullname() }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('customLogout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('customLogout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest

      <li><a class="nav-link" href="{{ route('adminDashboard') }}">{{ __('Admin') }}</a></li>

      <li><a href="/cart"><i class="fa fa-shopping-cart"></i><span class="badge badge-pill badge-success">{{(Cart::content()->groupBy('id')->count())?Cart::content()->groupBy('id')->count() :''}}</span></a></li>
    </div>
  </ul>


</nav>
