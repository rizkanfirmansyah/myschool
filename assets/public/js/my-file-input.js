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

    $('.uploadDataTugas').on('click', function(){
        const idtugas = $(this).data('idtugas');
        const tugas = $(this).data('tugas');
        // alert(idmateri + ' ' +  materi);

        $('#idTugas').val(idtugas);
        $('#uploadTugasLabel').text(tugas);
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

    $('.detailDataTugas').on('click', function() {
        const deskripsi = $(this).data('deskripsi');
        const tugas = $(this).data('tugas');
        const mapel = $(this).data('mapel');
        const tanggal = $(this).data('tanggal');
        const id = $(this).data('id');
        // alert(materi);
        $('#deskripsiTugasData').text(deskripsi);
        $('#mapelTugasData').text(mapel);
        $('#subTugasData').text(tugas);
        $('#dataTugasTanggal').text(tanggal);
        $('#idDataTugas').val(id);
    });

    $('.beriNilaiSiswaID').on('click', function(){
        const id = $(this).data('id');
        const nama = $(this).data('nama');

        $('#beriNilaiSiswaNama').text(nama);
        $('#idNilai').val(id);
    }); 

});