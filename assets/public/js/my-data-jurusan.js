$(document).ready(function(){
    $('#simpanDataJurusan').on('click', function(e){
        e.preventDefault();
        const nama = $('#namaJurusan').val();
        const payload = $('#payloadJurusan').val();
        const href = $('#simpanJurusanData').val();
        const url = $('#formInputJurusan').attr('action');

        // swal(nama, payload);
        $.ajax({
            type:'POST',
            url:url,
            data:{
                nama:nama,
                payload:payload
            },
            success: function() {
                document.location.href = href;
            },error: function () {
                swal('Gagal', 'input data gagal', 'error');
            }
        });
    });
    $('.hapusDataJurusan').on('click', function(e){
        e.preventDefault();
        const url = $('#hapusDataJurusan').attr('href');
        const hapus = $(this).data('hapus');
        const href = $('#simpanJurusanData').val();
        // alert('oke');

// alert(data);        
        swal({
            title:'Apakah anda yakin?',
            text: 'Apakah anda ingin menghapus jurusan ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type:'POST',
                    url:url,
                    data:{
                        hapus:hapus
                    },
                    success: function() {
                        swal('Sukses', 'Hapus data sukses', 'success');
                        document.location.href = href;
                    },error: function () {
                        swal('Gagal', 'Hapus data gagal', 'error');
                    }
                }); 
            } else {
              swal("Allhamdulillah",'Tidak jadi hapus, data masih terdaftar di database!', 'info');
            }
         });
    });

    $('.editDataJurusan').on('click', function(e){
        e.preventDefault();
        const jurusan = $(this).data('jurusan');
        const payload = $(this).data('payload');
        const id = $(this).data('id');
        // alert(payload);
        
        $('#jurusanID').val(id);
        $('#jurusanNama').val(jurusan);
        $('#jurusanPayload').val(payload);

    });

    $('#simpanJurusanData').on('click', function(e){
        e.preventDefault();
        const url = $('#formEditJurusan').attr('action');
        const href = $('#simpanJurusanData').val();
        const jurusan = $('#jurusanNama').val();
        const payload = $('#jurusanPayload').val();
        const ID = $('#jurusanID').val();
        // console.log(href);

        $.ajax({
            type:'POST',
            url:url,
            data:{
                jurusan:jurusan,
                payload:payload,
                href:href,
                id:ID
            },
            success:function(){
                swal('Sukses', 'Data berhasil dirubah', 'success');
                document.location.href = href;
            },
            error:function(){
                swal('Gagal', 'Data gagal dirubah, silahkan coba lagi', 'error');
            }
        })
    });

    // $('.editJadwal').on('click', function(e){
    //     e.preventDefault();
    //     // alert('oke');
    //     const jurusan = $(this).data('jurusan');
    //     const namajurusan = $(this).data('namajurusan');
    //     const kelas = $(this).data('kelas');
    //     const namakelas = $(this).data('namakelas');
    //     const guru = $(this).data('guru');
    //     const namaguru = $(this).data('namaguru');
    //     const ruangan = $(this).data('ruangan');
    //     const namaruangan = $(this).data('namaruangan');

    //     // swal(namaguru);
    // });

    $('.hapusDataKelas').on('click', function(e){
        e.preventDefault();
        const url = $('#hapusDataKelas').attr('href');
        const hapus = $(this).data('hapus');

        // alert('oke');

        // swal(url);
        swal({
            title:'Apakah anda yakin?',
            text: 'Apakah anda ingin menghapus Kelas ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type:'POST',
                    url:url,
                    data:{
                        hapus:hapus
                    },
                    success: function() {
                        swal('Sukses', 'Hapus data sukses', 'success');
                    },error: function () {
                        swal('Gagal', 'Hapus data gagal', 'error');
                    }
                }); 
            } else {
              swal("Allhamdulillah",'Tidak jadi hapus, data masih terdaftar di database!', 'info');
            }
         });
    });

    $('.hapusDataJadwal').on('click', function(e){
        e.preventDefault();
        const url = $('#hapusDataJadwal').attr('href');
        const hapus = $(this).data('hapus');
        const href = $(this).data('href');

        // alert('oke');

        // swal(url);
        swal({
            title:'Apakah anda yakin?',
            text: 'Apakah anda ingin menghapus Jadwal ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type:'POST',
                    url:url,
                    data:{
                        hapus:hapus
                    },
                    success: function() {
                        swal('Sukses', 'Hapus data sukses', 'success');
                        document.location.href = href;
                    },error: function () {
                        swal('Gagal', 'Hapus data gagal', 'error');
                    }
                }); 
            } else {
              swal("Allhamdulillah",'Tidak jadi hapus, data masih terdaftar di database!', 'info');
            }
         });
    });

    $('#simpanDataPayload').on('click', function(e){
        e.preventDefault();
        const nama = $('#namaPayload').val();
        const url = $('#formInputPayload').attr('action');

        $.ajax({
            type:'POST',
            url:url,
            data:{
                nama:nama,
            },
            success: function() {
                swal('Sukses', 'input data sukses', 'success');
            },error: function () {
                swal('Gagal', 'input data gagal', 'error');
            }
        });
    });
});