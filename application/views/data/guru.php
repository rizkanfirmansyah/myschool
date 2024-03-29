      <!-- Begin Page Content -->
      <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
            <a href="<?= current_url(); ?>" class="btn btn-sm btn-warning ml-auto mx-1"><i class="fas fa-recycle fa-sm text-white-50"></i> Refresh</a>
            <a href="#" class="btn btn-sm btn-secondary mx-1"  data-toggle="modal" data-target="#tambah-guru-1"><i class="fas fa-plus fa-sm text-white"></i> Tambah Data</a>
            <a href="<?= base_url('format/guru'); ?>" class="btn btn-sm btn-danger mx-1" id="formatData" data-text="Apakah anda yakin ingin memformat data guru?"><i class="fas fa-trash-alt fa-sm text-white-50"></i> Format</a>
            <a href="#" class="btn btn-sm btn-success mx-1"  data-toggle="modal" data-target="#modalPoll-1"><i class="fas fa-upload fa-sm text-white-50"></i> Import</a>
            <a href="<?= base_url('export/e_guru'); ?>" class="btn btn-sm btn-primary mx-1"><i class="fas fa-download fa-sm text-white-50"></i> Export</a>
          </div>
          
          <!-- Content Row -->
          <div class="row">

            <!-- Jumlah Guru -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Guru</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Data Guru Sertifikasi Card Example -->
            <div class="col-xl-3 col-md-6 mb-4"  data-toggle="tooltip" data-placement="top" title="<?= value_cert() ?> Guru Tersertifikasi">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Guru Sertifikasi</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= floor(cert_guru_aktif($jml)) ?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= cert_guru_aktif($jml) ?>%" aria-valuenow="<?= value_cert() ?>" aria-valuemin="0" aria-valuemax="<?= $jml; ?>"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-certificate fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            <!-- Data Guru Sertifikasi Card Example -->
            <div class="col-xl-3 col-md-6 mb-4"  data-toggle="tooltip" data-placement="top" title="<?= guru_pns_cek() ?> Guru PNS & <?= guru_honorer_cek()?> Guru Honorer">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Status Guru</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h7 mb-0 mr-3 font-weight-bold text-gray-800" style="font-size: 10px;">
                            <i class="fas fa-circle text-success"> PNS</i><br>
                            <i class="fas fa-circle text-warning"> Honorer</i>
                          </div>
                        </div>
                        <div class="col">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?= guru_pns_cek()*100/$jml?>%" aria-valuenow="<?= guru_pns_cek()?>" aria-valuemin="0" aria-valuemax="<?= $jml; ?>"></div>
                          <?php
                            if($jml == 0){
                              $idd =1 ;
                          }else{
                              $idd = $jml;
                          }
                          ?>
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= guru_honorer_cek()*100/$idd ?>%" aria-valuenow="<?= guru_honorer_cek() ?>" aria-valuemin="0" aria-valuemax="<?= $jml; ?>"></div>
                          </div>
                        </div>
                      </div>
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
                      <th>NIP/NUPTK</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <!-- <th>Jurusan</th> -->
                      <th>Lulusan</th>
                      <th>Awal Mengajar</th>
                      <th>Bergabung</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($guru as $g):?>
                      <tr>
                        <td><?= $g['nip']?></td>
                        <td><?= $g['nama_guru']?></td>
                        <td><?= $g['alamat']?></td>
                        <td><?= $g['lulusan']?></td>
                        <td><?= $g['tahun_ajar_awal']?></td>
                        <td><?= $g['date_created']?></td>
                        <td><?= $g['status_guru']?></td>
                        <td>
                          <a href="<?= base_url('edit/guru/'.$g['id']) ?>" class="text-warning"><i class="fas fa-edit"></i></a>
                          <a href="<?= base_url('hapus/guru/'.$g['id']);?>" class="text-danger"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- SCRIPT INCLUDE INTERNAL -->
          <?php $this->load->view('data/guru/modal_guru'); ?>
        </div>
        </div>
        </div>