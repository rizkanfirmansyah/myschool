$(document).ready(function() {
    $('.changeStaff').on('change', function(){
        const staff = $(this).data('staff');
        const jabatan = $(this).data('jabatan');
        const url = $(this).data('url');
        const href = $(this).data('href');

        $.ajax({
            type:'POST',
            url:url,
            data:{
                staff:staff,
                jabatan:jabatan
         },
            success: function() {
                 document.location.href = href
            }
        });
    });
});