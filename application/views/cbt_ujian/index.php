				<div class="row" style="margin-top:-55px;">
					
					<div class="wizard-container">
						<div class="wizard-card" data-color="azure" id="wizard">
		                    <form action="" method="" novalidate="novalidate">

								<div class="wizard-header">
									<h3><i class="fa fa-4x fa-home"></i></h3>
									<h3 class="wizard-title">Find your next desk</h3>
		                        	<p class="category">Book from thousands of unique work and meeting spaces.</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
										<div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 16.6667%;"></div>
									</div>
									<ul class="nav nav-pills">
			                            <li class="active" style="width: 33.3333%;">
											<a href="#details" data-toggle="tab" aria-expanded="true">
												<div class="icon-circle checked">
													<i class="ti-list"></i>
												</div>
												Identitas
											</a>
										</li>
			                            <!-- <li style="width: 33.3333%;">
											<a href="#captain" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-briefcase"></i>
												</div>
												Data Diri
											</a>
										</li> -->
			                            <li style="width: 33.3333%;" id="id_siswa_ujian">
											<a href="#description" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-pencil"></i>
												</div>
												Description
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane active" id="details">
		                            	<div class="row">
		                                	<div class="col-sm-12">
												<h5 class="info-text"> Periksa Data Diri Anda dengan Baik</h5>
		                                	</div>
			                                <div class="col-sm-5 col-sm-offset-1">
												<div class="form-group">
			                                        <label>Nama</label>
			                                        <input type="text" class="form-control text-capitalize" id="nama_siswa" value="<?= $siswa['nama']?>" readonly>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
												<div class="form-group">
			                                        <label>Nis</label>
			                                        <input type="text" class="form-control text-capitalize" id="nis_siswa" value="<?= $siswa['nis']?>" readonly>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5 col-sm-offset-1">
												<div class="form-group">
														<label>Kelas</label>
														<input type="text" class="form-control text-capitalize" id="kelas_siswa" value="<?= $siswa['nama_kelas']?>" readonly>
													</div>
			                                </div>
			                                <div class="col-sm-5">
												<div class="form-group">
														<label>Jurusan</label> <input type="text" class="form-control text-capitalize" id="jurusan_siswa" value="<?= $siswa['nama_jurusan']?>" readonly>
													</div>
			                                </div>
		                            	</div>
		                        	</div>
		                            <div class="tab-pane" id="description">
		                                <div class="row">
											<h5 class="info-text"> Apakah anda siap untuk melaksanakan ujian? </h5>
		                                    <div class="col-sm-6 col-sm-offset-1">
												<div class="card p-2">
													<div class="card-header">
														<h4 class="h3" style="margin:20px;"><?= $ujian['nama_ujian']?></h4>
													</div>
													<div class="card-body">
													<p class="description" style="margin:20px;">"<?= $ujian['deskripsi_ujian'] ?>"</p>
												</div>
												<div class="card-footer text-right">
													<p class="description" style="margin:20px;"><?= $ujian['nama_mapel'] .' | '. $ujian['nama_kelas'] ?> </p>
													</div>
												</div>
		                                    </div>
		                                    <div class="col-sm-4">
												<div class="form-group">
													<div class="bgimg">
													<div class="middle">
														<h1 id="coming-soon">COMING SOON</h1>
														<hr id="hr-hr">
														<p id="demo"></p>
														<div id="id_ujian_masuk" style="display: none;">
															<h5>Masukan Kode Ujian</h5>
															<input type="number" name="code_auth_ujian" id="code_auth_ujian" class="form-control">
															<div class="custom-control custom-checkbox" style="margin-top: 10px;">
																<h5>Ketik ulang</h5>
																<input type="text" class="form-control" id="checkujian" placeholder="Saya siap melaksanakan ujian">
															</div>
														</div>
														</div>
													</div>
                          						 </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                        	<div class="pull-right">
		                                <input type="button" class="btn btn-next btn-fill btn-primary btn-wd" id="dataSiswaUjian" name="next" value="Next">
		                                <input type="button" id="mulaiUjianSiswa" class="btn btn-finish btn-fill btn-primary btn-wd" name="finish" value="Finish" style="display: none;" disabled>
		                            </div>
									
		                            <div class="pull-left">
		                                <input type="button" class="btn btn-previous btn-default btn-wd disabled" name="previous" value="Previous">
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div>
				</div>

				
			<script>

			var waktu = "<?= $ujian['waktu_mulai'] ?>";
			// Set the date we're counting down to
			var countDownDate = new Date(waktu).getTime();

			// Update the count down every 1 second
			var x = setInterval(function() {

			// Get today's date and time
			var now = new Date().getTime();

			// Find the distance between now and the count down date
			var distance = countDownDate - now;

			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			// Display the result in the element with id="demo"
			document.getElementById("demo").innerHTML = days + "d " + hours + "h "
			+ minutes + "m " + seconds + "s ";

			// If the count down is finished, write some text
			if (distance < 0) {
				clearInterval(x);
				document.getElementById('mulaiUjianSiswa').removeAttribute('disabled');
				$('#coming-soon').hide();
				$('#demo').hide();
				$('#hr-hr').hide();
				$('#id_ujian_masuk').show();
			}
			}, 1000);
			</script>
		             