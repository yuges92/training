<nav class="front-nav">

  <button class="navbar-toggler humburger" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="container" id="navbarSupportedContent">
    <ul class="main-navbar row p-0 mx-auto">
      <li class="dropdown">
        <a class="nav-link active" href="{{ route('courses') }}">{{ __('Courses') }}<i class="fa fa-chevron-down"></i></a>
      </li>
      <li class="dropdown">
        <a class="nav-link" href="{{ route('courses') }}">{{ __('Conferences') }}<i class="fa fa-chevron-down"></i></a>

      </li>
      <li><a class="nav-link" href="{{ route('courses') }}">{{ __('Train Your Team') }}<i class="fa fa-chevron-down"></i></a></li>
      <li><a class="nav-link" href="{{ route('courses') }}">{{ __('About') }}<i class="fa fa-chevron-down"></i></a></li>
    </ul>
  </div>

  {{-- <div class="dropdown-mega-menu p-0">
    <ul class=" dropdown-tabs">
      <li><button class=" dropdown-tab active" href="#trusted-assessor-tab-content">Trusted Assessor</button></li>
      <li><button class=" dropdown-tab " href="#moving-handling-tab-content">Moving and Handling</button></li>
    </ul>

    <div class="tab-content" id="">
      <div class="tab-content-items active" id="trusted-assessor-tab-content">
        <ul class="items text-left">
          <li class="item">
            <ul class="item-list">
              <li class="link"><a href="/trusted-advisor-level-1">Trusted Advisor Level 1</a></li>
              <li class="link"><a href="/trusted-assessor-level-2">Trusted Assessor Level 2</a></li>
              <li class="link"><a href="/trusted-assessor-level-3">Trusted Assessor Level 3</a></li>
              <li class="link"><a href="/trusted-assessor-level-4">Trusted Assessor Level 4</a></li>
            </ul>
          </li>
          <li class="item">
            <ul class="item-list">
              <li class="link"><a href="/trusted-assessor-refresher">Trusted Assessor Refresher</a></li>
            </ul>
          </li>


        </ul>
      </div>
      <div class="tab-content-items" id="moving-handling-tab-content">
        <ul class="items text-left">

          <li class="item">
            <ul class="item-list">
              <li class="link"><a href="/manual-handling-refresher/">Moving And Handling Refresher</a></li>
            </ul>
          </li>


        </ul>
      </div>

    </div>
  </div> --}}
</nav>
