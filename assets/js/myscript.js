$(document).ready(function(){
     const pesan = $('.flash-data').data('pesan');
     const tipe = $('.flash-data').data('tipe');

     if(tipe == 'success' || tipe == 'error' || tipe == 'warning'){
         swal({
             text: pesan,
             // text: "You clicked the button!",
             icon: tipe,
           });
     }else if(tipe == 'icon'){
         swal(pesan, {
             icon: "success",
           });
     }
 


  $('.tombol-hapus').on('click', function(e){
      e.preventDefault();

      const href = $(this).attr('href');

      const data = $(this).data('hapus');
      swal({
        title:'Apakah anda yakin',
        text: data,
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            document.location.href = href;   
        } else {
          swal("Allhamdulillah",'Tidak jadi hapus, data masih terdaftar di database!', 'info');
        }
      });
    });

  })

