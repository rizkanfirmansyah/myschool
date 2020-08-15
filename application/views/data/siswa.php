    <!-- Begin Page Content -->
    <div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning ml-auto mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <a href="<?= base_url('format/statususer') ?>" class="btn btn-sm btn-info mx-1"><i class="fas fa-user-circle fa-sm text-white-50"></i> Jadikan User</a>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#inputDataSiswa"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
            <a href="<?= base_url('format/siswa'); ?>" class="btn btn-sm btn-danger mx-1 " id="formatData" data-text="Apakah anda yakin ingin memformat data user?"><i class="fas fa-trash-alt fa-sm text-white-50"></i> Format</a>
            <a href="#" class="btn btn-sm btn-success mx-1"  data-toggle="modal" data-target="#siswa-1"><i class="fas fa-upload fa-sm text-white-50"></i> Import</a>
            <a href="<?= base_url('export/e_siswa'); ?>" class="btn btn-sm btn-primary mx-1"><i class="fas fa-download fa-sm text-white-50"></i> Export</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Jumlah Guru -->
            <div class="col-xl-3 col-md-6 mb-4" data-toggle="modal" data-target="#jurusan-1">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">jurusan siswa</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $jurusan; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Data lengkap Card Example -->
            <div class="col-xl-3 col-md-6 mb-4"  data-toggle="modal" data-target="#kelas-1">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">kelas siswa</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $kelas; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- TATA USAHA Card Example -->
            <div class="col-xl-3 col-md-6 mb-4" data-toggle="modal" data-target="#angkatan-1">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">siswa angkatan</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h8 mb-0 mr-3 font-weight-bold text-gray-800 text-capitalize"><?= $angkatan;?> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4"  data-toggle="modal" data-target="#jml-siswa-1">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">jumlah siswa</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $jml_siswa; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Data Guru -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data siswa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>NIS</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <!-- <th>Alumni</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($siswa as $s) : ?>
                    <tr>
                      <td class="text-capitalize"><?= $i; ?></td>
                      <td class="text-capitalize"><?= $s['nama'];?></td>
                      <td class="text-capitalize"><?= $s['nis'];?></td>
                      <td class="text-capitalize"><?= $s['nama_kelas'];?></td>
                      <td class="text-capitalize"><?= $s['nama_jurusan'];?></td>
                      <!-- <td><input type="checkbox" checked data-toggle="toggle" data-status=""></td> -->
                      <td>
                        <a href="<?= base_url('hapus/siswa/'.$s['id']);?>" data-id="<?= $s['id'] ?>" class="fas fa-trash-alt text-danger hapusDataSiswa"></a>
                        <a href="" class="fas fa-edit text-warning"></a>
                      </td>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
            </div>
            </div>
            
            <!-- SCRIPT INCLUDE INTERNAL -->
            <?php $this->load->view('data/siswa/modal_siswa')?>
  