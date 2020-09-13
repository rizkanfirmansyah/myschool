 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
  <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings Card Example
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
  <!-- <div class="col-xl-3 col-md-6 mb-4" type="button" data-toggle="collapse" data-target="#Tugas" role="button" aria-expanded="false" aria-controls="Tugas">
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
  </div> -->

  <!-- Earnings Card Example -->
  <!-- <div class="col-xl-3 col-md-6 mb-4" type="button" data-toggle="collapse" data-target="#Materi" role="button" aria-expanded="false" aria-controls="Materi">
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
  </div> -->

  <!-- Earnings Card Example -->
  <!-- <div class="col-xl-3 col-md-6 mb-4"  type="button" data-toggle="collapse" data-target="#Absen" role="button" aria-expanded="false" aria-controls="Absen">
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
  </div>  -->
</div>


<div class="card shadow mb-4">
                  <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered table-sm" id="datatable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <td>No</td>
                              <td>Nama Siswa</td>
                              <td>Nama Mapel</td>
                              <td>KKM</td>
                              <td>Jumlah Benar</td>
                              <td>Jumlah Salah</td>
                              <td>Nilai</td>
                            </tr>
                            </thead>
                              <?php $i=1; ?>
                              <?php foreach($nilaiujian as $data):?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?= $data['nama']?></td>
                                    <td><?= $dataujian['nama_mapel'] ?></td>
                                    <td><?= $dataujian['kkm'] ?></td>
                                    <td><?= $data['jumlah_benar'] ?></td>
                                    <td><?= $data['jumlah_salah'] ?></td>
                                    <td><?= $data['nilai'] ?></td>
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