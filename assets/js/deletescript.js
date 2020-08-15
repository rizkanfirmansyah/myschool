$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    	$("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
      console.log($('$check-all'));
    });
    
    $("#btn-delete").click(function(){ // Ketika user mengklik tombol delete
      var hapus = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?");
      
      if(hapus) // Jika user mengklik tombol "Ok"
      	$('#form-delete').attr('action', '<?= base_url('hapus/siswa/'); ?>' + data);
        $("#form-delete").submit(); // Submit form

    }); 
  });