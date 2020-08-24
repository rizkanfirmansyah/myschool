             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                 <div class="row">
                 	<div class="col">
                 		<?= form_open_multipart('edit/class/'.$kelas['kelas_id']) ; ?>

                 		  <div class="form-group row">
						    <label for="nama" class="col-sm-2 col-form-label text-capitalize">nama kelas</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?= $kelas['nama_kelas']; ?>">
						    </div>
						    <label for="ruangan" class="col-sm-2 col-form-label"> Nama Ruangan</label>
						    <div class="col-sm-4">
                              <select class="form-control" id="ruangan" name="ruangan">
                              <option value="<?= $kelas['ruangan_id']; ?>" selected><?= $kelas['nama_ruangan']; ?></option>
                                <?php foreach($ruangan as $r):?>
                                <option class="text-capitalize" value="<?= $r['ruangan_id'];?>"><?= $r['nama_ruangan'] ?></option>
                                <?php endforeach;?>
                              </select>
						    </div>
						  </div> 
						
						  <div class="form-group row">
						    <label for="wakel" class="col-sm-2 col-form-label">Wali Kelas</label>
						    <div class="col-sm-4">
                              <select class="form-control" id="wakel" name="wakel">
                              <option value="<?= $kelas['id']; ?>" selected><?= $kelas['nama']; ?></option>
                                <?php foreach($guru as $g):?>
                                <option class="text-capitalize" value="<?= $g['id'];?>"><?= $g['nama'] ?></option>
                                <?php endforeach;?>
                              </select>
						    </div>
						    <label for="jurusan" class="col-sm-2 col-form-label">Nama Jurusan</label>
						    <div class="col-sm-4">
                            <select id="jurusan" name="jurusan" class="form-control">
                                <option selected value="<?= $kelas['jurusan_id'] ?>"> <?= $kelas['nama_jurusan'] ?> </option>
                                <?php foreach($jurusan as $j):?>
                                <option value="<?= $j['jurusan_id'];?>"><?= $j['nama_jurusan'] ?></option>
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