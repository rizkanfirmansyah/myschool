$(document).ready(function () {
    $('#datatable').DataTable();
});

$(document).ready(function () {
    $('#dataPemasukan').DataTable();
});

$(document).ready(function () {
    $('#dataPemasukanPerBulan').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });
});

$(document).ready(function () {
    $('#dataPengeluaran').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });
});

$(document).ready(function () {
    $('#totalDataPengeluaran').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });
});

$(document).ready(function () {
    $('#dataKas').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    });
});

$(document).ready(function () {
    $('#datatables2').DataTable();
});

$(document).ready(function () {
    $('#dataWebVisit').DataTable();
});
