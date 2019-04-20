<nav class="front-nav">

  <button class="navbar-toggler humburger" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container" id="navbarSupportedContent">
    <ul class="main-navbar row p-0 mx-auto">
      <li class="nav-item dropdown">
        <a class="nav-link active" href="{{ route('courses') }}"><span>{{ __('Courses') }}</span> <i class="fa fa-chevron-down"></i></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{ route('courses') }}"><span>{{ __('Conferences') }}</span> <i class="fa fa-chevron-down"></i></a>
      </li>
      <li class="nav-item"><a class="nav-link" href="{{ route('courses') }}"><span>{{ __('Train Your Team') }}</span> <i class="fa fa-chevron-down"></i></a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('courses') }}"><span>{{ __('About') }}</span> <i class="fa fa-chevron-down"></i></a></li>
    </ul>
  </div>
  
</nav>
<div class="container p-0">
  <div class="dropdown-mega-menu">
    <div>

      <ul class=" dropdown-tabs">
        <li><a data-target="" class=" dropdown-tab active" href=""><span>Trusted Assessor</span> <i class="fas fa-chevron-right"></i></a></li>
        <li><a data-target="" class=" dropdown-tab active" href=""><span>Trusted Assessor</span> <i class="fas fa-chevron-right"></i></a></li>
      </ul>

    </div>
    <div class="tab-content" id="">
      <div class="tab-content-items active" id="trusted-assessor-tab-content">
            <ul class="item-list">
              <li class="link"><a href="/trusted-advisor-level-1"><span>Trusted Advisor Level 1</span></a></li>
              <li class="link"><a href="/trusted-assessor-level-2"><span>Trusted Assessor Level 2</span></a></li>
              <li class="link"><a href="/trusted-assessor-level-3"><span>Trusted Assessor Level 3</span></a></li>
              <li class="link"><a href="/trusted-assessor-level-4"><span>Trusted Assessor Level 4</span></a></li>
              <li class="link"><a href="/trusted-assessor-level-4"><span>Trusted Assessor Level 5</span></a></li>
            </ul>
      </div>

      <div class="tab-content-items" id="moving-handling-tab-content">
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
      <a href="/courses">All Courses</a>
    </div>
</div>
