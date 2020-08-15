<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_model extends CI_Model
{

	public function getPemasukanPerBulan($id)
	{
		$this->db->where('month(tanggal)', $id);
		$this->db->where('jenis_kas', 1);
		return $this->db->get('data_kas')->result_array();
	}

	public function getPengeluaranPerBulan($id)
	{
		$this->db->where('month(tanggal)', $id);
		$this->db->where('jenis_kas', 2);
		return $this->db->get('data_kas')->result_array();
	}


	public function getPemasukanJumlahPerBulan($id)
	{
		$this->db->where('jenis_kas', 1);
		$this->db->where('month(tanggal)', $id);
		$this->db->select_sum('nominal');
		$this->db->select('COUNT(month(tanggal)) as data');
		return $this->db->get('data_kas')->row_array();
	}

	public function getPengeluaranJumlahPerBulan($id)
	{
		$this->db->where('jenis_kas', 2);
		$this->db->where('month(tanggal)', $id);
		$this->db->select_sum('nominal');
		$this->db->select('COUNT(month(tanggal)) as data');
		return $this->db->get('data_kas')->row_array();
	}

}