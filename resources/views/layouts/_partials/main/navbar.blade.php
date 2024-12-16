<div id="kt_app_header" class="app-header py-15" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
  <div class="app-container container-fluid d-flex align-items-center justify-content-between" id="kt_app_header_container">
    <div class="d-flex align-items-center">
      <!--begin::Aside toggle-->
      <button class="btn btn-icon btn-color-gray-800 btn-active-color-primary justify-content-start w-30px w-lg-40px me-lg-5 d-lg-none" id="kt_app_header_menu_toggle">
        <i class="ki-duotone ki-text-align-left fs-1 fs-lg-2x fw-bold">
          <span class="path1"></span>
          <span class="path2"></span>
          <span class="path3"></span>
          <span class="path4"></span>
        </i>
      </button>
      <!--end::Aside toggle-->
      <a href="{{ route('home') }}">
        <img alt="Logo" src="{{ asset('icon/tracer.png') }}" class="h-25px d-lg-none" />
      </a>
    </div>
    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1 px-lg-20 mx-lg-20" id="kt_app_header_wrapper">
      <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
        <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
          <a href="{{ route('home') }}" class="menu-item @if($title == 'Home') here show menu-here-bg  @endif me-0 me-lg-2">
            <span class="menu-link">
              <span class="menu-title">Home</span>
              <span class="menu-arrow d-lg-none"></span>
            </span>
          </a>
          <a href="{{ route('survey') }}" class="menu-item @if($title == 'Survey') here show menu-here-bg  @endif me-0 me-lg-2">
            <span class="menu-link">
              <span class="menu-title">Survey</span>
              <span class="menu-arrow d-lg-none"></span>
            </span>
          </a>
          <a href="{{ route('news') }}" class="menu-item @if($title == 'News') here show menu-here-bg  @endif me-0 me-lg-2">
            <span class="menu-link">
              <span class="menu-title">News</span>
              <span class="menu-arrow d-lg-none"></span>
            </span>
          </a>
          <a href="{{ route('report') }}" class="menu-item @if($title == 'Report') here show menu-here-bg  @endif me-0 me-lg-2">
            <span class="menu-link">
              <span class="menu-title">Report</span>
              <span class="menu-arrow d-lg-none"></span>
            </span>
          </a>
        </div>
      </div>
      <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
        <a href="{{ route('home') }}">
          <img alt="Logo" src="{{ asset('icon/tracer.png') }}" class="h-40px d-none d-lg-inline app-header-logo-default theme-light-show" />
          <img alt="Logo" src="{{ asset('icon/tracer.png') }}" class="h-40px d-none d-lg-inline app-header-logo-default theme-dark-show" />
        </a>
      </div>
      <div class="app-navbar flex-shrink-0">
          <div class="d-flex align-items-center align-items-stretch">
            <div id="kt_header_search" class="header-search d-flex align-items-center w-lg-200px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
              <div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
                <div class="d-flex">
                  <i class="ki-duotone ki-magnifier fs-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                  </i>
                </div>
              </div>
              <form data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                <input type="hidden" />
                <i class="ki-duotone ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </i>
                <input type="text" class="search-input form-control form-control ps-13" name="search" value="" placeholder="Search..." data-kt-search-element="input" />
                <span class="search-reset btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
                  <i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0">
                    <span class="path1"></span>
                    <span class="path2"></span>
                  </i>
                </span>
              </form>
              <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown pt-5 px-7 d-lg-none">
              </div>
            </div>
          </div>
        <div class="app-navbar-item ms-2 ms-lg-5">
          <div class="btn btn-icon bg-gray-200 btn-icon-gray-700 btn-active-light btn-active-color-primary w-35px h-35px w-lg-40px h-lg-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="45px, -40px">
            <span class="menu-title position-relative ps-6">
              <span class="ms-5 position-absolute  translate-middle-y top-50 end-0">
                <i class="ki-duotone ki-night-day theme-light-show fs-2">
                  <span class="path1"></span>
                  <span class="path2"></span>
                  <span class="path3"></span>
                  <span class="path4"></span>
                  <span class="path5"></span>
                  <span class="path6"></span>
                  <span class="path7"></span>
                  <span class="path8"></span>
                  <span class="path9"></span>
                  <span class="path10"></span>
                </i>
                <i class="ki-duotone ki-moon theme-dark-show fs-2">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </i>
              </span></span>
          </div>
          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
            <div class="menu-item px-3 my-0">
              <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                <span class="menu-icon" data-kt-element="icon">
                  <i class="ki-duotone ki-night-day fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                    <span class="path6"></span>
                    <span class="path7"></span>
                    <span class="path8"></span>
                    <span class="path9"></span>
                    <span class="path10"></span>
                  </i>
                </span>
                <span class="menu-title">Light</span>
              </a>
            </div>
            <div class="menu-item px-3 my-0">
              <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                <span class="menu-icon" data-kt-element="icon">
                  <i class="ki-duotone ki-moon fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                  </i>
                </span>
                <span class="menu-title">Dark</span>
              </a>
            </div>
            <div class="menu-item px-3 my-0">
              <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                <span class="menu-icon" data-kt-element="icon">
                  <i class="ki-duotone ki-screen fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                  </i>
                </span>
                <span class="menu-title">System</span>
              </a>
            </div>
          </div>
        </div>
        <div class="app-navbar-item ms-2 ms-lg-5">
          @auth
            <div class="cursor-pointer symbol symbol-circle symbol-35px symbol-md-45px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
              <img src="{{ Auth::user()->photo_path ? Storage::url(Auth::user()->photo_path) : 'https://ui-avatars.com/api/?background=DFFFEA&color=04B440&bold=true&name='.Auth::user()->name }}" alt="user" />
            </div>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
              <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                  <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="{{ Auth::user()->photo_path ? Storage::url(Auth::user()->photo_path) : 'https://ui-avatars.com/api/?background=DFFFEA&color=04B440&bold=true&name='.Auth::user()->name }}" />
                  </div>
                  <div class="d-flex flex-column">
                    <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }}</div>
                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                  </div>
                </div>
              </div>
              <div class="separator my-2"></div>
              <div class="menu-item px-5">
                <a href="{{ route('dashboard') }}" class="menu-link px-5">Dashboard</a>
              </div>
              <div class="menu-item px-5">
                <a href="{{ route('admin.profile') }}" class="menu-link px-5">My Profile</a>
              </div>
              <div class="menu-item px-5">
                <a href="{{ route('logout') }}" class="menu-link px-5">Sign Out</a>
              </div>
            </div>
          @else
            <a href="{{ route('login') }}" class="btn btn-primary">
              Login
            </a>
          @endauth
        </div>
      </div>
    </div>
  </div>
</div>