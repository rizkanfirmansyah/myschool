$(document).ready(function(){
    $('.hapusDataPegawai').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href');
        const text = $(this).data('text');
        swal({
            title: "Apakah anda yakin?",
            text: text,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                document.location.href = href; 
            } else {
                  swal({
                      title:"Profile pegawai tidak jadi dihapus",
                      icon:"info"
                  });
            }
          });
    });

    $('.editDataPegawai').on('click', function(){
        const nip = $(this).data('nip');
        const nama = $(this).data('nama');
        const telepon = $(this).data('telepon');
        const email = $(this).data('email');
        const alamat = $(this).data('alamat');
        var text = nip + nama + telepon +email + alamat;
        swal({
            title:'sukses bro',
            icon:'success',
            text:text
        });
    });

});
    