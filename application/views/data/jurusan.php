      <!-- Begin Page Content -->
      <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning ml-auto mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <a href="#" class="btn btn-sm btn-success mx-1" data-toggle="modal" data-target="#setPayload"><i class="fas fa-users fa-sm text-white"></i> Set Daya Tampung</a>
            <a href="#" class="btn btn-sm btn-secondary mx-1" data-toggle="modal" data-target="#tambahJurusan"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
            <!-- <a class="btn btn-sm btn-info mx-1 text-white" data-toggle="modal" data-target="#setas-1"><i class="fas fa-users fa-sm text-white"></i> Set As</a>
            <a href="<?= base_url('format/guru'); ?>" class="btn btn-sm btn-danger mx-1" id="formatData" data-text="Apakah anda yakin ingin memformat data guru?"><i class="fas fa-trash-alt fa-sm text-white-50"></i> Format</a>
            <a href="#" class="btn btn-sm btn-success mx-1"  data-toggle="modal" data-target="#modalPoll-1"><i class="fas fa-upload fa-sm text-white-50"></i> Import</a>
            <a href="<?= base_url('export/e_guru'); ?>" class="btn btn-sm btn-primary mx-1"><i class="fas fa-download fa-sm text-white-50"></i> Export</a> -->
          </div>
          
          <!-- Content Row -->
          <div class="row">

            <!-- Jumlah Guru -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Jurusan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-archway fa-2x text-gray-300"></i>
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
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Maks Daya Tampung</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalpayload['payload'];?></div>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Daya Tampung</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= substr($payload['payload']*100/$totalpayload['payload'], 0, 4);?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $payload['payload']*100/$totalpayload['payload'];?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
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
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Kepala Sekolah</div>
                      <div style="font-size:12px; margin-right:-20px;" class="h7 mb-0 font-weight-bold text-gray-800"><?= $kepsek['nama'] ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-school  fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Data Guru -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Jurusan</th>
                      <th>Payload</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i=1;?>
                      <?php foreach($jurusan as $j):?>
                        <tr>
                            <td><?= $i;?></td>
                            <td><?= $j['nama_jurusan'] ?></td>   
                            <td><?= $j['payload'] ?></td>   
                            <td>
                                <a href="#" data-toggle="modal" data-target="#editJurusanData" class="editDataJurusan" data-jurusan="<?= $j['nama_jurusan'] ?>" data-id="<?= $j['jurusan_id'] ?>" data-payload="<?= $j['payload'] ?>"><i class="fas fa-edit text-warning"></i></a> 
                                <a href="<?= base_url('hapus/jurusan/'.$j['jurusan_id']) ?>" id="hapusDataJurusan" data-hapus="<?= $j['jurusan_id'] ?>" class="hapusDataJurusan"><i class="fas fa-trash text-danger"></i></a> 
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
          <?php $this->load->view('data/jurusan/modal_jurusan'); ?>
        </div>
        </div>
        </div>