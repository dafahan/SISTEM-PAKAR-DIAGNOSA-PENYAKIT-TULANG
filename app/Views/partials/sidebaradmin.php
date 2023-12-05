
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?=$title ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../img/logo.png" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">

	<style>
		input[type='submit']{
			border: none;
			background: none;
		}

		.logo{
			font-size: 24px;
			font-family: Copperplate, Papyrus, fantasy;
		}
	</style>


</head>
<body>
<div class="app">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="orange">
				
				<a href="index.html" class="logo">
					<img src="../img/logo.png" width="24px" alt="navbar brand" class="navbar-brand"><b style="color: aliceblue;">ilang</b>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="orange2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<center><i class="fas fa-user avatar-img rounded-circle" style="font-size: 24px; color:white; padding-top:8px; border:1px solid;"></i></center>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><center><i class="fas fa-user avatar-img rounded" style="font-size: 45px; color:rgb(0, 73, 98); padding-top:8px; border:1px solid;"></i></center></div>
											<div class="u-text">
												<h4><?= user()->username;?></h4>
												<p class="text-muted"><?= user()->email;?></p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
											<form id="logout-form" action="<?=base_url('logout')?>" method="POST" class="dropdown-item">
												<?csrf()?>
												<input type="submit" value="logout" >
											</form>
										
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar" data-background-color="dark">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2 mt-1">
							<center><i class="fas fa-user avatar-img rounded-circle" style="font-size: 23px; padding-top:8px; border:1px solid;"></i></center>
							
							
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?= user()->username?>
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item  <?php echo ($title === "Home | admin" ? 'active' : '') ?>">
							<a href="<?=base_url('admin/home')?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Manage data</h4>
						</li>
						<li class="nav-item {{ $title === "Data Penyakit" ? 'active' : '' }}">
							<a href="/admin/datapenyakit">
								<i class="fas fa-layer-group"></i>
								<p>Data Penyakit</p>
							</a>
						</li>
						<li class="nav-item {{ $title === "Data Gejala" ? 'active' : '' }}">
							<a href="/admin/datagejala">
								<i class="fas fa-th-list"></i>
								<p>Data Gejala</p>
							</a>
						</li>
						<li class="nav-item {{ $title === "Data Solusi" ? 'active' : '' }}">
							<a href="/admin/datasolusi">
								<i class="fas fa-th-list"></i>
								<p>Data Solusi</p>
							</a>
						</li>
						<li class="nav-item {{ $title === "Data Penyebab" ? 'active' : '' }}">
							<a href="/admin/datapenyebab">
								<i class="fas fa-th-list"></i>
								<p>Data Penyebab</p>
							</a>
						</li>
						<li class="nav-item {{ $title === "Data Pasien" ? 'active' : '' }}">
							<a href="/admin/datapasien">
								<i class="fas fa-users"></i>
								<p>Data Pasien</p>
							</a>
						</li>
						<li class="nav-item {{ $title === "Data Pasien" ? 'active' : '' }}">
							<a href="/admin/datadiagnosa">
								<i class="fas fa-pen-square"></i>
								<p>Data Diagnosa</p>
							</a>
						</li>
						<li class="nav-item {{ $title === "Detail Penyakit" ? 'active' : '' }}">
							<a href="/admin/detailpenyakit">
								<i class="fas fa-table"></i>
								<p>Manage Article</p>
							</a>
						</li>
						<li class="nav-section" style="border-top: 1px solid rgba(241, 241, 241, 0.1); margin:10px 10px;">
						</li>
						<!-- <li class="nav-item">
							<div>
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fa fa-ellipsis-h"></i>
								<p>Detail Penyakit</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li class="nav-item {{ $title === "Detail Penyakit | Gejala" ? 'active' : '' }}">
										<a href="/admin/detailpenyakit_gejala">
											<span class="sub-item">Gejala</span>
										</a>
									</li>
									<li class="nav-item {{ $title === "Detail Penyakit | Penyebab" ? 'active' : '' }}">
										<a href="/admin/detailpenyakit_penyebab">
											<span class="sub-item">Penyabab</span>
										</a>
									</li>
									<li class="nav-item {{ $title === "Detail Penyakit | Solusi" ? 'active' : '' }}">
										<a href="/admin/detailpenyakit_solusi">
											<span class="sub-item">Solusi</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div>
		<?= $this->renderSection('content') ?>
			
		</div>
		
		</div>
		
		
		<!-- Custom template | don't include it in your project! -->
		<!-- <div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="selected changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="selected changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div> -->
		<!-- End Custom template -->
	</div>
</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	{{-- <script src="../assets/js/plugin/chart-circle/circles.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>

	<script>
		// Circles.create({
		// 	id:'circles-1',
		// 	radius:45,
		// 	value:60,
		// 	maxValue:100,
		// 	width:7,
		// 	text: 5,
		// 	colors:['#f1f1f1', '#FF9E27'],
		// 	duration:400,
		// 	wrpClass:'circles-wrp',
		// 	textClass:'circles-text',
		// 	styleWrapper:true,
		// 	styleText:true
		// })

		// Circles.create({
		// 	id:'circles-2',
		// 	radius:45,
		// 	value:70,
		// 	maxValue:100,
		// 	width:7,
		// 	text: 36,
		// 	colors:['#f1f1f1', '#2BB930'],
		// 	duration:400,
		// 	wrpClass:'circles-wrp',
		// 	textClass:'circles-text',
		// 	styleWrapper:true,
		// 	styleText:true
		// })

		// Circles.create({
		// 	id:'circles-3',
		// 	radius:45,
		// 	value:40,
		// 	maxValue:100,
		// 	width:7,
		// 	text: 12,
		// 	colors:['#f1f1f1', '#F25961'],
		// 	duration:400,
		// 	wrpClass:'circles-wrp',
		// 	textClass:'circles-text',
		// 	styleWrapper:true,
		// 	styleText:true
		// })

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
	
</body>

</html>