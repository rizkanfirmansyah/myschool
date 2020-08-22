<?php $this->load->view('templates/copyright');?>
<?php   
    $datatema = $this->db->get_where('tb_developer', ['setting' => 'tema'])->row_array();
    $theme =  $datatema['parameter'];
    $header = $this->db->get_where('data_homepage', ['jenis' => 'footer'])->row();
    $title_header = $header->judul;
 ?>
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top bg-<?= $theme; ?> rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/plugin'); ?>

<!-- =============================================================DATATABLES========================================================= -->
<script>

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });

    $('.checkbox-sosmed').on('click', function() {
        const keterangan = $(this).data('keterangan');
        const judul = $(this).data('judul');
        const id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: "<?= base_url('update/sosmed'); ?>",
            type: 'post',
            data: {
                judul: judul,
                id: id,
                keterangan: keterangan
            },
            success: function() {
                document.location.href = "<?= base_url('profile/homepage/'); ?>";
            }
        });
    });

</script>


        <script>
          $(document).ready(function() {
         // Profile Homepage
                 $('#edit-data').on('show.bs.modal', function (event) {
                     var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                     var modal          = $(this)

                     var icon = div.data('icon');
                     var keterangan = div.data('keterangan');
                     var gambar = div.data('gambar');
                     if (icon == undefined) {
                        modal.find('#icon').hide();
                     }
                     if (keterangan == undefined) {
                        modal.find('#keterangan').hide();
                     }
                     if (gambar == undefined) {
                        modal.find('#gambar').hide();
                     }
                     // Isi nilai pada field
                     modal.find('#id').attr("value",div.data('id'));
                     modal.find('#judul').attr("value",div.data('judul'));
                     modal.find('#deskripsi').html(div.data('deskripsi'));
                     modal.find('#keterangan').html(div.data('keterangan'));
                     modal.find('#gambar').html(div.data('gambar'));
                     modal.find('#icon').attr("value",div.data('icon'));
                 });

             });


                 $('#submit-data-slider').on('click', function(e){
                    e.preventDefault();
                    const id = $('#id').val();
                    const judul = $('#judul').val();
                    const deskripsi = $('#deskripsi').val();
                    const keterangan = $('#keterangan').val();
                    const icon = $('#icon').val();
                    const gambar = $('#gambar').val();

                    console.log(icon);

                     $.ajax({
                        url: "<?= base_url('update/slider'); ?>",
                        type: 'post',
                        data: {
                            id: id,
                            judul: judul,
                            deskripsi: deskripsi,
                            icon:icon,
                            gambar:gambar,
                            keterangan:keterangan
                        },
                        success: function() {
                            document.location.href = "<?= base_url('profile/homepage/'); ?>";
                        }
                 });
            });

        </script>

        <script>
          //check all checkbox
            $(document).ready(function(){ 
            // $(".hapus-siswa-item").hide();
              $("#check-all").click(function(){ 
              if($(this).is(":checked")){
                $(".check-item").prop("checked", true);
              }else{
                $(".check-item").prop("checked", false);
              }
            }); 

              $(".check-item").on('click', function(){
                 const siswaId = $(this).data('siswa');
                 console.log(siswaId);
              });
        });
        </script>

        <script>
          //password check
          $(document).ready(function(){
              $('#passwordSiswaCheck').hide();
              $("#checkboxSiswaCheck").click(function(){
                  const checked = $(this).is(':checked');
                  if (checked) {
                    $('#passwordSiswaCheck').show();
                  }else{
                    $('#passwordSiswaCheck').hide();
                  }
              });
           });
        </script>
<!-- =============================================================DATATABLES========================================================= -->


</body>

</html>