<!doctype html>
<html lang="en">
<!--begin::Head-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@yield('title', '404') | Payroll Blast</title>
	<!--begin::Primary Meta Tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!--end::Primary Meta Tags-->
	<!--begin::Fonts-->
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
		integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
		crossorigin="anonymous"
	/>
	<!--end::Fonts-->
	<!--begin::Third Party Plugin(OverlayScrollbars)-->
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
		integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
		crossorigin="anonymous"
	/>
	<!--end::Third Party Plugin(OverlayScrollbars)-->
	<!--begin::Third Party Plugin(Bootstrap Icons)-->
	<link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
		integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
		crossorigin="anonymous"
	/>
	<!--end::Third Party Plugin(Bootstrap Icons)-->
	<!--begin::Required Plugin(AdminLTE)-->
	<link rel="stylesheet" href="{{ asset('assets/css/adminlte.css') }}" />
	<!--end::Required Plugin(AdminLTE)-->
	@yield('custom-style')
</head>
<!--end::Head-->
<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
	<!--begin::App Wrapper-->
	<div class="app-wrapper">
		<!--begin::Header-->
		<nav class="app-header navbar navbar-expand bg-body">
			<!--begin::Container-->
			<div class="container-fluid">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
							<i class="bi bi-list"></i>
						</a>
					</li>
				</ul>
				<!--begin::End Navbar Links-->
				<ul class="navbar-nav ms-auto">					
					<!--begin::User Menu Dropdown-->
					<li class="nav-item dropdown user-menu">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
							<img
							src="https://avatar.iran.liara.run/public/34"
							class="user-image rounded-circle shadow"
							alt="User Image"
							/>
							<span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
						</a>
						<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
							<!--begin::User Image-->
							<li class="user-header text-bg-primary">
								<img
								src="https://avatar.iran.liara.run/public/34"
								class="rounded-circle shadow"
								alt="User Image"
								/>
								<p>{{ auth()->user()->name }}</p>
								{{-- <p>Admin</p> --}}
							</li>
							<!--end::User Image-->
							<!--begin::Menu Footer-->
							<li class="user-footer">
								<a href="{{ route('logout') }}" class="btn btn-default btn-flat float-end">Sign out</a>
							</li>
							<!--end::Menu Footer-->
						</ul>
					</li>
					<!--end::User Menu Dropdown-->
				</ul>
					<!--end::End Navbar Links-->
				</div>
				<!--end::Container-->
			</nav>
			<!--end::Header-->
			<!--begin::Sidebar-->
			<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
				<!--begin::Sidebar Brand-->
				<div class="sidebar-brand justify-content-start">
					<!--begin::Brand Link-->
					<a href="{{ route('blast.index') }}" class="brand-link">
						<!--begin::Brand Image-->
						<img
							src="{{ asset('assets/img/its-logo.png') }}"
							alt="AdminLTE Logo"
							class="brand-image"
						/>
						<!--end::Brand Image-->
						<!--begin::Brand Text-->
						<span class="brand-text fw-light">Payslip Blast</span>
						<!--end::Brand Text-->
					</a>
					<!--end::Brand Link-->
				</div>
				<!--end::Sidebar Brand-->
				<!--begin::Sidebar Wrapper-->
				<div class="sidebar-wrapper">
					<nav class="mt-2">
						<!--begin::Sidebar Menu-->
						<ul
							class="nav sidebar-menu flex-column"
							data-lte-toggle="treeview"
							role="menu"
							data-accordion="false"
						>
						<li class="nav-item">
							<a href="{{ route('blast.index') }}" class="nav-link {{ Route::is('blast.index') ? 'active' : '' }}">
								<i class="nav-icon bi bi-send-plus"></i>
								<p>Blast Payslip</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('employees.index') }}" class="nav-link {{ Route::is('employees.index') ? 'active' : '' }}">
								<i class="nav-icon bi bi-envelope-at"></i>
								<p>Manage Employees</p>
							</a>
						</li>
						{{-- <li class="nav-item menu-open">
							<a href="#" class="nav-link active">
								<i class="nav-icon bi bi-speedometer"></i>
								<p>
									Dashboard
									<i class="nav-arrow bi bi-chevron-right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="./index.html" class="nav-link active">
										<i class="nav-icon bi bi-circle"></i>
										<p>Dashboard v1</p>
									</a>
								</li>
							</ul>
						</li> --}}
						{{-- <li class="nav-item">
							<a href="./generate/theme.html" class="nav-link">
								<i class="nav-icon bi bi-palette"></i>
								<p>Theme Generate</p>
							</a>
						</li> --}}
					</ul>
					<!--end::Sidebar Menu-->
				</nav>
			</div>
			<!--end::Sidebar Wrapper-->
		</aside>
		<!--end::Sidebar-->
		<!--begin::App Main-->
		<main class="app-main">
			<!--begin::App Content Header-->
			<div class="app-content-header">
				<!--begin::Container-->
				<div class="container-fluid">
					<!--begin::Row-->
					<div class="row">
						<div class="col-sm-6"><h3 class="mb-0">@yield('title', '')</h3></div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-end">
								@yield('breadcrumb')
							</ol>
						</div>
					</div>
					<!--end::Row-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::App Content Header-->
			<!--begin::App Content-->
			<div class="app-content">
				<div class="container-fluid">
					@if (session()->has('success') || session()->has('error'))
						<div class="alert alert-{{ session()->has('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
							{{ session()->get('success') ?? session()->get('error') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif

					@if ($errors->any())
						@foreach ($errors->all() as $error)
							<div class="alert alert-danger alert-dismissable fade show" role="alert">
								{{ $error }}
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						@endforeach
					@endif
				</div>
				@yield('content')
			</div>
			<!--end::App Content-->

			@yield('modal-section')
		</main>
		<!--end::App Main-->
		<!--begin::Footer-->
		<footer class="app-footer">
			<!--begin::Copyright-->
				Copyright &copy; 2025&nbsp;
			<strong>
				Inosantek Total Solusi
			</strong>
			<!--end::Copyright-->
		</footer>
		<!--end::Footer-->
	</div>
	<!--end::App Wrapper-->
	<!--begin::Script-->
	<!--begin::Third Party Plugin(OverlayScrollbars)-->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script
		src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
		integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
		crossorigin="anonymous"
	></script>
	<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
	<script
		src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"
	></script>
	<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
		integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
		crossorigin="anonymous"
	></script>
	<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
	<script src="{{ asset('assets/js/adminlte.js') }}"></script>
	<!--end::Required Plugin(AdminLTE)-->
	<!--begin::OverlayScrollbars Configure-->
	<script>
		const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
		const Default = {
			scrollbarTheme: 'os-theme-light',
			scrollbarAutoHide: 'leave',
			scrollbarClickScroll: true,
		};
		document.addEventListener('DOMContentLoaded', function () {
			const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
			if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
				OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
					scrollbars: {
						theme: Default.scrollbarTheme,
						autoHide: Default.scrollbarAutoHide,
						clickScroll: Default.scrollbarClickScroll,
					},
				});
			}
		});
	</script>
	<!--end::OverlayScrollbars Configure-->
	@yield('custom-script')
</body>
<!--end::Body-->
</html>
