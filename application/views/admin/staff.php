             <!-- Begin Page Content -->
             <div class="container-fluid">

                   <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning ml-auto mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <a href="#" class="btn btn-sm btn-secondary mx-1 " data-toggle="modal" data-target="#tambahStaff"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Staff</a>
            <a href="#" class="btn btn-sm btn-dark mx-1 " data-toggle="modal" data-target="#tambahJabatan"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Jabatan</a>
            <a href="<?= base_url('format/staff'); ?>" class="btn btn-sm btn-danger mx-1 " id="formatData" data-text="Apakah anda yakin ingin memformat data staff?"><i class="fas fa-trash-alt fa-sm text-white-50"></i> Format</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <?php foreach($staffjabatan as $sj) : ?>
              <!-- Jumlah Guru -->
              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $sj['nama_jabatan']?></div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize">
                        <?= staff_jabatan($sj['id_jabatan']); ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <?php if($sj['nama_jabatan'] == 'Kepala Sekolah') : ?>
                      <?php else: ?>
                        <a href="javascript:voip()" data-href="<?= base_url('hapus/jabatan/'.$sj['id_jabatan'])?>" class="hapusDataJabatan"><i class="fas fa-trash fa-2x text-danger"></i></a>
                        <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

          <!-- Data Guru -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Staff</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Wakasek</th>
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
                      <td><?= check_kepala_jabatan($s['kepala_jabatan'], $s['nama_jabatan']);?></td>
                      <td> 
                        <?php if($s['id_jabatan'] == 1) : ?>
                        <?php else: ?>
                          <input type="checkbox" <?= checked_wakasek($s['kepala_jabatan']);?> class="checkedWakasek" data-id="<?= $s['guru_id'] ?>" data-url="<?= base_url('edit/wakasek') ?>" data-href="<?= current_url(); ?>" data-jabatan="<?= $s['jabatan_id'] ?>" >
                          <?php endif; ?>
                        </td>
                      <td>
                        <a href="<?= base_url('hapus/staffjabatan/'. $s['staff_jabatan_id'])?>" class="fas fa-trash-alt text-danger"></a>
                        <a style="cursor: pointer;" class="fas fa-edit text-warning editDataStaffBagian" data-id="<?= $s['guru_id'] ?>" data-nama="<?= $s['nama']?>" data-idjabatan="<?= $s['jabatan_id'] ?>" data-namajabatan="<?= $s['nama_jabatan']?>" data-toggle="modal" data-target="#editStaff"></a>
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