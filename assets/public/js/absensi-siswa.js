$(document).ready(function(){
    $('.absensiSiswa').on('click', function(){
        const absen = $(this).val();
        const nis = $(this).data('nis');
        const href = $(this).data('href');
        const mapel = $(this).data('mapel');
        const kelas = $(this).data('kelas');
        const url = $(this).data('url');
        
        $.ajax({
            type:'POST',
            url:url,
            data :{
                nis:nis,
                mapel:mapel,
                absen:absen,
                kelas:kelas,
            },
            success:function(){
                document.location.href=href;
            },
            error:function(){
                swal('Error', '404 Not Found & 502 Internal Server Error', 'error');
            }
        });
    }) ;
});