$('.custom-file-input').on('change', function() {
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename);
});

$(document).ready(function(){
    $('.tambahInputDataStaff').on('click', function(e){
        e.preventDefault();
        swal();
    });
});