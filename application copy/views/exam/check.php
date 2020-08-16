<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?= $title; ?></title>

  <!-- CSS  -->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/'); ?>font/font.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?= base_url('assets/'); ?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- <link href="<?= base_url('assets/'); ?>css/add.css" type="text/css" rel="stylesheet" media="screen,projection"/> -->
</head>

<body>

    <div class="container-fluid">
      <div class="row">
        <div class="col s12" style="margin-bottom: 50px; width: 100%;">
          <ul class="tabs">
            <li class="tab col m12 text-center"><a><?= $title; ?></a></li>
          </ul>
        </div>
          <div class="row"  id="printCard">
            <div class="col s12 m6 offset-m3">
              <div class="card white darken-1 z-depth-4">
                <div class="card-content white-text">
                  <span class="card-title center black-text">Identitas Anggota</span>
                   <table class="black-text">
                          <thead>
                            <tr>
                                <td>Nama</td>
                                <td><?= $user['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td><?= $soal['jurusan']; ?></td>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td>Soal</td>
                              <td><?= $soal['soal']; ?> (<?= $soal['bab']; ?>)</td>
                            </tr>
                            <tr>
                              <td>Jumlah Soal</td>
                              <td><?= $ujian; ?></td>
                            </tr>
                            <tr>
                              <td>KKM</td>
                              <td><?= $soal['kkm']; ?></td>
                            </tr>
                            <tr>
                              <td>Tanggal & Waktu</td>
                              <td><?= date('d-M-Y, H:i'); ?></td>
                            </tr>
                            <tr>
                              <td>Pengajar</td>
                              <td><?= $pengajar['pengajar']; ?> (<?= $soal['id_pengajar']; ?>)</td>
                            </tr>
                          </tbody>

                          <tfoot>
                            <tr style="border:none;">
                            <td colspan="2">
                              <?= $soal['deskripsi']; ?>
                            </td>
                            </tr>
                          </tfoot>
                        </table>
                </div>
                <div class="card-action">
                  <div class="row">
                      <?php if ($check['nilai' ] <= $soal['kkm'] && $check['status'] == 2): ?>
                        <a href="<?= base_url('exam/soal/') . urlencode(base64_encode($soal['id_soal'])). '/' . 'remedial' . '/' . $soal['soal']; ?>" class="yellow-text  right">Remedial</a>
                      <?php elseif($check < 1): ?>
                           <a class="green-text  right" href="<?= base_url('exam/soal/') . urlencode(base64_encode($soal['id_soal'])). '/' . 'kompetensi' .  '/' . $soal['soal']; ?>">Kerjakan</a>
                      <?php elseif ($check['nilai' ] <= $soal['kkm'] && $check['status'] == 0) : ?>
                          <a class="red-text right">Tidak Lulus</a>
                      <?php elseif($check['nilai'] >= $soal['kkm'] && $check['status'] == 1): ?>
                          <a class="green-text right">Lulus</a>
                      <?php endif; ?>
                  </div>
                </div>
              </div>
            <button type="submit" class="btn printTombol" onclick="printDoc()"><i class="fas fa-print"></i> print</button>
            <a href="<?= base_url('member/dashboard'); ?>" type="submit" class="btn printTombol right"><i class="fas fa-home"> </i> Dashboard</a>
            </div>
         </div>

      </div>
    </div>


  <!--  Scripts-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.js"></script>
  <script src="<?= base_url('assets/'); ?>js/materialize.js"></script>
  <script src="<?= base_url('assets/'); ?>js/init.js"></script>
  <script src="<?= base_url('assets/'); ?>js/script.js"></script>

<script>


// Print Data
    function printDoc() {
      var toPrint = document.getElementById('printCard');
      var popupWin = window.open(''); 

      popupWin.document.open();
      popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://192.168.43.175/itclub/assets/vendor/fontawesome-free/css/all.min.css" /> </head><body onload="window.print()">');
      popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://192.168.43.175/itclub/assets/font/font.css" /></head><body onload="window.print()">');
      popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://192.168.43.175/itclub/assets/css/materialize.min.css" /></head><body onload="window.print()">');
      popupWin.document.write('<html><link rel="stylesheet" type="text/css" href="http://192.168.43.175/itclub/assets/css/add.css" /></head><body onload="window.print()">');
      popupWin.document.write('</html>');
      popupWin.document.write(toPrint.outerHTML);
      popupWin.document.close(); 
    }
</script>

  </body>
</html>
