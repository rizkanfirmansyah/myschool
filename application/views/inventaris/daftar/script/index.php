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
    $(document).ready(function(){
        $('#btnEditData').on('click', function(){
            id = $(this).data('id')
            nama = $(this).data('nama')

            $('#idEditData').val(id)
            $('#namaEditData').val(nama)
            // alert(id+nama)
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