$(document).ready(function(){

    $('#mulaiUjianSiswa').on('click', function(){
        var cek = $('#checkujian').val();
        var kode = $('#code_auth_ujian').val();

        if(cek != 'Saya siap melaksanakan ujian'){
            swal('ERROR', 'Pesan tidak sama, mohon ketik ulang','error');
        }else{
            swal('SUKSES', 'Pesan sama','success');
        }
    })

    $('#dataSiswaUjian').on('click', function(){
        var nis = $('#nis_siswa').val();
        alert(nis);
    })

    $('#id_siswa_ujian').on('click', function(){
        var nis = $('#nis_siswa').val();
        alert(nis);
    })
    

});