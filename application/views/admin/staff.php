             <!-- Begin Page Content -->
             <div class="container-fluid">

                   <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning ml-auto mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <a href="<?= base_url('data/format/staff'); ?>" class="btn btn-sm btn-secondary mx-1 " id="formatData" data-text="Apakah anda yakin ingin memformat data user?"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
            <a href="<?= base_url('data/format/staff'); ?>" class="btn btn-sm btn-danger mx-1 " id="formatData" data-text="Apakah anda yakin ingin memformat data user?"><i class="fas fa-trash-alt fa-sm text-white-50"></i> Format</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Jumlah Guru -->
            <div class="col-xl-3 col-md-6 mb-4" data-toggle="modal" data-target="#kesiswaan-1">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kesiswaan</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $bagkesiswaan['nama']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Data lengkap Card Example -->
            <div class="col-xl-3 col-md-6 mb-4"  data-toggle="modal" data-target="#kurikulum-1">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kurikulum</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $bagkurikulum['nama']; ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- TATA USAHA Card Example -->
            <div class="col-xl-3 col-md-6 mb-4"  data-toggle="modal" data-target="#tatausaha-1">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kepala TU</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h8 mb-0 mr-3 font-weight-bold text-gray-800 text-capitalize"><?= $bagtatausaha['nama']; ?></div>
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
            <div class="col-xl-3 col-md-6 mb-4"  data-toggle="modal" data-target="#prasarana-1">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sapras</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize"><?= $bagsarana['nama']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Data Guru -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Staff</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataAdmin" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($staff as $s) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $s['nama'];?></td>
                      <td><?= $s['nama_jabatan'];?></td>
                      <td><?= check_kepala_jabatan($s['kepala_jabatan']);?></td>
                      <td>
                        <a href="" class="fas fa-trash-alt text-danger"></a>
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

  <!-- SCRIPT INCLUDE INTERNAL -->
  <?php $this->load->view('admin/data/staff/staff_modal') ?>

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->