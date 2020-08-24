$(document).ready(function() {

    $('.checkedWakasek').on('change', function(){
        const id = $(this).data('id');
        const url = $(this).data('url');
        const href = $(this).data('href');
        const jabatan = $(this).data('jabatan');
        // alert(href);
        // alert(id);
        // alert(url);
        // alert(jabatan);
        $.ajax({
            type:'POST',
            url:url,
            data:{
                id:id,
                jabatan:jabatan,
         },
            success: function() {
                document.location.href = href;
            },
            error:function(){
                swal('ERROR 502', 'error kode : 502 ', 'error');
            }
        });
    });

    $('.tambahInputDataStaff').on('click', function(e){
        e.preventDefault();
        const jabatan = $('#posisiStaffJabatan').val();
        const guru = $('#posisiGuruJabatan').val();
        const href = $('#urlInputStaff').val();
        const url = $('form.formStaffJabatan').attr('action');

        // alert(jabatan);
        // alert(href);

        $.ajax({
            type:'POST',
            url:url,
            data:{
                guru:guru,
                jabatan:jabatan
            },
            success:function()
            {
                document.location.href = href;
            },
            error:function()
            {
                swal('ERROR', '502 internal Server Error or 404 Not Found', 'error');
            }
        });

    });

    $('.hapusDataJabatan').on('click', function(){
        const href = $(this).data('href');

        // alert(href);
        swal({
            title: "Apa anda yakin?",
            text: 'Ketik OK untuk menghapus data jabatan ini!',
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                document.location.href = href;   
            } else {
              swal("Info", 'Tidak jadi dihapus data jabatan aman', 'info');
            }
          });
    });

    $('.editDataStaffBagian').on('click', function(){
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const idjabatan = $(this).data('idjabatan');
        const namajabatan = $(this).data('namajabatan');

        $('.posisiStaff').val(idjabatan);
        $('.posisiStaff').text(namajabatan);
        $('.pilihStaffGuru').val(id);
        $('.pilihStaffGuru').text(nama);
    });

    $('.editInputDataStaff').on('click', function(e){
        e.preventDefault();
        // const coba = $('.posisiStaff').val();
        const posisi = $('.posisiJabatanStaff').val();
        const guru = $('.pilihStaffGuru').val();
        const url = $('.formEditStaffJabatan').attr('action');
        const href = $('#urlEditInputStaff').val();

        // alert(posisi);
        
        $.ajax({
            type:'POST',
            url:url,
            data:{
                jabatan_id:posisi,
                guru_id:guru,
            },
            success:function()
            {
                // swal('SUKSES', 'Data Staff berhasil ditambahkan', 'success');
                document.location.href = href;
            },
            error:function()
            {
                swal('ERROR', '502 internal Server Error or 404 Not Found', 'error');
            }
        });
    });

});