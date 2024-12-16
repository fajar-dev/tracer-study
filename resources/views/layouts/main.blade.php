
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Tracer Study | {{ $title }} @if($subTitle) - {{ $subTitle }} @endif</title>
		<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="{{ asset('icon/pavicon.png') }}" />
		@yield('seo')
    @include('layouts._partials.main.head')

	</head>
	<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="false" class="app-default">
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">

				@include('layouts._partials.main.navbar')
				
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<div class="d-flex flex-column flex-column-fluid">

   						 @yield('content')

						</div>

						@include('layouts._partials.main.footer')

					</div>
				</div>
			</div>
		</div>

    @include('layouts._partials.alert')
    @include('layouts._partials.main.foot')
    <!--begin::Vendors Javascript(used for this page only)-->
    @yield('script')
	</body>
</html>