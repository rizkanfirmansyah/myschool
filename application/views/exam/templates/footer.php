
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