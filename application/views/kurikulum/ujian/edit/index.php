             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                 <div class="row">
                 	<div class="col">
                 		<?= form_open_multipart('edit/ujian/'.$editujian['idjadwal']) ; ?>

                 		  <div class="form-group row">
						    <label for="nama" class="col-sm-2 col-form-label text-capitalize">nama guru</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="nama" name="nama" value="<?= $editujian['nama_ujian']; ?>" readonly>
						    </div>
						    <label for="id_mapel" class="col-sm-2 col-form-label"> Nama Mapel</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" disabled id="id_mapel" name="id_mapel" value="<?= $editujian['id_mapel']; ?> (Kelas <?= $editujian['nama_jenjang'];?>)">
						    </div>
						  </div> 
						  <div class="form-group row">
						    <label for="mulai" class="col-sm-2 col-form-label">Jam Masuk</label>
						    <div class="col-sm-4">
						      <input type="datetime-local" class="form-control" id="mulai" name="mulai" value="<?= $editujian['mulai']; ?>">
						    </div>
						    <label for="selesai" class="col-sm-2 col-form-label">Jam Keluar</label>
						    <div class="col-sm-4">
						      <input type="datetime-local" class="form-control" id="selesai" name="selesai" value="<?= $editujian['selesai']; ?>">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
						    <div class="col-sm-4">
                            <select id="id_kelas" name="id_kelas" class="form-control">
                                <option selected value="<?= $editujian['id_kelas'] ?>"> <?= $editujian['nama_kelas'] ?> </option>
                                <?php foreach($kelas as $j):?>
                                <option value="<?= $j['kelas_id'];?>"><?= $j['nama_kelas'] ?></option>
                                <?php endforeach;?>
                            </select>
						    </div>
						    <label for="id_ruangan" class="col-sm-2 col-form-label">Ruangan</label>
						    <div class="col-sm-4">
                              <select class="form-control" id="id_ruangan" name="id_ruangan">
                              <option value="<?= $editujian['id_ruangan']; ?>" selected><?= $editujian['nama_ruangan']; ?></option>
                                <?php foreach($ruangan as $r):?>
                                <option class="text-capitalize" value="<?= $r['ruangan_id'];?>"><?= $r['nama_ruangan'] ?></option>
                                <?php endforeach;?>
                              </select>
						    </div>
                          </div>
                          

						  </div>

                        </div>
							  <div class="form-group row ">
							  	<div class="col">
							  		<button type="submit" class="btn btn-primary">
							  			Simpan Perubahan
							  		</button>
							  	</div>
							  </div>
                 			
                 		</form>
                 	</div>
                 </div>


             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->