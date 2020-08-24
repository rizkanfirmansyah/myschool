             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                 <div class="row">
                 	<div class="col">
                 		<?= form_open_multipart('edit/schedule/'.$edit['jadwal_id']) ; ?>

                 		  <div class="form-group row">
						    <label for="nama" class="col-sm-2 col-form-label text-capitalize">nama guru</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="nama" name="nama" value="<?= $edit['nama']; ?>" readonly>
						    </div>
						    <label for="nama_mapel" class="col-sm-2 col-form-label"> Nama Mapel</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" disabled id="nama_mapel" name="nama_mapel" value="<?= $edit['nama_mapel']; ?> (Kelas <?= $edit['nama_jenjang'];?>)">
						    </div>
						  </div> 
						  <div class="form-group row">
						    <label for="jam_masuk" class="col-sm-2 col-form-label">Jam Masuk</label>
						    <div class="col-sm-4">
						      <input type="time" class="form-control" id="jam_masuk" name="jam_masuk" value="<?= $edit['jam_masuk']; ?>">
						    </div>
						    <label for="jam_keluar" class="col-sm-2 col-form-label">Jam Keluar</label>
						    <div class="col-sm-4">
						      <input type="time" class="form-control" id="jam_keluar" name="jam_keluar" value="<?= $edit['jam_keluar']; ?>">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="hari" class="col-sm-2 col-form-label">Hari</label>
						    <div class="col-sm-4">
                              <select class="form-control" id="hari" name="hari">
                              <option value="<?= $edit['hari']; ?>" selected disabled><?= $edit['hari']; ?></option>
                              <?php $hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu']; ?>
                                <?php foreach($hari as $h):?>
                                <option class="text-capitalize" value="<?= $h;?>"><?= $h ?></option>
                                <?php endforeach;?>
                              </select>
						    </div>
						    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
						    <div class="col-sm-4">
                            <select id="kelas" name="kelas" class="form-control">
                                <option selected disabled value="<?= $edit['id_kelas'] ?>"> <?= $edit['nama_kelas'] ?> </option>
                                <?php foreach($kelas as $j):?>
                                <option value="<?= $j['kelas_id'];?>"><?= $j['nama_kelas'] ?></option>
                                <?php endforeach;?>
                            </select>
						    </div>
                          </div>
						  <div class="form-group row">
						    <label for="ruangan" class="col-sm-2 col-form-label">ruangan</label>
						    <div class="col-sm-4">
                              <select class="form-control" id="ruangan" name="ruangan">
                              <option value="<?= $edit['id_ruangan']; ?>" selected disabled><?= $edit['nama_ruangan']; ?></option>
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