<nav class="front-nav">
  <button class="navbar-toggler humburger" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container p-0" id="navbarSupportedContent">
    <ul id="navBar" class="main-navbar row p-0 mx-auto">
      <li class="nav-item dropdown megaMenuBtn">
        <a class="nav-link " id="megaMenuBtn" role="button" href="#"><span>{{ __('Courses') }}</span> <i class="fa fa-chevron-down"></i></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('courses') }}"><span>{{ __('Conferences') }}</span> <i class="fa fa-chevron-down"></i></a>
      </li>
      <li class="nav-item"><a class="nav-link" href="{{ route('courses') }}"><span>{{ __('Train Your Team') }}</span> <i class="fa fa-chevron-down"></i></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('courses') }}"><span>{{ __('About') }}</span> <i class="fa fa-chevron-down"></i></a></li>
      <li class="nav-item ml-auto"><a class="nav-link" href="/cart"><span><i class="fas fa-shopping-cart"></i></span> <span class="badge badge-pill badge-success">{{($cartCount=Cart::getCart()->count())?$cartCount :''}}</span></a></li>
      @guest
      <li class="nav-item "><a class="nav-link" href="{{ route('login') }}"><span>{{ __('Login') }}</span> <i class="fas fa-sign-in-alt"></i></a></li>
      @else

      <li class="nav-item dropdown-user">
        <a class="nav-link dropdown-toggle-btn" href="#" role="button"><span> <i class="fas fa-user-circle"></i></span> </a>
        <div class="dropdown-content" aria-labelledby="navbarDropdown">
          <a class="" href="{{ route('courses') }}"></i> <span>{{ Auth::user()->getFullname() }}</span> </a>
          <a class="" href="{{ route('adminDashboard') }}"></i> <span>Admin</span> </a>
          <a class="" href="{{ route('learner') }}"></i> <span>View as learner</span> </a>
          <a class="" href="{{ route('commissioner') }}"></i> <span>View as commissioner</span> </a>
          <a class="" href="/logout"><span>{{ __('Logout') }}</span> <i class="fas fa-sign-out-alt"></i></a>
        </div>
      </li>

      @endguest

    </ul>

  </div>
</nav>

{{--courses megamenu content --}}
<div class="container p-0 mega-menu">
  <div class="mega-menu-items">
    <div class="dropdown-mega-menu">
      <div class="tabs-container">
        <ul class=" dropdown-tabs">
          @php
              $courseTypes=App\CourseType::getNavMenu();
          @endphp
          @if ($courseTypes)
          @foreach ($courseTypes as $courseType)
          @if ($courseType)
              
          <li class="tabLink"><a data-target-tab="tab{{$courseType->id}}" class=" dropdown-tab" href="{{route('courseType',$courseType->slug)}}"><span>{{$courseType->title}}</span> <i class="fas fa-chevron-right"></i></a></li>
          @endif
          @endforeach
          @endif
        </ul>
      </div>
      <div class="tab-content" id="">
        @if ($courseTypes )
        @foreach ($courseTypes as $courseType)
        <div class="tab-content-items" id="tab{{$courseType->id}}" >
          @if ($courses=$courseType->courses)
              
          <ul class="item-list">
            @foreach ($courses as $course)
            <li class="link"><a href="{{route('course', [$courseType->slug,$course->slug])}}"><span>{{$course->title}}</span></a></li>
            @endforeach
          </ul>
          @endif
        </div>
        @endforeach
        @endif
      </div>
    </div>
    <div class="all-course-link">
      <a href="/courses"><i class="fas fa-graduation-cap"></i> <span>All Courses</span></a>
    </div>
  </div>
</div>