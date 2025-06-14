<!doctype html>
<html lang="en">
<!--begin::Head-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Payslip Blast | Inosantek Total Solusi</title>
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
</head>
<!--end::Head-->
<!--begin::Body-->
<body class="login-page bg-body-secondary">
	<div class="login-box">
		<div class="card card-primary">
			<div class="card-header">
				<a
				href="{{ route('blast.index') }}"
				class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover"
				>
				<h3 class="mb-0"><b>PT Inosantek Total Solusi</h3>
				</a>
			</div>
			<div class="card-body login-card-body">
				<p class="login-box-msg">Masuk untuk melanjutkan</p>
				@if (session()->has('error'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						{{ session()->get('error') }}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif
				<form action="{{ route('authenticate') }}" method="post">
					@csrf
					<div class="input-group mb-1">
						<div class="form-floating">
							<input id="username" type="text" name="username" class="form-control" value="" placeholder="" autofocus/>
							<label for="username">Username</label>
						</div>
						<div class="input-group-text"><span class="bi bi-envelope"></span></div>
					</div>
					<div class="input-group mb-1">
						<div class="form-floating">
							<input id="password" type="password" name="password" class="form-control" placeholder="" />
							<label for="password">Password</label>
						</div>
						<div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
					</div>
					<!--begin::Row-->
					<div class="row">
						<!-- /.col -->
						<div class="d-flex justify-content-end">
							<button type="submit" class="btn btn-primary d-flex gap-2">
								<i class="bi bi-box-arrow-in-right"></i>
								Masuk
							</button>
						</div>
						<!-- /.col -->
					</div>
					<!--end::Row-->
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
	<!--begin::Third Party Plugin(OverlayScrollbars)-->
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
	<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
	<!--end::Script-->
</body>
<!--end::Body-->
</html>
