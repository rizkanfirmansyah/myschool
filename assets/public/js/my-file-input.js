$('.custom-file-input').on('change', function() {
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename);
});

$(document).ready(function(){
    $('.tambahInputDataStaff').on('click', function(e){
        e.preventDefault();
        swal();
    });

    $('.uploadDataMateri').on('click', function(){
        const idmateri = $(this).data('idmateri');
        const materi = $(this).data('materi');
        // alert(idmateri + ' ' +  materi);

        $('#idMateri').val(idmateri);
        $('#uploadMateriLabel').text(materi);
    });

    $('.detailDataMateri').on('click', function() {
        const deskripsi = $(this).data('deskripsi');
        const materi = $(this).data('materi');
        const mapel = $(this).data('mapel');
        const tanggal = $(this).data('tanggal');
        const id = $(this).data('id');
        // alert(materi);
        $('#deskripsiMateriData').text(deskripsi);
        $('#mapelMateriData').text(mapel);
        $('#subMateriData').text(materi);
        $('#dataMateriTanggal').text(tanggal);
        $('#idDataMateri').val(id);
    });

});