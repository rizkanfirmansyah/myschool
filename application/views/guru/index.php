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
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kelas</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlkelas; ?></div>
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
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Absen Hari Ini</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
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
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Jumlah Siswa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            
                        <tbody>
                            <?php $i=1;?>
                            <?php foreach($kelas as $k) :?>
                                <tr>
                                    <td><?= $i;?></td>
                                    <td><?= $k['nama_kelas'] ?></td>
                                    <td><?= hitung_siswa($k['id_kelas'])?></td>
                                    <td><a href="<?= base_url('guru/kelas/'.$k['id_kelas']) ?>" class="btn btn-sm btn-primary">Detail</a></td>
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