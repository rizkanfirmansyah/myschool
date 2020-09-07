<body class="bg-light"> 
		<header>
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="background-color: #020d26 !important;">
				<a class="navbar-brand" href="#">
					<img src="" class="d-none logo-img  d-xs-block d-sm-none d-md-none d-xl-block" />
					<img src="" class="d-block d-xs-none d-sm-block d-xl-none d-md-block" />
				</a>
				<ul class="navbar-nav  mr-auto d-none d-xl-block d-sm-block d-md-block d-xl-block">
					<li class=" nav-item">
						<a class="nav-link" id="soalIdentity"><h6 class="text-white text-uppercase"><i class="fa fa-home fa-2x pt-2"></i> SMK Negeri 5 Bandung </h6></a>
						<input type="hidden" id="sessionSoalUjian" value="<?= $this->session->userdata('ujian') ?>">
					</li>
				</ul>
				<span class="navbar-text d-block d-xl-block d-md-block d-sm-block">
					<a class="text-white text-uppercase username"><i class="fa fa-user pt-2"></i> Riezkan Aprianda Firmansyah</a>
					
				</span>
				<a class="p-3"><small class="timercss" id="timerUjian"></small> </a>
				
			</nav>
		</header>
		
		<main role="main">
         <div class="album py-2 bg-light row mx-2 my-3">
			<div class="col-sm-8">
				<div class="row">
					<div class="col-md-12 col-sm-12  col-xs-12">
						<div class="shadow p-3 mb-1 bg-white rounded" style="border-left: 5px solid #4CAF50" id="textSoal">
							<h6 id="soalNa"></h6>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12 col-sm-12  col-xs-12">
						<div class="shadow pt-2 mb-2 bg-white rounded" style="border-left: 5px solid #2196F3">
							<div class="row">
								<div class="col-md-12">
									<div class="card" style="margin:-10px 0">
										<ul class="list-group list-group-flush" id="pilihanNa">
											</ul>
										</div> 
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 m-3">
										<div class="row" id="paginationBtn">
											
										</div>
									</div>
								</div>		
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4 card p-3 pl-4" style="max-height: 1000px;">
					<h3 class="text-center">Tabel Jawaban
				</h3>
					<div class="row" id="panelJawabanUjian">
						
					</div>
				</div>
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
