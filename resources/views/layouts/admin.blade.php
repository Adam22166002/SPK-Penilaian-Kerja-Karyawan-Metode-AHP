<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SPK HRD</title>
	<link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	
</head>
<body>
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>

    <div id="main-wrapper">
		<div class="nav-header">
            <a href="{{route('admin.dashboard')}}" class="brand-logo">
				<svg class="logo-abbr" width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect class="react-logo" width="60" height="60" rx="30" fill="#00A15D"/>
					<mask id="mask0" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="60" height="60">
					<rect class="react-logo" width="60" height="60" rx="30" fill="#00A15D"/>
					</mask>
					<g mask="url(#mask0)">
					<path d="M130 51.3929L126.5 45.2109C123 38.9626 116 26.6981 109 23.1017C102 19.5715 95 24.875 88 29.3002C81 33.6591 74 37.3053 67 39.0124C60 40.7857 53 40.7857 46 36.3606C39 32.0017 32 23.0519 25 17.7981C18 12.4448 11 10.7874 4 16.9197C-3 23.0519 -10 37.3053 -17 40.7857C-24 44.2662 -31 37.3053 -34.5 33.7088L-38 30.1786V62H-34.5C-31 62 -24 62 -17 62C-10 62 -3 62 4 62C11 62 18 62 25 62C32 62 39 62 46 62C53 62 60 62 67 62C74 62 81 62 88 62C95 62 102 62 109 62C116 62 123 62 126.5 62H130V51.3929Z" fill="url(#paint0_linear)"/>
					<path d="M-54 55.7741L-50.5 50.9799C-47 46.1343 -40 36.623 -33 33.8339C-26 31.0962 -19 35.2092 -12 38.641C-5 42.0213 2 44.849 9 46.1728C16 47.5481 23 47.5481 30 44.1164C37 40.736 44 33.7954 51 29.721C58 25.5694 65 24.2841 72 29.0398C79 33.7954 86 44.849 93 47.5481C100 50.2473 107 44.849 110.5 42.0599L114 39.3222V64H110.5C107 64 100 64 93 64C86 64 79 64 72 64C65 64 58 64 51 64C44 64 37 64 30 64C23 64 16 64 9 64C2 64 -5 64 -12 64C-19 64 -26 64 -33 64C-40 64 -47 64 -50.5 64H-54V55.7741Z" fill="url(#paint1_linear)"/>
					</g>
					<defs>
					<linearGradient id="paint0_linear" x1="46" y1="13" x2="46" y2="62" gradientUnits="userSpaceOnUse">
					<stop  offset="0" stop-color="#23D58A"/>
					<stop offset="1" stop-color="#00A15D"/>
					</linearGradient>
					<linearGradient id="paint1_linear" x1="30" y1="26" x2="30" y2="64" gradientUnits="userSpaceOnUse">
					<stop  offset="0" stop-color="#FFED4B"/>
					<stop offset="1" stop-color="#FF8C4B"/>
					</linearGradient>
					</defs>
				</svg>

				<div class="brand-title">
					<h2 class="">Sistem</h2>
					<span class="brand-sub-title">Pengambilan Keputusan HRD</span>
				</div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Administrator HRD
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here...">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"/>
										<path d="M9.98192 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1839 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.98192Z" fill="#717579"/>
									</svg>
                                    <span class="badge light text-white bg-blue rounded-circle">16</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
										<ul class="timeline">
											
										</ul>
									</div>
                                    <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
                                </div>
                            </li>
							<li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ asset('images/avatar/1.png') }}">
									<div class="header-info ms-3">
										<span class="fs-18 font-w500 mb-2">{{ auth()->user()->name }}</span>
										<small class="fs-12 font-w400">{{ auth()->user()->email }}</small>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
									<div>
										<a href="#" class="dropdown-item ai-icon">
											<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
											<span class="ms-2">Profile </span>
										</a>
									</div>
									<form method="POST" action="{{ route('logout') }}" class="d-inline">
										@csrf
										<button type="submit" class="dropdown-item ai-icon">
											<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
											<span class="ms-2">Logout </span>
										</button>
									</form>
                                </div>
                            </li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>

        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('admin.dashboard') }}" aria-expanded="false">
						<i class="fas fa-home"></i>
						<span class="nav-text">Dashboard</span>
					</a>
				</li>

				<li>
					<a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
						<i class="fas fa-database"></i>
						<span class="nav-text">Master Data</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="{{ route('karyawan.index') }}">Data Karyawan</a></li>
						<li><a href="{{ route('kriteria.index') }}">Data Kriteria</a></li>
						<li><a href="{{ route('periode-penilaian.index') }}">Periode Penilaian</a></li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
						<i class="fas fa-balance-scale"></i>
						<span class="nav-text">AHP</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="{{ route('ahp.index') }}">Input Perbandingan</a></li>
						<li><a href="{{ route('bobot.index') }}">Lihat Bobot Kriteria</a></li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
						<i class="fas fa-check-circle"></i>
						<span class="nav-text">Penilaian</span>
					</a>
					<ul aria-expanded="false">
						@if($periodeAktif)
							<li><a href="{{ route('penilaian.form', $periodeAktif->id) }}">Input Nilai</a></li>
							<li><a href="{{ route('penilaian.hasil', $periodeAktif->id) }}">Hasil Penilaian</a></li>
						@else
							<li><a href="javascript:void(0)" onclick="alert('Belum ada periode aktif')">Input Nilai</a></li>
							<li><a href="javascript:void(0)" onclick="alert('Belum ada periode aktif')">Hasil Penilaian</a></li>
						@endif
					</ul>
				</li>

				<li>
					@if($periodeAktif)
						<a href="{{ route('laporan.penilaian.pdf', $periodeAktif->id) }}">
							<i class="fas fa-download"></i>
							<span class="nav-text">Laporan Penilaian</span>
						</a>
					@else
						<a href="javascript:void(0)" onclick="alert('Belum ada periode aktif')">
							<i class="fas fa-download"></i>
							<span class="nav-text">Laporan Penilaian</span>
						</a>
					@endif
				</li>

			</ul>
				<div class="plus-box">
					<div class="text-center">
						<h4 class="fs-18 font-w600 mb-4">Ada Kendala di Sistem?</h4>
						<a href="https://synergyteam.id" class="btn btn-primary btn-rounded">Hubungi Admin <i class="fas fa-caret-right"></i></a>
					</div>
				</div>
				
				<div class="copyright">
					<p><strong>SPK HRD</strong> © 2021 All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by Sysnergy Team</p>
				</div>
			</div>
        </div>


        <div class="content-body">
			<div class="container-fluid">
				 @yield('content')
            </div>
        </div>
		
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://synergyteam.id/" target="_blank">SynergyTeam.id</a> 2025</p>
            </div>
        </div>


	</div>
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script>
<script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>

<script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>

</body>
</html>