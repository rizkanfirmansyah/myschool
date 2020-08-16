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
</head>

<body>


  <form action="<?= base_url('exam/submit/').urlencode(base64_encode($id_soal)). '/' .$type_soal; ?>" method="post">
    <div class="container-fluid">
      <div class="row">

        <div class="col s12" style="margin-bottom: 50px; width: 100%;">
          <ul class="tabs">
            <li class="tab col m1"></li>
            <li class="tab col m10 text-center"><a>Ujian <?= $title; ?></a></li>
            <li class="tab col m1"></li>
          </ul>
        </div>
        <div class="row">
        <?php $i=1; ?>
          <?php foreach ($soal as $s): ?>
            <div id="<?= $s['id_pg']; ?>" class="col s13"> <p class="flow-text"><?= $i; ?>. <?= $s['soal']; ?></p>
              <?php 
                  $jawab = ['a','b','c','d'];
               ?>
               <?php foreach ($jawab as $j): ?>
                    <p>
                      <label>
                        <?php if ($s['jawaban'] == $j): ?>
                          <input name="soal<?= $i; ?>" type="radio" value="<?= base64_encode('1.'.mt_rand(9999999999999999, 999999999999999999)); ?>" />
                        <?php else: ?>
                          <input name="soal<?= $i; ?>" type="radio" value="<?= base64_encode('0.'.mt_rand(9999999999999999, 999999999999999999)); ?>" />
                        <?php endif ?>
                        <span> <?= $s[$j]; ?></span>
                      </label>
                    </p>
               <?php endforeach; ?>
              </div>
            <?php $i++; ?>
        <?php endforeach; ?>        
        </div>

         <div class="col s12">
          <ul class="tabs">
            <li class="tab col m1 s2"><button class="waves-effect waves-teal btn-flat pink-text lighten-5" name="submit" value="kembali" type="submit">Back</button></li>
            <?php $i=1; ?>
              <?php foreach ($soal as $s): ?>
                <?php if ($jumlah_soal==10): ?>
                  <li class="tab col m1"><a href="#<?= $s['id_pg']; ?>"><?= $i; ?></a></li>
                <?php elseif ($jumlah_soal==5): ?>
                  <li class="tab col m2"><a href="#<?= $s['id_pg']; ?>"><?= $i; ?></a></li>
                <?php else: ?>
                  <li class="tab col"><a href="#<?= $s['id_pg']; ?>"><?= $i; ?></a></li>
                <?php endif ?>
              <?php $i++; ?>
            <?php endforeach; ?>
            <li class="tab col m1 s2"><button class="waves-effect waves-teal btn-flat pink-text lighten-5" name="submit" value="submit" type="submit">Submit</button></li>
          </ul>
        </div>
      </div>
    </div>
  </form>


  <!--  Scripts-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.js"></script>
  <script src="<?= base_url('assets/'); ?>js/materialize.js"></script>
  <script src="<?= base_url('assets/'); ?>js/init.js"></script>
  <script src="<?= base_url('assets/'); ?>js/script.js"></script>


  </body>
</html>
