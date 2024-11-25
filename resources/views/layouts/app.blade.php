
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{ $title }}</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="{{ asset('assets/img/logo-sekolah.png') }}" />
    @include('layouts._partials.head')
	</head>

	
	<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				
				@include('layouts._partials.topbar')
				
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					
					@include('layouts._partials.sidebar')
					
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<div class="d-flex flex-column flex-column-fluid">
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<div id="kt_app_content_container" class="app-container container-xxl">
									
									@yield('content')

								</div>
							</div>
						</div>

						@include('layouts._partials.footer')

						
					</div>
				</div>
			</div>
		</div>

		
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-outline ki-arrow-up"></i>
		</div>
		
    @include('layouts._partials.alert')
    @include('layouts._partials.foot')
    
    <!--begin::Vendors Javascript(used for this page only)-->
    @yield('script')
		
	</body>
	<!--end::Body-->
</html>