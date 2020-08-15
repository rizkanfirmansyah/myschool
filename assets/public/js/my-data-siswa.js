$(document).ready(function(){
    $('.hapusDataSiswa').on('click', function(e){
        e.preventDefault();
        const url = $(this).attr('href');
        const id = $(this).data('id');

        $.ajax({
            type:'POST',
            url:url,
            data:{
                id:id
            },
            success:function(){
                swal('Sukses', 'Data berhasil dihapus', 'success');
            },
            error:function() {
                swal('Gagal', 'Data gagal dihapus', 'error');
            }
        });
    });
});