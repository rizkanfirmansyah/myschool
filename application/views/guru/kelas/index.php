 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
  <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4" type="button" data-toggle="collapse" data-target="#Kelas" role="button" aria-expanded="false" aria-controls="Kelas">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Absen Siswa</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlsiswa; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4" type="button" data-toggle="collapse" data-target="#Tugas" role="button" aria-expanded="false" aria-controls="Tugas">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tugas</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4" type="button" data-toggle="collapse" data-target="#Materi" role="button" aria-expanded="false" aria-controls="Materi">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Materi</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4"  type="button" data-toggle="collapse" data-target="#Absen" role="button" aria-expanded="false" aria-controls="Absen">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ujian </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ujian; ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


          <!-- <?= $title; ?> -->
          <div class="collapse" id="Kelas">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th rowspan="2" class="align-middle text-center">No</th>
                            <th rowspan="2" class="align-middle text-center">NIS</th>
                            <th rowspan="2" class="align-middle text-center">Nama</th>
                            <th colspan="4" class="text-center">Absensi</th>
                            </tr>
                            <tr>
                            <th class="text-center">Hadir</th>
                            <th class="text-center">Sakit</th>
                            <th class="text-center">Izin</th>
                            <th class="text-center">Alfa</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <?php $i=1;?>
                            <?php foreach($siswa as $s) :?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?= $s['nis'] ?></td>
                                    <td><?= $s['nama'] ?></td>
                                    <td class="text-center"><?= hitung_absen_siswa($s['nis'], $s['kelas_id'], 'hadir') ?></td>
                                    <td class="text-center"><?= hitung_absen_siswa($s['nis'], $s['kelas_id'], 'sakit') ?></td>
                                    <td class="text-center"><?= hitung_absen_siswa($s['nis'], $s['kelas_id'], 'izin') ?></td>
                                    <td class="text-center"><?= hitung_absen_siswa($s['nis'], $s['kelas_id'], 'alfa') ?></td>
                                </tr>
                            <?php $i++;?>
                            <?php endforeach;?>
                        
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
         
          <div class="collapse" id="Tugas">
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
    
         
          <div class="collapse" id="Materi">
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
    
         
          <div class="collapse" id="Absen">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <td>No</td>
                              <td>Nama Ujian</td>
                              <td>Tipe Ujian</td>
                              <td>KKM</td>
                              <td>Selesai</td>
                            </tr>
                            </thead>
                              <?php $i=1; ?>
                              <?php foreach($dataujian as $data):?>
                                <tr>
                                  <td><?= $i ?></td>
                                  <td><?= $data['nama_ujian'] ?></td>
                                  <td><?= $data['tipe_ujian'] ?></td>
                                  <td><?= $data['kkm'] ?></td>
                                  <td><a href="" class="badge badge-sm badge-primary">Lihat Nilai <i class="fas fa-eye"></i></a></td>
                                </tr>
                              <?php $i++?>
                              <?php endforeach;?>
                            <tbody>
                        
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
         

 </div>