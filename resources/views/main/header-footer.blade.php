<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Poultry Farm Management</title>
	@include('library.head');
	@yield('css')
</head>
<body>
    <!-- wrapper -->
	<div class="wrapper">
		<!--sidebar-wrapper-->
            @include("library.sidebar-menue")
		<!--end sidebar-wrapper-->
		<!--header-->
		<header class="top-header">
            @include("library.header")
		</header>
		<!--end header-->
		<!--page-wrapper-->
		<div class="page-wrapper">
			<!--page-content-wrapper-->
                @yield('main_content')

			<!--end page-content-wrapper-->
		</div>
		<!--end page-wrapper-->
		<!--start overlay-->
		<div class="overlay toggle-btn-mobile"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<!--footer -->
		@include('library.footer')
		<!-- end footer -->
	</div>
    	<!-- end wrapper -->
	<!--start switcher-->
    @include("library.switch-color")
	<!--end switcher-->
	@include('library.foot')
	@yield('js')

</body>
</html>
