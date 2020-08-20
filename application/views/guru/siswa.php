 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
  <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">

 <?php foreach($absen as $a):?>
  <!-- Earnings Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-<?= warna_absen($a['keterangan']) ?> shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-<?= warna_absen($a['keterangan']) ?> text-uppercase mb-1"><?= $a['keterangan'] ?></div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $a['jml'] ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php endforeach;?>

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
                      <td><?= $i; ?></td>
                      <td><?= $s['nis'] ?></td>
                      <td><?= $s['nama_siswa'] ?></td>
                      <td class="text-center"><input type="checkbox" class="absensiSiswa" <?= absen_siswa('hadir', $s['nis'], $s['id_mapel']) ?> name="absensi" data-url="<?= base_url('input/absen') ?>" data-href="<?= current_url() ?>" data-mapel="<?= $s['id_mapel'] ?>" data-nis="<?= $s['nis'] ?>" data-kelas="<?= $s['kelas_id'] ?>" value="hadir"></td>
                      <td class="text-center"><input type="checkbox" class="absensiSiswa" <?= absen_siswa('sakit', $s['nis'], $s['id_mapel']) ?> name="absensi" data-url="<?= base_url('input/absen') ?>" data-href="<?= current_url() ?>" data-mapel="<?= $s['id_mapel'] ?>" data-nis="<?= $s['nis'] ?>" data-kelas="<?= $s['kelas_id'] ?>" value="sakit"></td>
                      <td class="text-center"><input type="checkbox" class="absensiSiswa" <?= absen_siswa('izin', $s['nis'], $s['id_mapel']) ?> name="absensi" data-url="<?= base_url('input/absen') ?>" data-href="<?= current_url() ?>" data-mapel="<?= $s['id_mapel'] ?>" data-nis="<?= $s['nis'] ?>" data-kelas="<?= $s['kelas_id'] ?>" value="izin"></td>
                      <td class="text-center"><input type="checkbox" class="absensiSiswa" <?= absen_siswa('alfa', $s['nis'], $s['id_mapel']) ?> name="absensi" data-url="<?= base_url('input/absen') ?>" data-href="<?= current_url() ?>" data-mapel="<?= $s['id_mapel'] ?>" data-nis="<?= $s['nis'] ?>" data-kelas="<?= $s['kelas_id'] ?>" value="alfa"></td>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>



 </div>