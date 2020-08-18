<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{

	public function getDataSiswa()
	{
		return $this->db->get('siswa')->result_array();	
	}

	public function getDataGuru()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('data_kelas', 'guru.id=data_kelas.wakel_id', 'left');
		$this->db->join('data_jurusan', 'guru.id_jurusan=data_jurusan.jurusan_id');
		return $this->db->get()->result_array();	
	}

	public function getSiswa($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('siswa')->row_array();
	}

	public function getGuru($id)
	{
		return $this->db->where('id', $id)->get('guru')->row_array();
	}

	public function getDataJurusan()
	{
		return $this->db->get('data_jurusan')->result_array();
	}

	public function getDataJurusanRows()
	{
		return $this->db->get('data_jurusan')->num_rows();
	}

	public function ruangan()
	{
		return $this->db->get('ruangan');
	}

	public function jmlruangan()
	{
		return $this->db->select_sum('payload')->get('ruangan')->row_array();
	}

	public function avgruangan()
	{
		return $this->db->select_avg('payload')->get('ruangan')->row_array();
	}

	public function mapel()
	{
		return $this->db->select('*')->from('mapel')->join('guru', 'mapel.id_guru=guru.id', 'left')->get();
	}

	public function getDataNotCompleted()
	{
		$this->db->where('nisn', ' ');
		$this->db->where('agama', ' ');
		$this->db->where('asal_sekolah', ' ');
		$this->db->where('nama_ayah', ' ');
		$this->db->where('nama_ibu', ' ');
		$this->db->where('alamat', ' ');
		return $this->db->get('siswa')->result_array();
	}

	public function getDataJurusanGuru()
	{
		$this->db->select('*, COUNT(id_jurusan) as jml_jurusan');
		$this->db->from('guru');
		$this->db->join('data_jurusan', 'guru.id_jurusan=data_jurusan.jurusan_id');
		$this->db->group_by('id_jurusan');
		return $this->db->get()->result_array();
	}

	public function getUserAbsen()
	{
		$this->db->select('data_absen.id, data_absen.keterangan, data_absen.user_id, data_absen.date, data_absen.time, user.name, user.identitas');
		$this->db->from('data_absen');
		$this->db->join('user', 'data_absen.user_id=user.identitas');
		$this->db->where('DAY(data_absen.date)', date('d'));
        $this->db->where('MONTH(data_absen.date)', date('m'));
        $this->db->where('YEAR(data_absen.date)', date('Y'));
		return $this->db->get()->result_array();
	}

	public function getDataAbsen($masukan)
	{
		$tgl = date('d-F-Y');
        $query = "SELECT *
                    FROM `data_absen` JOIN `user`
                    ON `data_absen`.`user_id` = `user`.`identitas`
                    GROUP BY `time`
                    ORDER BY `data_absen` . `id` DESC
                    LIMIT $masukan
                    ";

        return $this->db->query($query)->result_array();
	}

	public function getKeteranganAbsen()
	{
		$tgl = date('d-F-Y');
        $query = "SELECT *
                    FROM `data_absen` JOIN `user`
                    ON `data_absen`.`user_id` = `user`.`identitas`
                    GROUP BY `keterangan`
                    ORDER BY `data_absen` . `keterangan` ASC
                    ";

        return $this->db->query($query)->result_array();
	}

	public function countUserAbsen($masukan)
	{
		$this->db->select('id, date, COUNT(date) as data');
		$this->db->group_by('date');
		$this->db->order_by('id', 'desc');
		$this->db->where('month(date)', 4);
		return $this->db->get('data_absen')->result_array();
	}

	public function countKeteranganAbsen()
	{
		$this->db->select('id, keterangan, COUNT(keterangan) as data');
		$this->db->group_by('keterangan');
		$this->db->order_by('keterangan', 'asc');
		return $this->db->get('data_absen')->result_array();
	}

	public function getUserRole()
	{
		$this->db->where('id !=', 1);
		$this->db->where('id !=', 2);
		return $this->db->get('user_role')->result_array();
	}

	public function getUserRoleAdmin()
	{
		$this->db->where('id !=', 1);
		return $this->db->get('user_role')->result_array();
	}


	public function getDataArtikel()
	{
		$this->db->order_by('lihat', 'desc');
		return $this->db->get('data_blog')->result_array();
	}

	public function countTagArtikel()
	{
		$this->db->select('id, tag, COUNT(tag) as data');
		$this->db->group_by('tag');
		$this->db->limit(3,0);
		$this->db->order_by('tag', 'desc');
		return $this->db->get('data_blog')->result_array();
	}

	public function getDataKas()
	{
                    $this->db->select('data_kas.id, data_kas.nominal, user.user_id, user.name, data_kas.user_id ');
                    $this->db->from('data_kas');
                    $this->db->join('user', 'data_kas.user_id=user.user_id');
                    $this->db->select_sum('nominal');
                    $this->db->group_by('data_kas.user_id');
                    $query = $this->db->get();
		return $query->result_array();
	}

	public function getDataLabaKas()
	{
		$tgl = date('Y-m-d');
		 $query = "SELECT *
                    FROM `data_kas` JOIN `user`
                    ON `data_kas`.`user_id` = `user`.`identitas`
                    WHERE `tanggal` = '$tgl'
                    AND `jenis_kas` = '1'
                    ORDER BY `data_kas` . `waktu` DESC
                    ";
		return $this->db->query($query)->result_array();
	}

	public function dataPemasukan($status, $limit)
	{
		if ($status == "hari") {
			$tgl = date('Y-m-d');
			 $query = "SELECT *
	                    FROM `data_kas` JOIN `user`
	                    ON `data_kas`.`user_id` = `user`.`identitas`
	                    WHERE `tanggal` = '$tgl'
	                    AND `jenis_kas` = '1'
	                    ORDER BY `data_kas` . `waktu` DESC
	                    ";
			return $this->db->query($query)->result_array();
		}elseif (base64_decode(urldecode($status)) == "hari") {
			$tgl = date('Y-m-d');
			 $query = "SELECT *
	                    FROM `data_kas` JOIN `user`
	                    ON `data_kas`.`user_id` = `user`.`identitas`
	                    WHERE `tanggal` = '$tgl'
	                    AND `jenis_kas` = '1'
	                    ORDER BY `data_kas` . `waktu` DESC
	                    ";
			return $this->db->query($query)->result_array();
		}elseif (base64_decode(urldecode($status)) == "minggu"){
			$tgl1 = date('d')-7;
			$tgl = date('Y-m-').$tgl1;
			 $query = "SELECT *
	                    FROM `data_kas` JOIN `user`
	                    ON `data_kas`.`user_id` = `user`.`identitas`
	                    WHERE `tanggal` >= '$tgl'
	                    AND `jenis_kas` = '1'
	                    ORDER BY `data_kas` . `waktu` DESC
	                    ";
			return $this->db->query($query)->result_array();
		}elseif (base64_decode(urldecode($status)) == "bulan"){
			 $query = "SELECT *
	                    FROM `data_kas` JOIN `user`
	                    ON `data_kas`.`user_id` = `user`.`identitas`
	                    WHERE month(tanggal) = $limit
	                    AND `jenis_kas` = '1'
	                    ORDER BY `data_kas` . `waktu` DESC
	                    ";
			return $this->db->query($query)->result_array();
		}elseif (base64_decode(urldecode($status)) == "tahun"){
			$tahun = date('Y');
			 $query = "SELECT *
	                    FROM `data_kas` JOIN `user`
	                    ON `data_kas`.`user_id` = `user`.`identitas`
	                    WHERE year(tanggal) = $tahun
	                    AND `jenis_kas` = '1'
	                    ORDER BY `data_kas` . `waktu` DESC
	                    ";
			return $this->db->query($query)->result_array();
		}elseif (base64_decode(urldecode($status)) == "all"){
			 $query = "SELECT *
	                    FROM `data_kas` JOIN `user`
	                    ON `data_kas`.`user_id` = `user`.`identitas`
	                    WHERE `jenis_kas` = '1'
	                    ORDER BY `data_kas` . `waktu` DESC
	                    ";
			return $this->db->query($query)->result_array();
		}
		
	}

	public function getDataRugiKas()
	{
		$tgl = date('Y-m-d');
		$this->db->where('jenis_kas', 2);
		$this->db->where('tanggal', $tgl);
		return $this->db->get('data_kas')->result_array();
	}

	public function getDataTotalLaba()
	{
		$this->db->where('jenis_kas', 1);
		$this->db->select_sum('nominal');
		$this->db->group_by('month(tanggal)');
		$this->db->select('id, tanggal, month(tanggal) as bulan');
		return $this->db->get('data_kas')->result_array();
	}

	public function getDataTotalRugi()
	{
		$this->db->where('jenis_kas', 2);
		$this->db->select_sum('nominal');
		$this->db->group_by('month(tanggal)');
		$this->db->select('id, tanggal, month(tanggal) as bulan');
		return $this->db->get('data_kas')->result_array();
	}

	public function getDataJumlahLaba()
	{
		$this->db->where('jenis_kas', 1);
		$this->db->select_sum('nominal');
		$this->db->select('COUNT(month(tanggal)) as data');
		return $this->db->get('data_kas')->row_array();
	}

	public function getDataJumlahBulan()
	{
		$this->db->where('jenis_kas', 1);
		$this->db->group_by('month(tanggal)');
		return $this->db->get('data_kas')->num_rows();
	}

	public function getLabaKasToday()
	{
		$tgl = date('Y-m-d');
		$this->db->where('tanggal', $tgl);
		$this->db->where('jenis_kas', 1);
		$this->db->select_sum('nominal');
		return $this->db->get('data_kas')->row_array();
	}

	public function getRugiKasToday()
	{
		$tgl = date('Y-m-d');
		$this->db->where('tanggal', $tgl);
		$this->db->where('jenis_kas', 2);
		$this->db->select_sum('nominal');
		return $this->db->get('data_kas')->row_array();
	}

	public function getLabaKas()
	{
		$this->db->where('jenis_kas', 1);
		$this->db->select_sum('nominal');
		return $this->db->get('data_kas')->row_array();
	}

	public function getRugiKas()
	{
		$this->db->where('jenis_kas', 2);
		$this->db->select_sum('nominal');
		return $this->db->get('data_kas')->row_array();
	}

	public function getDataGallery()
	{
		return $this->db->get('gallery')->result_array();
	}

	public function getTotalSiswa()
	{
		return $this->db->get('siswa');
	}

	public function getTotalGuru()
	{
		return $this->db->get('guru');
	}

	public function notDataSiswa()
	{
		$this->db->where('nama_ayah', ' ');
		$this->db->where('nama_ibu', ' ');
		$this->db->where('alamat', ' ');
		$this->db->where('agama', ' ');
		$this->db->where('nisn', ' ');
		$this->db->where('asal_sekolah', ' ');
		$this->db->where('tempat_lahir', ' ');
		return $this->db->get('siswa')->num_rows();
	}

	public function notDataGuru()
	{
		$this->db->where('email', ' ');
		$this->db->or_where('mapel', ' ');
		$this->db->or_where('alamat', ' ');
		$this->db->or_where('sertifikasi', ' ');
		$this->db->or_where('lulusan', ' ');
		$this->db->or_where('tahun_ajar_awal', ' ');
		$this->db->or_where('telepon', ' ');
		return $this->db->get('guru');
	}

}