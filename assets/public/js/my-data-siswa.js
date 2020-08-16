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

    $('#formatData').on('click', function(e) {
        e.preventDefault();

        const href = $(this).attr('href');
        const text = $(this).data('text');
        // alert(href);
        swal({
            title: "Apa anda yakin?",
            text: text,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                document.location.href = href;   
            } else {
              swal("Tidak jadi format, data masih terdaftar di database!");
            }
          });
    });

    $('.editDataSiswa').on('click', function(){
        const idsiswa = $(this).data('id');
        const namasiswa = $(this).data('nama');
        const idkelas = $(this).data('idkelas');
        const namakelas = $(this).data('kelas');
        const ayah = $(this).data('ayah');
        const ibu = $(this).data('ibu');
        const alamat = $(this).data('alamat');
        const agama = $(this).data('agama');
        const ttl = $(this).data('ttl');

        console.log(alamat);

        $('#siswanama').val(namasiswa);
        $('#siswakelas').val(idkelas);
        $('#siswakelas').text(namakelas);
        $('#siswaayah').val(ayah);
        $('#siswaibu').val(ibu);
        $('#siswaalamat').val(alamat);
        $('#siswaagama').val(agama);
        $('#siswattl').val(ttl);
        $('#siswaid').val(idsiswa);
        // $('#siswanama').val(namasiswa);

        $('#submitDataSiswa').on('click', function(e){
            e.preventDefault();
            const url = $(this).data('action');

            const siswanama = $('#siswanama').val();
            const siswakelas =$('#datakelas').val();
            const siswaayah = $('#siswaayah').val();
            const siswaibu = $('#siswaibu').val();
            const siswaalamat = $('#siswaalamat').val();
            const siswaagama = $('#siswaagama').val();
            const siswattl = $('#siswattl').val();
            const siswaid = $('#siswaid').val();

            $.ajax({
                type:'POST',
                url:url,
                data:{
                    nama:siswanama,
                    kelas:siswakelas,
                    ayah:siswaayah,
                    ibu:siswaibu,
                    alamat:siswaalamat,
                    agama:siswaagama,
                    ttl:siswattl,
                    id:siswaid,
                },
                success : function(){
                    swal('Sukses', 'Data siswa berhasil diperbaharui', 'success');
                },
                error : function(){
                    swal('Gagal', 'Data siswa gagal diperbaharui', 'error');
                }
            })
        })
    });
});