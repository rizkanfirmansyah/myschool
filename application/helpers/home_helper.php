<?php 

	function slider_active($id)
	{
		if($id == 1){
			return 'active';
		}else{
			return '';
		}
	}

	function slider_hapus($id)
	{
		if($id == 1){
			return false;
		}else{
			return '<a href="'.  base_url('hapus/slider/' . $id) .'" class="tombol-hapus" data-hapus="Apakah anda ingin menghapus slider ini?"> <i class="fas fa-trash "></i></a>';
		}
	}

	function profile_hapus($jenis, $id)
	{
		$home = get_instance();

		$home->db->where('jenis', $jenis);
		$result = $home->db->get('data_homepage')->num_rows();
		if($result > 1){
		return '<a href="'.  base_url('hapus/slider/' . $id) .'" class="tombol-hapus" data-hapus="Apakah anda ingin menghapus slider ini?"> <i class="fas fa-trash "></i></a>';
		}
	}

	function ujian_status($id, $idujian)
	{
		if ($id == 1) {
			return '<a href="'. base_url('cbt/update/status/'. $idujian) .'/0" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>';
		} else {
			return '<a href="'. base_url('cbt/update/status/'. $idujian .'/1') .'" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>';
		}
		
	}
	
	function service_row($result)
	{
		if($result == 1){
			return '12';
		}elseif($result == 2){
			return '6';
		}elseif($result == 3){
			return '4';
		}elseif($result == 4){
			return '3';
		}elseif($result >= 5){
			return '4';
		}
	}

	function checkbox_sosmed($id)
	{
		$home = get_instance();
		$result = $home->db->get_where('data_homepage', ['id' => $id])->row();

		if($result->keterangan == 'aktif'){
			return 'checked="checked"';
		}
	}



 ?>	