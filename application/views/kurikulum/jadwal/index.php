      <!-- Begin Page Content -->
      <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning ml-auto mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <a href="#" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#tambahJadwal"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
          </div>
          
          <!-- Content Row -->
          <div class="row">

            <!-- Jumlah Guru -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tanggal</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= date('d-M-Y H:i');?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Data lengkap Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Data Ruangan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ruangan;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Data Guru Sertifikasi Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Kelas</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $kelas;?></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Guru</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $guru; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-school  fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Data Kelas -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Pelajaran</th>
                      <th>Nama Guru</th>
                      <th>Kelas</th>
                      <th>Ruangan</th>
                      <th>Jam Masuk</th>
                      <th>Jam keluar</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i=1;?>
                      <?php foreach($all as $k):?>
                        <tr>
                            <td><?= $i;?></td>
                            <td><?= $k['nama_mapel'] ?></td>   
                            <td class="text-capitalize"><?= $k['nama'] ?></td>   
                            <td><?= $k['nama_kelas'] ?></td>   
                            <td><?= $k['nama_ruangan'] ?></td>   
                            <td><?= $k['jam_masuk'] ?></td>   
                            <td><?= $k['jam_keluar'] ?></td>   
                            <td><?= status_jadwal($k['jadwal_status']) ?></td>   
                            <td>
                                <!-- <a href="<?= base_url('hapus/kelas/') ?>" id="hapusDataKelas" data-hapus="<?= $k['kelas_id'] ?>" class="hapusDataKelas"><i class="fas fa-trash text-danger"></i></a>  -->
                            </td>   
                        </tr>
                        <?php $i++;?>
                      <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <!-- SCRIPT INCLUDE INTERNAL -->
          <?php $this->load->view('kurikulum/jadwal/modal_jadwal'); ?>
        </div>
        </div>
        </div>