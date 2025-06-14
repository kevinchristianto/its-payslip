<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
	<title>@yield('title', '404') | Inosantek Total Solusi</title>
	<!-- [Meta] -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<!-- [Favicon] icon -->
	<link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />
	<!-- [Google Font] Family -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" id="main-font-link" />
	<!-- [phosphor Icons] https://phosphoricons.com/ -->
	<link rel="stylesheet" href="{{ asset('../assets/fonts/phosphor/duotone/style.css') }}" />
	<!-- [Tabler Icons] https://tablericons.com -->
	<link rel="stylesheet" href="{{ asset('../assets/fonts/tabler-icons.min.css') }}" />
	<!-- [Feather Icons] https://feathericons.com -->
	<link rel="stylesheet" href="{{ asset('../assets/fonts/feather.css') }}" />
	<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
	<link rel="stylesheet" href="{{ asset('../assets/fonts/fontawesome.css') }}" />
	<!-- [Material Icons] https://fonts.google.com/icons -->
	<link rel="stylesheet" href="{{ asset('../assets/fonts/material.css') }}" />
	<!-- [Template CSS Files] -->
	<link rel="stylesheet" href="{{ asset('../assets/css/style.css') }}" id="main-style-link" />
	<link rel="stylesheet" href="{{ asset('../assets/css/style-preset.css') }}" />
	@yield('custom-style')
	
</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ Sidebar Menu ] start -->
	<nav class="pc-sidebar">
		<div class="navbar-wrapper">
			<div class="m-header justify-content-center">
				<a href="{{ url('/') }}" class="b-brand text-primary">
					<!-- ========   Change your logo from here   ============ -->
					<img src="{{ asset('assets/images/its-logo.png') }}" alt="" class="img-fluid" style="height: 50px" />
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					{{-- <li class="pc-item pc-caption">
						<label>Menu</label>
						<i class="ti ti-dashboard"></i>
					</li> --}}
					<li class="pc-item">
						<a href="{{ route('blast.index') }}" class="pc-link">
							<span class="pc-micon">
								<i class="ti ti-send"></i>
							</span>
							<span class="pc-mtext">Kirim Slip Gaji</span>
						</a>
					</li>
					<li class="pc-item">
						<a href="{{ route('employees.index') }}" class="pc-link">
							<span class="pc-micon">
								<i class="ti ti-users"></i>
							</span>
							<span class="pc-mtext">Kelola Data Pegawai</span>
						</a>
					</li>
					
				</ul>
				<div class="w-100 text-center">
					<div class="badge theme-version badge rounded-pill bg-light text-dark f-12"></div>
				</div>
			</div>
		</div>
	</nav>
	<!-- [ Sidebar Menu ] end -->
	<!-- [ Header Topbar ] start -->
	<header class="pc-header">
		<div class="header-wrapper"><!-- [Mobile Media Block] start -->
			<div class="me-auto pc-mob-drp">
				<ul class="list-unstyled">
					<li class="pc-h-item header-mobile-collapse">
						<a href="#" class="pc-head-link head-link-secondary ms-0" id="sidebar-hide">
							<i class="ti ti-menu-2"></i>
						</a>
					</li>
					<li class="pc-h-item pc-sidebar-popup">
						<a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
							<i class="ti ti-menu-2"></i>
						</a>
					</li>
					<li class="dropdown pc-h-item d-inline-flex d-md-none">
						<a
						class="pc-head-link head-link-secondary dropdown-toggle arrow-none m-0"
						data-bs-toggle="dropdown"
						href="#"
						role="button"
						aria-haspopup="false"
						aria-expanded="false"
						>
						<i class="ti ti-search"></i>
					</a>
					<div class="dropdown-menu pc-h-dropdown drp-search">
						<form class="px-3">
							<div class="mb-0 d-flex align-items-center">
								<i data-feather="search"></i>
								<input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . ." />
							</div>
						</form>
					</div>
				</li>
			</ul>
		</div>
		<!-- [Mobile Media Block end] -->
		<div class="ms-auto">
			<ul class="list-unstyled">
				<li class="dropdown pc-h-item header-user-profile">
					<a
					class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0"
					data-bs-toggle="dropdown"
					href="#"
					role="button"
					aria-haspopup="false"
					aria-expanded="false"
					>
					<img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
					<span>
						<i class="ti ti-settings"></i>
					</span>
				</a>
				<div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
					<div class="dropdown-header">
						<h4>
							Halo,
							John Doe!
						</h4>
						{{-- <p class="text-muted">Admin</p> --}}
						<hr />
						<div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 280px)">
							<a href="{{ route('logout') }}" class="dropdown-item">
								<i class="ti ti-logout"></i>
								<span>Logout</span>
							</a>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
</header>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pc-container">
	<div class="pc-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col">
						<div class="page-header-title">
							<h5 class="m-b-10">@yield('title', '404')</h5>
						</div>
					</div>
					<div class="col-auto">
						<ul class="breadcrumb">
							@yield('breadcrumb')
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		
		
		<!-- [ Main Content ] start -->
		{{-- <div class="row"> --}}
			@if (session()->has('success') || session()->has('error'))
			<div class="alert alert-{{ session()->has('success') ? 'success' : 'danger' }} alert-dismissible fade show mt-3" role="alert">
				{{ session()->get('success') ?? session()->get('error') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@endif
			
			@if ($errors->any())
			@foreach ($errors->all() as $error)
			<div class="alert alert-danger alert-dismissable fade show mt-3" role="alert">
				{{ $error }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@endforeach
			@endif
			{{-- </div> --}}
			
			@yield('content')
			<!-- [ Main Content ] end -->
		</div>
	</div>
	<!-- [ Main Content ] end -->
	<footer class="pc-footer">
		<div class="footer-wrapper container-fluid">
			<div class="row">
				<div class="col-sm-6 my-1">
					<p class="m-0">
						Copyright&copy; 2025 Inosantek Total Solusi
					</p>
				</div>
			</div>
		</div>
	</footer>
	
	@yield('modal-section')
	<!-- Required Js -->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/js/icon/custom-font.js') }}"></script> --}}
	<script src="{{ asset('assets/js/script.js') }}"></script>
	<script src="{{ asset('assets/js/theme.js') }}"></script>
	<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
	@yield('custom-script')
	
	
	<script>
		layout_change('light');
	</script>
	
	<script>
		font_change('Roboto');
	</script>
	
	<script>
		change_box_container('false');
	</script>
	
	<script>
		layout_caption_change('true');
	</script>
	
	<script>
		layout_rtl_change('false');
	</script>
	
	<script>
		preset_change('preset-1');
	</script>
	
	
</body>
<!-- [Body] end -->
</html>
