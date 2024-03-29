             <!-- Begin Page Content -->
             <div class="container-fluid">

                   <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning ml-auto mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <a href="<?= base_url('akses/user/aktif'); ?>" class="btn btn-sm btn-success mx-1 " ><i class="fas fa-check fa-sm text-white-50"></i> Jadikan Aktif</a>
            <a href="<?= base_url('akses/user/inaktif'); ?>" class="btn btn-sm btn-danger mx-1 " ><i class="fas fa-times fa-sm text-white-50"></i> Jadikan Tidak Aktif</a>
            <a href="<?= base_url('format/user'); ?>" class="btn btn-sm btn-danger mx-1 " id="formatData" data-text="Apakah anda yakin ingin memformat data users?"><i class="fas fa-trash-alt fa-sm text-white-50"></i> Format</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <?php foreach($segmentuser as $sr) : ?>
              <!-- Jumlah Guru -->
              <!-- href="#<?= $sr['role'] ?>" role="button" aria-expanded="false" aria-controls="<?= $sr['role'] ?>" -->
              <div class="col-xl-3 col-md-6 mb-4" data-toggle="collapse" >
              <div class="card border-left-<?= functionwarna($sr['role']) ?> shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-<?= functionwarna($sr['role']) ?> text-uppercase mb-1"><?= $sr['role']?></div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize">
                        <?= count_user($sr['role_id']); ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="javascript:voip()"><i class="fas fa-users fa-2x text-<?= functionwarna($sr['role']) ?>"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <div class="col-xl-3 col-md-6 mb-4" data-toggle="collapse" href="#aktif" role="button" aria-expanded="false" aria-controls="aktif">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">User Aktif</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize">
                      <?= $aktif ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="javascript:voip()"><i class="fas fa-users fa-2x text-success"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4" data-toggle="collapse" href="#tidakaktif" role="button" aria-expanded="false" aria-controls="tidakaktif">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">User Tidak Aktif</div>
                      <div class="h8 mb-0 font-weight-bold text-gray-800 text-capitalize">
                      <?= $inaktif ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="javascript:voip()"><i class="fas fa-users fa-2x text-danger"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Data Guru -->
          <div class="card shadow mb-4 collapse" id="siswa">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title;?> Siswa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($siswa as $s) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $s['username'];?></td>
                      <td><?= $s['nama'];?></td>
                      <td><?= $s['email'];?></td>
                      <td><?= $s['role'];?></td>
                      <td>
                        <?= function_status($s['status_user'], $s['user_id']) ?>
                      </td>
                      <td>
                        <a href="<?= base_url('hapus/user/'. $s['user_id'])?>" class="fas fa-trash-alt text-danger"></a>
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

          <!-- Data Guru -->
          <div class="card shadow mb-4 collapse" id="guru">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title;?> Guru</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($guru as $s) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $s['username'];?></td>
                      <td><?= $s['nama'];?></td>
                      <td><?= $s['email'];?></td>
                      <td><?= $s['role'];?></td>
                      <td>
                        <?= function_status($s['status_user'], $s['user_id']) ?>
                      </td>
                      <td>
                        <a href="<?= base_url('hapus/user/'. $s['user_id'])?>" class="fas fa-trash-alt text-danger"></a>
                        <!-- <a href="" class="fas fa-edit text-warning"></a> -->
                      </td>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



          <!-- Data User Aktif -->
          <div class="card shadow mb-4 collapse" id="aktif">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title;?> Aktif</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($useraktif as $s) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $s['username'];?></td>
                      <td><?= nama_user_check($s['nama']);?></td>
                      <td><?= $s['email'];?></td>
                      <td><?= $s['role'];?></td>
                      <td>
                        <?= function_status($s['status_user'], $s['user_id']) ?>
                      </td>
                      <td>
                        <a href="<?= base_url('hapus/user/'. $s['user_id'])?>" class="fas fa-trash-alt text-danger"></a>
                        <!-- <a href="" class="fas fa-edit text-warning"></a> -->
                      </td>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>



          <!-- Data User Tidak Aktif -->
          <div class="card shadow mb-4 collapse" id="tidakaktif">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title;?> Tidak Aktif</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable3" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1;?>
                    <?php foreach($userinaktif as $s) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $s['username'];?></td>
                      <td><?= nama_user_check($s['nama']);?></td>
                      <td><?= $s['email'];?></td>
                      <td><?= $s['role'];?></td>
                      <td>
                        <?= function_status($s['status_user'], $s['user_id']) ?>
                      </td>
                      <td>
                        <a href="<?= base_url('hapus/user/'. $s['user_id'])?>" class="fas fa-trash-alt text-danger"></a>
                        <!-- <a href="" class="fas fa-edit text-warning"></a> -->
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

             </div>
             <!-- /.container-fluid -->

             </div>
             <!-- End of Main Content -->