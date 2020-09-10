<script>
    function refresh_nota() {
        $.ajax({
            dataType: 'JSON',
            url: '../inventaris/get_id_nota',
            success: function (res) {
                // console.log(res)
                $('#id_nota').val(res)
            },
            error: function (err) {
                console.log(err.status + ' ' + err.statusText)
                }
            })
        }
        
        function rupiah(nilai){
            var	number_string = nilai.toString(),
            sisa 	= number_string.length % 3,
            rupiah 	= number_string.substr(0, sisa),
            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return 'Rp. '+ rupiah
        }

    $(document).ready(function(){
        $('#btnEditData').on('click', function(){
            id = $(this).data('id')
            nama = $(this).data('nama')

            $('#idEditData').val(id)
            $('#namaEditData').val(nama)
            // alert(id+nama)
        })

        $('#tablePembelian').on('click', '#btnDetailNota', function(){
            const nota = $(this).data('nota')
            // alert(nota)
            $.ajax({
                url:'../inventaris/data_get_nota',
                type:'POST',
                data:{
                    id:nota
                },
                success:function(res){
                    let data = JSON.parse(res)
                    // $('#idPrintNota').attr('value', id)
                    let pajak = data.pajak * data.harga /100
                    let diskon = data.diskon * data.harga /100
                    // console.log(data);
                    let label = 
                    `
                    <button type="button" class="list-group-item list-group-item-action active">
                        Catatan Pembelian
                    </button>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Nota Barang
                        <span class="badge badge-primary badge-pill">${data.id_nota}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Nama Barang
                        <span class="badge badge-primary badge-pill">${data.nama_barang}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Merk Barang
                        <span class="badge badge-primary badge-pill">${data.nama_merk}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Satuan Barang
                        <span class="badge badge-primary badge-pill">${data.nama_unit}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tipe Barang
                        <span class="badge badge-primary badge-pill">${data.nama_jenis}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Harga Barang
                        <span class="badge badge-primary badge-pill">${rupiah(data.harga)}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Barang
                        <span class="badge badge-primary badge-pill">${data.jumlah_barang}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Pajak Barang
                        <span class="badge badge-primary badge-pill">${rupiah(pajak)}/${data.pajak}%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        Diskon Barang
                        <span class="badge badge-primary badge-pill">${rupiah(diskon)}/${data.diskon}%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between list-group-item-secondary">Total Harga
                        <span class="text-bold">${rupiah(data.total_harga)}</span>
                        </li>
                        `
                        $('#dataListNota').html(label)
                }, 
                error:function(err){
                    let label = 
                    `
                    <li type="button" class="list-group-item-danger d-flex justify-content-between align-items-cente">
                        Data Error ${err.status} ${err.statusText}
                    </li>
                    `
                    $('#dataListNota').html(label)
                    $('#modalDetailPembelian').modal('hide')
                    alert(err.status + ' ' + err.statusText)
                    console.log($('#modalDetailPembelian'))
                }
            })
        })

        $('#btnBarang').on('click', function(){
            id = $(this).data('id')
            nama = $(this).data('barang')
            jenis = $(this).data('jenis')
            merk = $(this).data('merk')
            unit = $(this).data('unit')
            harga = $(this).data('harga')

            $('#idBarangData').val(id)
            $('#namaBarangData').val(nama)
            $('#jenisBarangData').val(jenis)
            $('#merkBarangData').val(merk)
            $('#satuanBarangData').val(unit)
            $('#hargaBarangData').val(harga)
        })
    })

    function getval(res) {
	    $.ajax({
            url: '../inventaris/get_data_barang',
            type: 'POST',
            data: {
                id: res.value
            },
            success: function (res) {
                var data = JSON.parse(res)
                // console.log(data.namaUnit_barang)
                $('#unit_barang').val(data.nama_unit)
                $('#merk_barang').val(data.nama_merk)
                $('#tipe_barang').val(data.nama_jenis)
                $('#harga').val(data.harga)
                refresh_nota()
                console.log('Connection 200 OK')
            },
            error: function (err) {
                alert(err.status + ' ' + err.statusText)
            }
	    })
	    
    }

    function getharga(res) {
        harga = $('#harga').val()
        diskon = $('#diskon').val()
        pajak = $('#pajak_barang').val()
        pajakHarga = res.value * harga * pajak / 100
        diskonHarga = res.value * harga * diskon / 100
        data = res.value * harga + pajakHarga - diskonHarga
        $('#total_harga').val(data)
        // console.log(pajak)
        // alert(res.value)
    }
</script>