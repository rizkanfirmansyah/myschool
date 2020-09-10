 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
  <a href="<?= base_url('guru') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sign-out-alt fa-sm text-white-50"></i> Kembali</a>
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlsiswa; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sudah mengerjakan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlsiswamengerjakan; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php foreach($siswamengerjakan as $siswa) : ?>
  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-<?= function_selesai_warna($siswa['selesai']) ?> shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-<?= function_selesai_warna($siswa['selesai']) ?> text-uppercase mb-1"><?= function_selesai($siswa['selesai']) ?></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswa['jmlselesai']; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>


</div>
  
          <!-- <?= $title; ?> -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Pengerjaan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <?php $i=1;?>
                            <?php foreach($siswakelas as $s) :?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?= $s['nama'] ?></td>
                                    <td><?= $s['tgl_pengumpulan']?></td>
                                    <td><?= function_status_materi_siswa($s['selesai'])?></td>
                                </tr>
                            <?php $i++;?>
                            <?php endforeach;?>
                        
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
         
          <div class="collapse" id="Absen">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            
                            </thead>
                            
                            <tbody>
                        
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
         

 </div>
