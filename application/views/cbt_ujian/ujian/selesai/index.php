<body class="bg-light"> 
		<header>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="background-color: #020d26 !important;">
				<a class="navbar-brand" href="#">
					<img src="" class="d-none logo-img  d-xs-block d-sm-none d-md-none d-xl-block" />
					<img src="" class="d-block d-xs-none d-sm-block d-xl-none d-md-block" />
				</a>
				<ul class="navbar-nav  mr-auto d-none d-xl-block d-sm-block d-md-block d-xl-block">
					<li class=" nav-item">
						<a class="nav-link" id="soalIdentity"><h6 class="text-white text-uppercase"><i class="fa fa-home fa-2x pt-2"></i> Ujian </h6></a>
						<input type="hidden" id="sessionSoalUjian" value="<?= $this->session->userdata('ujian') ?>">
					</li>
				</ul>
				<span class="navbar-text d-block d-xl-block d-md-block d-sm-block">
					<a class="text-white text-uppercase username"><i class="fa fa-user pt-2"></i> Riezkan Aprianda Firmansyah</a>
					
				</span>
				
			</nav>
		</header>
		
		<main role="main">

		<div class="container">
			<div class="card m-5 mb-5">
			<ul class="list-group">
				<li class="list-group-item active p-4 h5">Konfirmasi Ujian</li>
				<li  style="border:0;" class="list-group-item h6 text-uppercase  mt-2"><span>NIS</span> <span class="float-right">11717504</span></li>
				<li  style="border:0;" class="list-group-item h6 text-uppercase"><span>Nama</span> <span class="float-right"><?= $nilai['nama'] ?></span></li>
				<li  style="border:0;" class="list-group-item h6 text-uppercase"><span>Kelas</span> <span class="float-right"><?= $nilai['nama_kelas'] ?></span></li>
				<li  style="border:0;" class="list-group-item h6 text-uppercase"><span>Mata Pelajaran</span> <span class="float-right"><?= $nilai['nama_mapel'] ?></span></li>
				<li  style="border:0;" class="list-group-item h6 text-uppercase"><span>Selesai</span> <span class="float-right"><?= date('d-M-Y, H:i', strtotime($nilai['date'])) ?></span></li>
				<li  style="border:0;" class="list-group-item text-center mb-4">
					<span class="h4 ">Hasil Ujian</span>
					<br>
					<span class="h1"><?= $nilai['nilai'] ?></span>
				</li>
				<li class="list-group-item text-center">
					<a href="<?= base_url('siswa') ?>" class="btn btn-sm btn-primary"><i class="fa fa-home"></i> Dashboard</a>
					<a href="<?= base_url('auth/logout') ?>" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i> Logout</a>
				</li>
			</ul>
		</div>
	</div>
         
		</main>

		<footer>
			<nav class="navbar bg-dark navbar-dark" style="background-color: #020d26 !important;">
				<a class="navbar-brand" href="#">
					<img src="" class="d-none logo-img  d-xs-block d-sm-none d-md-none d-xl-block" />
					<img src="" class="d-block d-xs-none d-sm-block d-xl-none d-md-block" />
				</a>
				<ul class="navbar-nav  mr-auto d-none d-xl-block d-sm-block d-md-block d-xl-block">
					<li class=" nav-item">
						<a class="nav-link" id="soalIdentity"><h6 class="text-white text-uppercase"> <i class="fa fa-university"></i> <?= nama_sekolah() ?></h6></a>
					</li>
				</ul>
				<span class="navbar-text d-block d-xl-block d-md-block d-sm-block">
					<a class="text-white text-uppercase username">&copy; IT CLub <?= date('Y') ?></a>
					
				</span>
				
			</nav>
		</footer>

		<script>
			// slight update to account for browsers not supporting e.which
			window.onload = function () {  
				document.onkeydown = function (e) {  
					return (e.which || e.keyCode) != 116;  
				};  
  		  }
		</script>