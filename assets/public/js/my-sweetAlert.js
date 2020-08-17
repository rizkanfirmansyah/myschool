$(document).ready(function(){
    const pesan = $('#sweetMessage').data('pesan');
    const tipe = $('#sweetMessage').data('tipe');
    
    if(tipe == 'success' || tipe == 'error' || tipe== 'warning'){
        swal({
            title: pesan,
            // text: "You clicked the button!",
            icon: tipe,
          });
    }else if(tipe == 'icon'){
        swal(pesan, {
            icon: "success",
          });
    }

    $('#formatData').on('click', function(e){
        e.preventDefault();
        const href = $(this).attr('href');
        const text = $(this).data('text');
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
              swal("Tidak jadi format, data masih terdaftar di database!", "", "info");
            }
          });
          
    });
    
});