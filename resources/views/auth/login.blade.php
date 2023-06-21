<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>รายชื่อลูกค้าผู้เข้าร่วมงาน Dealer New Car ไตรมาส 2 ปี 2566 </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{ url('img/favicon.ico') }}" />
		
		<!--begin::Fonts(mandatory for all pages)-->
		<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ url('/admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ url('/admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/css/style.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank">
		<!--begin::Theme mode setup on page load-->
	
		<div class="d-flex flex-column flex-root" id="kt_app_root">
		
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
					<!--begin::Form-->
					<div class="d-flex flex-center flex-column flex-lg-row-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10">
							<!--begin::Form-->
                            <form class="form w-100" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">เข้าสู่ระบบผู้ใช้งาน</h1>
									<!--end::Title-->
									<!--begin::Subtitle-->
                                    <div class="text-gray-500 fw-semibold fs-6">กรุณากรอกอีเมลและรหัสผ่าน</div>
									<!--end::Subtitle=-->
								</div>
								
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::Email-->
									<input type="text" placeholder="อีเมล" name="email" value="{{ old('email') }}" required autocomplete="off" class="form-control bg-transparent" />
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
									<!--end::Email-->
								</div>
								<!--end::Input group=-->
								<div class="fv-row mb-3">
									<!--begin::Password-->
									<input type="password" placeholder="รหัสผ่าน" name="password" required autocomplete="off" class="form-control bg-transparent" />
									<!--end::Password-->
								</div>
								<!--end::Input group=-->
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
									<div></div>
									<!--begin::Link-->
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" class="btn btn-primary">
										<span class="indicator-label">เข้าสู่ระบบ</span>
									</button>
								</div>
								<!--end::Submit button-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Form-->
					<!--begin::Footer-->
					<div class="d-flex flex-center flex-wrap px-5">
						<!--begin::Links-->
						<div class="d-flex fw-semibold text-primary fs-base">
							
						</div>
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Body-->
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url({{ url('/img/auth-bg2.jpg') }})">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
						<!--begin::Logo-->
						<a  class="mb-0 mb-lg-12">
							<img alt="Logo" src="{{ url('/img/SCB.BK_BIG.D-a1b1065b.png') }}" class="h-60px h-lg-75px" />
						</a>
						<!--end::Logo-->
						<!--begin::Image-->
						<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="assets/media/misc/auth-screens.png" alt="" />
						<!--end::Image-->
						<!--begin::Title-->
						<h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Dealer New Car ไตรมาส 2 ปี 2566</h1>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="d-none d-lg-block text-white fs-base text-center">รายชื่อลูกค้าผู้เข้าร่วมงาน Dealer New Car ไตรมาส 2 ปี 2566 
                          <br>  23 มิถุนายน 2566                           
						<a class="opacity-75-hover text-warning fw-bold me-1">ณ.โรงแรม Four Season กรุงเทพฯ </a></div>
						<!--end::Text-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Aside-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ url('/admin/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ url('/admin/assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ url('/admin/assets/js/custom/authentication/sign-in/general.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>