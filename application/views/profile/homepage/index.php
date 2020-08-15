      
    <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <!-- Content Row -->
    <div class="row m1">
        <?php foreach($homepage as $h) : ?>
          <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4" >
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2 jenis-style" data-toggle="collapse" id="jenis-style" href="#<?= $h['jenis']; ?>" role="button" aria-expanded="false" aria-controls="<?= $h['jenis']; ?>" style="cursor: pointer;">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1"><?= $h['jenis']; ?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $h['jumlah']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-plus fa-2x text-gray-500 button-modal-add" data-toggle="modal" data-target="#<?= $h['jenis']; ?>Modal" style="cursor: pointer;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php endforeach; ?>
        </div>



        <div class="collapse" id="slider">
          <div class="card card-body">
            <table class="table table-borderless table-responsive">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($dataslider as $d) : ?>
                <tr>
                  <td class="text-center"><img src="<?= base_url('assets/img/images/'.$d['gambar']); ?>" width="100" alt=" " class="img-responsive"></td>
                  <td><?= $d['judul']; ?></td>
                  <td><?= $d['deskripsi']; ?></td>
                  <td><?= $d['keterangan']; ?></td>
                  <td>
                    <?php if($this->session->role_id == 1) : ?>
                    <a href="javascript:;" class="tombol-edit" data-id="<?= $d['id']; ?>" data-judul="<?= $d['judul']; ?>" data-deskripsi="<?= $d['deskripsi']; ?>" data-keterangan="<?= $d['keterangan']; ?>" data-toggle="modal" data-target="#edit-data"><i class="fas fa-edit text-warning" ></i>
                    <?= slider_hapus($d['id']); ?>
                    <a href="<?= base_url('profile/slider/'.$d['id']); ?>"><i class="fas fa-image text-success"></i></a>
                    <?php else : ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>


        <div class="collapse" id="services">
          <div class="card card-body">
            <table class="table table-borderless table-responsive">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($dataservices as $d) : ?>
                <tr>
                  <td class="text-center"><i class="<?= $d['gambar']; ?>"></i></td>
                  <td><?= $d['judul']; ?></td>
                  <td><?= $d['deskripsi']; ?></td>
                  <td><?= $d['keterangan']; ?></td>
                  <td>
                    <?php if($this->session->role_id == 1) : ?>
                    <a href="javascript:;" class="tombol-edit" data-id="<?= $d['id']; ?>" data-judul="<?= $d['judul']; ?>" data-deskripsi="<?= $d['deskripsi']; ?>" data-icon="<?= $d['gambar']; ?>" data-toggle="modal" data-target="#edit-data"><i class="fas fa-edit text-warning" ></i></a>
                    <?= profile_hapus($d['jenis'], $d['id']); ?>
                    <?php else : ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>


        <!-- Profile Image -->
           <div class="collapse" id="gambarProfile">
            <div class="card card-body text-center">
              <div class="row center">
                <div class="col"> 
                  <img src="<?= base_url('assets/img/images/'.$dataprofile['gambar']); ?>" width="300" alt=" " class="img-responsive">
                </div>
                <div class="col">
                 <?= form_open_multipart('profile/update/profile'); ?> 
                      <div class="custom-file mt-5">
                        <input type="file" class="custom-file-input" id="image-profile" name="image-profile" required>
                        <label class="custom-file-label" for="image-profile">Input gambar</label>
                        </div> 
                     <button type="submit" class="btn btn-success float-right mt-2">submit</button>
                  <?= form_close(); ?> 
                </div>
              </div>
            </div>
          </div>

        <!-- Profile -->

        <div class="collapse" id="profile">
          <div class="card card-body">
            <table class="table table-borderless table-responsive">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center"><img src="<?= base_url('assets/img/images/'.$dataprofile['gambar']); ?>" width="100" alt=" " class="img-responsive"></td>
                  <td><?= $dataprofile['judul']; ?></td>
                  <td><?= $dataprofile['deskripsi']; ?></td>
                  <td><?= $dataprofile['keterangan']; ?></td>
                  <td>
                    <?php if($this->session->role_id == 1) : ?>
                    <a href="javascript:;" class="tombol-edit" data-id="<?= $dataprofile['id']; ?>" data-judul="<?= $dataprofile['judul']; ?>" data-deskripsi="<?= $dataprofile['deskripsi']; ?>" data-keterangan="<?= $dataprofile['keterangan']; ?>" data-toggle="modal" data-target="#edit-data"><i class="fas fa-edit text-warning" ></i></a>
                    <a data-toggle="collapse" href="#gambarProfile" role="button" aria-expanded="false" aria-controls="gambarProfile"><i class="fas fa-image text-success" ></i></a>
                    <?= profile_hapus($dataprofile['jenis'], $dataprofile['id']); ?>
                    <?php else : ?>
                    <?php endif; ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>


        <!-- Testimonial -->

        <div class="collapse" id="testimonial">
          <div class="card card-body">
            <table class="table table-borderless table-responsive">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($datatestimonial as $d): ?>
                <tr>
                  <td class="text-center"><img src="<?= base_url('assets/img/testimonial/'.$d['gambar']); ?>" width="100" alt=" " class="img-responsive"></td>
                  <td><?= $d['judul']; ?></td>
                  <td><?= $d['deskripsi']; ?></td>
                  <td>
                    <?php if($this->session->role_id == 1) : ?>
                    <a href="javascript:;" class="tombol-edit" data-id="<?= $d['id']; ?>" data-judul="<?= $d['judul']; ?>" data-deskripsi="<?= $d['deskripsi']; ?>" data-toggle="modal" data-target="#edit-data"><i class="fas fa-edit text-warning" ></i></a>
                     <a href="<?= base_url('profile/testimonial/'.$d['id']); ?>"><i class="fas fa-image text-success"></i></a>
                    <?= profile_hapus($d['jenis'], $d['id']); ?>
                    <?php else : ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Footer -->

        <div class="collapse" id="footer">
          <div class="card card-body">
            <table class="table table-borderless table-responsive">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Logo</th>
                  <th scope="col">Judul </th>
                  <th scope="col">Deskripsi Footer</th>
                  <th scope="col">Alamat Footer</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center"><img src="<?= base_url('assets/img/images/'.$footer['gambar']); ?>" width="100" alt=" " class="img-responsive"></td>
                  <td><?= $footer['judul']; ?></td>
                  <td><?= $footer['deskripsi']; ?></td>
                  <td><?= $footer['keterangan']; ?></td>
                  <td>
                    <?php if($this->session->role_id == 1) : ?>
                    <a href="javascript:;" class="tombol-edit" data-id="<?= $footer['id']; ?>" data-judul="<?= $footer['judul']; ?>" data-deskripsi="<?= $footer['deskripsi']; ?>" data-keterangan="<?= $footer['keterangan']; ?>" data-toggle="modal" data-target="#edit-data"><i class="fas fa-edit text-warning" ></i></a>
                     <a href="<?= base_url('profile/footer/'.$footer['id']); ?>"><i class="fas fa-image text-success"></i></a>
                    <?= profile_hapus($footer['jenis'], $footer['id']); ?>
                    <?php else : ?>
                    <?php endif; ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>


        <!-- contact -->

        <div class="collapse" id="contact">
          <div class="card card-body">
            <table class="table table-borderless table-responsive">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Jam Sekolah</th>
                  <th scope="col">Telepon</th>
                  <th scope="col">Fax </th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center"><?= $contact['gambar']; ?></td>
                  <td><?= $contact['keterangan']; ?></td>
                  <td><?= $contact['judul']; ?></td>
                  <td><?= $contact['deskripsi']; ?></td>
                  <td>
                    <?php if($this->session->role_id == 1) : ?>
                    <a href="javascript:;" class="tombol-edit" data-id="<?= $contact['id']; ?>" data-judul="<?= $contact['judul']; ?>" data-deskripsi="<?= $contact['deskripsi']; ?>" data-keterangan="<?= $contact['keterangan']; ?>" data-gambar="<?= $contact['gambar']; ?>" data-toggle="modal" data-target="#edit-data"><i class="fas fa-edit text-warning" ></i></a>
                    <?= profile_hapus($contact['jenis'], $contact['id']); ?>
                    <?php else : ?>
                    <?php endif; ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>


        <!-- Sosmed -->

        <div class="collapse" id="sosmed">
          <div class="card card-body">
            <table class="table table-borderless table-responsive">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Platform </th>
                  <th scope="col">Url</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($sosmed as $s) : ?>
                <tr>
                  <td class="text-center"><i class="fab fa-2x fa-<?= $s['judul'];?>"></i></td>
                  <td><?= $s['judul']; ?></td>
                  <td><?= $s['deskripsi']; ?></td>
                  <td>
                    <?php if($this->session->role_id == 1) : ?>
                    <a href="javascript:;" class="tombol-edit" data-id="<?= $s['id']; ?>" data-judul="<?= $s['judul']; ?>" data-deskripsi="<?= $s['deskripsi']; ?>" data-toggle="modal" data-target="#edit-data"><i class="fas fa-edit text-warning" ></i></a>
                    <input type="checkbox" class="checkbox-sosmed" data-judul="<?= $s['judul']; ?>" data-keterangan="<?= $s['keterangan']; ?>" data-id="<?= $s['id']; ?>" <?= checkbox_sosmed($s['id']); ?>>
                    <?php else : ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Sponsor -->

        <div class="collapse" id="sponsor">
          <div class="card card-body">
            <table class="table table-borderless table-responsive">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Brand atau Sponsor </th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($sponsor as $s) : ?>
                <tr>
                  <td class="text-center"><img src="<?= base_url('assets/img/images/'.$s['gambar']); ?>" width="100" alt=" " class="img-responsive"></td>
                  <td><?= $s['judul']; ?></td>
                  <td><?= $s['deskripsi']; ?></td>
                  <td>
                    <?php if($this->session->role_id == 1) : ?>
                    <a href="javascript:;" class="tombol-edit" data-id="<?= $s['id']; ?>" data-judul="<?= $s['judul']; ?>" data-deskripsi="<?= $s['deskripsi']; ?>" data-toggle="modal" data-target="#edit-data"><i class="fas fa-edit text-warning" ></i></a>
                    <input type="checkbox" class="checkbox-sosmed" data-judul="<?= $s['judul']; ?>" data-keterangan="<?= $s['keterangan']; ?>" data-id="<?= $s['id']; ?>" <?= checkbox_sosmed($s['id']); ?>>
                    <?= profile_hapus($s['jenis'], $s['id']); ?>
                    <?php else : ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

     

  <!-- Modal Ubah -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              Edit Data
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
             <form class="form-horizontal" action="<?= base_url('update/slider')?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                      <div class="form-group">
                          <div class="col-lg-10">
                           <input type="hidden" id="id" name="id">
                              <input type="text" class="form-control" id="judul" name="judul" placeholder="Tuliskan Judul">
                          </div>
                      </div>
                       <div class="form-group">
                          <div class="col-lg-10">
                              <input type="text" class="form-control" id="icon" name="icon" placeholder="Tuliskan Icon Fontawesome">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-lg-10">
                           <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Tuliskan Deskripsi"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-lg-10">
                              <textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Tuliskan Keterangan"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-lg-10">
                              <textarea type="text" class="form-control" id="gambar" name="gambar" placeholder="Tuliskan Keterangan"></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-info" type="submit" id="submit-data-slider"> Simpan&nbsp;</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                  </div>
                 </form>
             </div>
         </div>
     </div>
 <!-- END Modal Ubah -->


  <!-- Modal Insert Slider -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sliderModal" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              Tambah Data
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
            <?= form_open_multipart('profile/insert/slider'); ?> 
              <div class="modal-body">
                      <div class="form-group">
                        <input type="text" class="form-control" name="judulslider" id="judulslider" placeholder="Masukkan judul disini">
                      </div> 
                      <div class="form-group">
                        <input type="text" class="form-control" name="deskslider" id="deskslider" placeholder="Masukkan deskripsi disini">
                      </div> 
                      <div class="form-group">
                        <input type="text" class="form-control" name="ketslider" id="ketslider" placeholder="Masukkan keterangan disini">
                      </div>
                      <div class="custom-file mt-2 mb-2">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
                        <label class="custom-file-label" for="gambar">Input gambar</label>
                        </div> 
             </div>
             <div class="modal-footer">
               <button type="submit" class="btn btn-success">submit</button>
             </div>
          <?= form_close(); ?>  
         </div>
     </div>
   </div>
 <!-- END Modal Insert Slider -->


 <!-- Modal Insert services -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="servicesModal" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              Tambah Data
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
            <?= form_open_multipart('profile/insert/services'); ?> 
              <div class="modal-body">
                      <div class="form-group">
                        <input type="text" class="form-control" name="judulservices" id="judulservices" placeholder="Masukkan judul disini">
                      </div> 
                      <div class="form-group">
                        <input type="text" class="form-control" name="deskservices" id="deskservices" placeholder="Masukkan deskripsi disini">
                      </div>  
                       <div class="form-group">
                        <input type="text" class="form-control" name="iconservices" id="iconservices" placeholder="Masukkan kode icon disini">
                      </div>
                      </div>
                     
             <div class="modal-footer">
               <button type="submit" class="btn btn-success">submit</button>
             </div>
          <?= form_close(); ?>  
         </div>
     </div>
   </div>
 <!-- END Modal Insert services -->


 <!-- Modal Insert services -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="testimonialModal" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              Tambah Data
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
            <?= form_open_multipart('profile/insert/testimonial'); ?> 
              <div class="modal-body">
                      <div class="form-group">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama seseorang">
                      </div> 
                      <div class="form-group">
                        <input type="text" class="form-control" name="deskripsitest" id="deskripsitest" placeholder="Masukkan deskripsi disini">
                      </div>

                      <div class="custom-file mt-2 mb-2">
                        <input type="file" class="custom-file-input" id="imagetest" name="imagetest" required>
                        <label class="custom-file-label" for="imagetest">Input gambar</label>
                        </div>
                </div>
                     
             <div class="modal-footer">
               <button type="submit" class="btn btn-success">submit</button>
             </div>
          <?= form_close(); ?>  
         </div>
     </div>
   </div>
 <!-- END Modal Insert services -->

 <!-- Modal Insert services -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="sponsorModal" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
              Tambah Data
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
             </div>
            <?= form_open_multipart('profile/insert/sponsor'); ?> 
              <div class="modal-body">
                      <div class="form-group">
                        <input type="text" class="form-control" name="judulsponsor" id="judulsponsor" placeholder="Masukkan nama sponsor">
                      </div> 
                      <div class="form-group">
                        <input type="text" class="form-control" name="desksponsor" id="desksponsor" placeholder="Masukkan deskripsi sponsor disini">
                      </div>

                      <div class="custom-file mt-2 mb-2">
                        <input type="file" class="custom-file-input" id="imagesponsor" name="imagesponsor" required>
                        <label class="custom-file-label" for="imagesponsor">Input gambar</label>
                        </div>
                </div>
                     
             <div class="modal-footer">
               <button type="submit" class="btn btn-success">submit</button>
             </div>
          <?= form_close(); ?>  
         </div>
     </div>
   </div>
 <!-- END Modal Insert services -->

        </div>
        </div>

