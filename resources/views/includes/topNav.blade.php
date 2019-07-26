<nav class="topNav py-0">
  <ul class="navbar-nav row">
    <li><a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></li>

    <li class="p-2">
        <div class="searchbar">
            <input class="search_input" type="text" name="" placeholder="Search...">
            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
          </div>
    </li>

    <div class="navbar-nav navbar-right">

      @guest
        {{-- <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> --}}
      @else
        {{-- <li class="nav-item dropdown">
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
        </li> --}}
      @endguest

      {{-- <li><a class="nav-link m-2" href="{{ route('adminDashboard') }}">{{ __('Admin') }}</a></li> --}}
      {{-- <li><a class="nav-link m-2" href="{{ route('learner') }}">{{ __('Learner') }}</a></li> --}}
      {{-- <li><a class="nav-link m-2" href="{{ route('commissioner') }}">{{ __('Commissioner') }}</a></li> --}}
      {{-- <li><a href="/cart"><i class="fa fa-shopping-cart"></i><span class="badge badge-pill badge-success">{{($cartCount=Cart::getCart()->count())?$cartCount :''}}</span></a></li> --}}
    </div>
  </ul>


</nav>
