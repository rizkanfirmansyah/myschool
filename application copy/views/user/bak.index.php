             <!-- Begin Page Content -->
             <div class="container-fluid">

                 <!-- Page Heading -->
                 <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                 <div class="row">
                     <div class="col-lg-8">
                         <?= $this->session->flashdata('message'); ?>
                     </div>
                 </div>

                 <div class="row">
                     <div class="card col-md-8 shadow">
                         <div class="card-body">
                             <div class="table-responsive table-bordered-less">
                                <div class="row no-gutters" >
                                  <div class="col-md-4 pb-5 pr-5 ">
                                    <img src="<?= base_url('assets/img/profile/') .  $profile['image']; ?>" class="card-img " alt="...">
                                  </div>
                                  <div class="col-md-8">
                                      <table class="table table-borderedless">
                                        <tbody>
                                          <tr>
                                            <td>Username</td>
                                            <td class="text-center">:</td>
                                            <td><?= $profile['name']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>Nama</td>
                                            <td class="text-center">:</td>
                                            <td><?= $profile['nama']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>Email</td>
                                            <td class="text-center">:</td>
                                            <td><?= $profile['email']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>ID User</td>
                                            <td class="text-center">:</td>
                                            <td>
                                                <?php if ($profile['id_user'] ): ?>
                                                  <?= $profile['id_user']; ?>
                                                <?php else: ?>
                                                  ID belum terdaftar
                                                <?php endif; ?>
                                              </td>
                                          </tr>
                                          <tr>
                                            <td>Kelas</td>
                                            <td class="text-center">:</td>
                                            <td>
                                                  <?= $profile['kelas']; ?>
                                              </td>
                                          </tr>
                                          <tr>
                                            <td>Tanggal Lahir</td>
                                            <td class="text-center">:</td>
                                            <td>
                                                  <?= $profile['ttl']; ?>
                                              </td>
                                          </tr>
                                            <tr>
                                            <td>ID Member</td>
                                            <td class="text-center">:</td>
                                            <td>
                                                <?php if ($profile['user_id'] ): ?>
                                                  <?= $profile['user_id']; ?>
                                                <?php else: ?>
                                                  ID belum terdaftar
                                                <?php endif; ?>
                                              </td>
                                          </tr>
                                            <tr>
                                            <td>Member resmi</td>
                                            <td class="text-center">:</td>
                                            <td>
                                                <?= date('d M Y', $profile['time']); ?>
                                              </td>
                                          </tr>
                                            <tr>
                                            <td>Bergabung sejak</td>
                                            <td class="text-center">:</td>
                                            <td>
                                                <?= date('d M Y', $profile['date_created']); ?>
                                              </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3" style="border: none;" ><a href="<?= base_url('user/edit'); ?>" class="btn btn-warning float-right"><i class="fas fa-edit"> Edit Profile</i></a></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                  </div>
                                </div>
                             </div>
                         </div>
                     </div>
                    
                     <div class="col-md-4 mt-3">
                        <!-- Earnings (Monthly) Card Example -->
                            <div class="col mb-4">
                                <?php if ($absenToDay == null){
                                       $keterangan = 'danger';
                                       $ketAbsen = ' ';
                                       $ketIcons = ' times';
                                      }else {
                                       $ketAbsen = $absenToDay['keterangan'] ;
                                        $keterngan = 'success';
                                       $ketIcons = ' check';
                                      } 
                                 ?>
                                    <div class="card border-left-<?= $keterangan; ?> shadow h-100 py-2" data-toggle="modal" data-target="#popUp">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-<?= $keterangan; ?> text-uppercase mb-1">Absen Hari Ini</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ketAbsen; ?></div>
                                    </div>
                                    <div class="col-auto">
                                          <i class="fas fa-calendar-<?= $ketIcons; ?> fa-2x text-<?= $keterangan; ?>"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col mb-4">
                              <div class="card border-left-primary shadow h-100 py-2" data-toggle="modal" data-target="#popUpKas">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nominal Kas</div>
                                      <?php if ($kas['nominal'] - $kasIt['kas'] < 0): ?>
                                      <div class="h5 mb-0 font-weight-bold text-danger">Rp. <?= $kas['nominal'] - $kasIt['kas'] ; ?></div>
                                      <?php else: ?>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $kas['nominal'] - $kasIt['kas'] ; ?></div>
                                      <?php endif ?>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-dollar-sign fa-2x text-primary"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <?php if ($webVisit['lihat'] > 1): ?>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col mb-4">
                              <div class="card border-left-info shadow h-100 py-2" data-toggle="modal" data-target="#popUpWeb">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pengunjung blog</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $webVisit['lihat']; ?></div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-eye fa-2x text-info"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php else: ?>
                            <?php endif ?>

                        <?php if ($hosting > 1): ?>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col mb-4">
                              <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data hosting</div>
                                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= number_format((get_directory_size('application/views/hosting/user/'. $hosting['folder']) / 1024 / 1024 ) + (get_directory_size('assets/hosting/'. $hosting['folder']) / 1024 / 1024 ), 2) ; ?> / <?= number_format(10000 /1024, 2); ?> MB</div>
                                    </div>
                                    <div class="col-auto">
                                      <i class="fas fa-folder fa-2x text-warning"></i>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <?php else: ?>
                        <?php endif ?>
                     </div>
                 </div>


             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->



             <!-- Modal Absen -->
             <div class="modal fade" id="popUp" tabindex="-1" role="dialog" aria-labelledby="popUpLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpLabel">Data absen <?= $user['name']; ?></h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                        <div class="card-body">
                              <div class="table-responsive">
                              
                                 <table class="table table-bordered" id="datatables2" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Keterangan</th>
                                             <th>Tanggal</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                        <?php $i=1; ?>
                                            <?php foreach ($absen as $m) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $m['keterangan']; ?></td>
                                                    <td><?= $m['time']; ?></td>
                                                </tr>
                                            <?php $i++; ?>
                                         <?php endforeach; ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>



             <!-- Modal Kas -->
             <div class="modal fade" id="popUpKas" tabindex="-1" role="dialog" aria-labelledby="popUpKasLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpKasLabel">Data kas <?= $user['name']; ?></h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                        <div class="card-body">
                              <div class="table-responsive">
                              
                                 <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Nominal</th>
                                             <th>Tanggal</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                        <?php $i=1; ?>
                                            <?php foreach ($kasAll as $kA) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $kA['nominal']; ?></td>
                                                    <td><?= date('d-M-Y ', $kA['waktu']); ?></td>
                                                </tr>
                                            <?php $i++; ?>
                                         <?php endforeach; ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>


             <!-- Modal Web -->
             <div class="modal fade" id="popUpWeb" tabindex="-1" role="dialog" aria-labelledby="popUpWebLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="popUpWebLabel">Data web visit <?= $user['name']; ?></h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                        <div class="card-body">
                              <div class="table-responsive">
                              
                                 <table class="table table-bordered" id="dataWebVisit" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Judul</th>
                                             <th>Kunjungan</th>
                                             <th>Tanggal</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                         </tr>
                                     </tfoot>
                                     <tbody>
                                        <?php $i=1; ?>
                                            <?php foreach ($webData as $wD) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $wD['judul']; ?></td>
                                                    <td><?= $wD['lihat']; ?></td>
                                                    <td><?= date('d M Y', $wD['lihat']); ?></td>
                                                </tr>
                                            <?php $i++; ?>
                                         <?php endforeach; ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

