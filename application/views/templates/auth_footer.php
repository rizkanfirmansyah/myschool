
  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/vendor/');?>sweetalert/sweetalert.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/myscript.js"></script>

  <script>
    $(document).ready(function(){
			$('i').on('click', function(){
				$(this).toggleClass('hideShow')
				if($(this).hasClass('hideShow')){
					$(this).removeClass('fa-eye-slash')
					$(this).addClass('fa-eye')
					$(this).prev().attr('type', 'text')
				}else{
					$(this).removeClass('fa-eye')
					$(this).addClass('fa-eye-slash')
					$(this).prev().attr('type', 'password')
				}
			})
    })
  </script>

</body>

</html>