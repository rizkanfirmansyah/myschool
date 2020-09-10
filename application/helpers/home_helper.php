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

	function sisaBarang($id)
	{
		$rizkan = get_instance();

		$data1 = $rizkan->db->select_sum('jumlah_barang')->group_by('id_barang')->get_where('pembelian', ['id_barang'=> $id])->row()->jumlah_barang;
		$data2 = $rizkan->db->select_sum('jumlah_barang')->group_by('id_barang')->get_where('pengeluaran', ['id_barang'=> $id])->row()->jumlah_barang;

		return $data1-$data2;
	}

	function hitung_jumlah($table)
	{
		$rizkan = get_instance();

		$cek = $rizkan->db->get($table)->num_rows();
		if($cek > 0){
			return $cek;
		}else{
			return '-';
		}
	}

	function status($id)
	{
		if($id == 1){
			return '<span class="btn btn-sm btn-success">Aktif</span>';
		}else{
			return '<span class="btn btn-sm btn-danger">Tidak Aktif</span>';
		}
	}

	function ujian_status($id, $idujian)
	{
		if ($id == 1) {
			return '<a href="'. base_url('cbt/update/status/'. $idujian) .'/0" class="badge badge-sm badge-success"><i class="fas fa-check"></i></a>';
		} else {
			return '<a href="'. base_url('cbt/update/status/'. $idujian .'/1') .'" class="badge badge-sm badge-danger"><i class="fas fa-times"></i></a>';
		}
		
	}

	function cek_nilai_ujian($nilai, $idujian){
		$rizkan = get_instance();
		$cek = $rizkan->db->select('*, SUM(bobot_nilai) as nilai')->from('cbt_jawaban')->join('cbt_soal', 'id_soal=cbt_soal.id', 'left')->where('id_ujian', $idujian)->get()->result();
		foreach ($cek as $n ) {
			return $nilai * 100 / $n->nilai;
		}
	}

	function cek_hasil_ujian($id, $siswa)
	{
		$rizkan = get_instance();
		$cek = $rizkan->db->where('nilai !=', null)->get_where('data_nilai_ujian',['id_ujian'=>$id, 'id_siswa' => $siswa])->row();

		if($cek){
			return '<a href="'.base_url('cetak/nilai_ujian?id_u='.$id.'&nis='.urlencode(base64_encode($siswa))) .'" class="badge badge-success"><i class="fas fa-print"></i> Cetak Nilai</a>';
		}else{
			return '<a href="'.base_url('ujian/siswa?id_u='.$id.'&nis='.urlencode(base64_encode($siswa))) .'" class="badge badge-primary"><i class="fas fa-table"></i> Ambil Ujian</a>';
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