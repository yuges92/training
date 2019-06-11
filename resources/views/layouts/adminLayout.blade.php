@extends('layouts.templateLayout')
@push('css')
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
  
@endpush


@section('body')
  <header class="p-0">
    <div class="nav-bar-top row mx-auto py-0 px-2">
      <button id="btn-menu" class="btn-toggle" type="button" >
        <i class="m-auto material-icons">menu</i>
      </button>
      <a class="btn-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </a>
      <div class="navbar-nav navbar-right ">
        <ul class="navbar-nav">

          @if (Auth::user())
            <li class="nav-item dropdown custom-dropdown">
              <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fas fa-user-circle "></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class=" user-card">
                  <div class="">
                    <a class="dropdown-item" href="">{{ Auth::user()->getFullname() }}</a>
                  </div>
                  <div class="">
                    <a class="dropdown-item" href="{{ route('customLogout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                  </div>
                  <form id="logout-form" action="{{ route('customLogout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>

                </div>

              </div>
            </li>
          @else

            <li class="nav-item">
              <a id="navbarDropdown" class="nav-link " href="/login">
                <i class="fas fa-sign-in-alt"></i>
              </a>
            </li>

          @endif
        </ul>
      </div>

    </div>

  </header>
  <main class="adminMain">
    {{-- @include('includes.adminSideNavBar') --}}
    <div class="mainContents mt-3">
      @include('includes.messages')

      @yield('content')
    </div>
  </main>

@endsection

@prepend ('js')
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}

@endprepend
