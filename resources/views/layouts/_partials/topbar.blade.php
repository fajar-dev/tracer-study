<div id="kt_app_header" class="app-header">
  <div class="app-container container-fluid d-flex align-items-stretch flex-stack" id="kt_app_header_container">
    <div class="d-flex align-items-center d-block d-lg-none ms-n3" title="Show sidebar menu">
      <div class="btn btn-icon btn-active-color-primary w-35px h-35px me-2" id="kt_app_sidebar_mobile_toggle">
        <i class="ki-outline ki-abstract-14 fs-2"></i>
      </div>
      <a href="index.html">
        <img alt="Logo" src="{{ asset('assets/img/logo-sekolah.png') }}" class="h-30px" />
      </a>
    </div>
    <div class="app-navbar d-flex justify-content-between container" id="kt_app_header_navbar">
      <div class="app-navbar-item flex-lg-grow-1">
        <div class=" align-items-center w-lg-500px pt-2" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="true" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
          <h1 class="text-gray-700 fw-bolder">{{ $title }}</h1>
          <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 mb-2">
            <li class="breadcrumb-item text-gray-600 fw-bold lh-1">
              <a href="index.html" class="text-gray-700 text-hover-primary me-1">
                <i class="ki-outline ki-home text-gray-700 fs-6"></i>
              </a>
            </li>
            <li class="breadcrumb-item">
              <i class="ki-outline ki-right fs-7 text-gray-700 mx-n1"></i>
            </li>
            <li class="breadcrumb-item text-gray-600 fw-bold lh-1">{{ $title ?? '-' }}</li>
            @if ($subTitle)
              <li class="breadcrumb-item">
                <i class="ki-outline ki-right fs-7 text-gray-700 mx-n1"></i>
              </li>
              <li class="breadcrumb-item text-gray-500">{{ $subTitle }}</li>
            @endif
          </ul>
        </div>
      </div>
      <div class="d-flex">
        <div class="app-navbar-item ms-1 ms-md-3">
          <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <i class="ki-outline ki-notification-on fs-1"></i>
          </div>
          <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
            <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url({{ asset('assets/img/billboard-bg.png') }})">
              <h3 class="text-dark fw-bold px-9 my-8">Notifications</h3>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="kt_topbar_notifications_2" role="tabpanel">
                <div class="d-flex flex-column px-9">
                  <div class="py-5 text-center">
                    ~ No data available ~
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="app-navbar-item ms-1 ms-md-3">
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="90px, -40px" class="btn btn-icon btn-custom btn-color-gray-600 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
              <span>
                <i class="ki-outline ki-night-day theme-light-show fs-1"></i>
                <i class="ki-outline ki-moon theme-dark-show fs-1"></i>
              </span>
            </div>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
              <div class="menu-item px-3 my-0">
                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                  <span class="menu-icon" data-kt-element="icon">
                    <i class="ki-outline ki-night-day fs-2"></i>
                  </span>
                  <span class="menu-title">Light</span>
                </a>
              </div>
              <div class="menu-item px-3 my-0">
                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                  <span class="menu-icon" data-kt-element="icon">
                    <i class="ki-outline ki-moon fs-2"></i>
                  </span>
                  <span class="menu-title">Dark</span>
                </a>
              </div>
              <div class="menu-item px-3 my-0">
                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                  <span class="menu-icon" data-kt-element="icon">
                    <i class="ki-outline ki-screen fs-2"></i>
                  </span>
                  <span class="menu-title">System</span>
                </a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <!--end::Header container-->
</div>