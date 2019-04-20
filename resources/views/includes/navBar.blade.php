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
          <a class="" href="{{ route('learner') }}"></i> <span>Learner</span> </a>
          <a class="" href="{{ route('commissioner') }}"></i> <span>Commissioner</span> </a>
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
          <li class="tabLink"><a data-target-tab="tab1" class=" dropdown-tab active" href=""><span>Trusted Assessor</span> <i class="fas fa-chevron-right"></i></a></li>
          <li class="tabLink"><a data-target-tab="tab2" class=" dropdown-tab" href=""><span>Trusted Assessor</span> <i class="fas fa-chevron-right"></i></a></li>
        </ul>
      </div>
      <div class="tab-content" id="">
        <div class="tab-content-items" id="tab1" >
          <ul class="item-list">
            <li class="link"><a href="/trusted-advisor-level-1"><span>Trusted Advisor Level 1</span></a></li>
            <li class="link"><a href="/trusted-assessor-level-2"><span>Trusted Assessor Level 2</span></a></li>
            <li class="link"><a href="/trusted-assessor-level-3"><span>Trusted Assessor Level 3</span></a></li>
            <li class="link"><a href="/trusted-assessor-level-4"><span>Trusted Assessor Level 4</span></a></li>
            <li class="link"><a href="/trusted-assessor-level-4"><span>Trusted Assessor Level 5</span></a></li>
          </ul>
        </div>

        <div class="tab-content-items" id="tab2">
          <ul class="items text-left">

            <li class="item">
              <ul class="item-list">
                <li class="link"><a href="/manual-handling-refresher/"><span>Moving And Handling Refresher</span></a></li>
              </ul>
            </li>

          </ul>
        </div>

      </div>
    </div>
    <div class="all-course-link">
      <a href="/courses"><i class="fas fa-graduation-cap"></i> <span>All Courses</span></a>
    </div>
  </div>
</div>