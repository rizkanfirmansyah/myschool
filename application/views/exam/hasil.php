
    <div class="container-fluid">
      <div class="row">
        <div class="col s12" style="margin-bottom: 50px; width: 100%;">
          <ul class="tabs">
            <li class="tab col m1"></li>
            <li class="tab col m10 text-center"><a><?= $title; ?></a></li>
            <li class="tab col m1"></li>
          </ul>
        </div>
          <div class="row"  id="printCard">
            <div class="col s12 m6 offset-m3">
              <div class="card white darken-1 z-depth-4">
                <div class="card-content white-text">
                  <span class="card-title center black-text">Hasil Ujian</span>
                   <table class="black-text">
                          <thead>
                            <tr>
                                <td>Nama</td>
                                <td><?= $user['name']; ?></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td><?= $input['jurusan']; ?></td>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td>Jumlah Soal</td>
                              <td><?= $input['jumlah_soal']; ?></td>
                            </tr>
                            <tr>
                              <td>Jumlah Benar</td>
                              <td><?= $input['jumlah_benar']; ?></td>
                            </tr>
                            <tr>
                              <td>Jumlah Salah</td>
                              <td><?= $input['jumlah_salah']; ?></td>
                            </tr>
                            <tr>
                              <td>Nilai Kalkulasi</td>
                              <td><?= $input['nilai']; ?>/100</td>
                            </tr>
                          </tbody>

                          <tfoot>
                            <tr style="border:none;">
                            <td colspan="2">
                              <?php if ($input['nilai'] >= $soal['kkm']): ?>
                                <p class="black-text">Selamat, <?= $user['name']; ?> anda berhasil <a class="green-text" style="text-transform: uppercase;">lulus</a> pada ujian <?= $subtitle; ?> dengan memperoleh nilai <?= $input['nilai']; ?>% dari 100% dan memenuhi kriteria kelulusan.</p>
                              <?php elseif($input['nilai'] <= $soal['kkm'] && $input['status'] != 1 && $input['status'] != 2): ?>
                                <p class="black-text">Maaf, <?= $user['name']; ?> anda dinyatakan <a class="red-text" style="text-transform: uppercase;">tidak lulus</a> pada ujian <?= $subtitle; ?> dengan memperoleh nilai <?= $input['nilai']; ?>% dari 100%. Kesempatan anda sudah habis, silahkan hubungi admin untuk mengikuti ujian di lain hari atau memperbaiki nilai.</p>
                              <?php elseif($input['nilai'] <= $soal['kkm']): ?>
                                <p class="black-text">Maaf, <?= $user['name']; ?> anda dinyatakan <a class="red-text" style="text-transform: uppercase;">tidak lulus</a> pada ujian <?= $subtitle; ?> dengan memperoleh nilai <?= $input['nilai']; ?>% dari 100%. Target anda lulus adalah <?= $soal['kkm']; ?>%, kesempatan anda mengikuti tes adalah 1x lagi. Klik <a class="blue-text">REMEDIAL</a> untuk mengulang tes.</p>
                              <?php endif; ?>
                            </td>
                            </tr>
                          </tfoot>
                        </table>
                </div>
                <div class="card-action printAlert" id="printAlert">
                  <?php if (!$input['nilai' ] <= $soal['kkm'] && $input['status'] == 2): ?>
                    <a href="<?= base_url('exam/soal/') . urlencode(base64_encode($soal['id_soal'])). '/' . 'remedial' . '/' . $soal['soal']; ?>" class="blue-text">Remedial</a>
                  <?php elseif($input['nilai'] <= $soal['kkm'] && $input['status'] != 1 && $input['status'] != 2): ?>
                      <a></a>
                  <?php else: ?>
                      <a></a>
                  <?php endif; ?>
                  <?php if ($input['nilai' ] >= $soal['kkm']): ?>
                    <a href="#" class="right green-text">Lulus</a>
                  <?php else: ?>
                    <a href="#" class="right red-text">Tidak Lulus</a>
                  <?php endif ?>
                </div>
              </div>
            <button type="submit" class="btn printTombol" onclick="printDoc()"><i class="fas fa-print"></i> print</button>
            <a href="<?= base_url('member/dashboard'); ?>" type="submit" class="btn printTombol right"><i class="fas fa-home"> </i> Dashboard</a>
            </div>
         </div>

      </div>
    </div>

