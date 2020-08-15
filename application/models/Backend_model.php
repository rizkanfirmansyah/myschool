<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend_model extends CI_Model
{

	public function getDataBackend()
	{
        $query = "SELECT *
                    FROM `tb_data_webcode_backend` JOIN `tb_komponen`
                    ON `tb_data_webcode_backend`.`id_komponen` = `tb_komponen`.`id`
                    ";

        return $this->db->query($query)->result_array();
	}

	public function getDataKomponen()
	{
	$query = "SELECT tb_data_webcode_backend.id_id, count(`tb_data_webcode_backend`.`id_komponen`) AS `data`, SUM(`tb_data_webcode_backend`.`jumlah_baris`) as `data_baris`, SUM(`tb_data_webcode_backend`.`jumlah_code`) AS `data_code`, tb_komponen.id, tb_komponen.komponen 
                    FROM `tb_data_webcode_backend` JOIN `tb_komponen`
                    ON `tb_data_webcode_backend`.`id_komponen` = `tb_komponen`.`id`
                    GROUP BY `id_komponen`
                    ";
		return $this->db->query($query)->result_array();
	}

	public function getDataCode()
	{
		$this->db->select_sum('jumlah_baris');
		$this->db->select_sum('jumlah_code');
		return $this->db->get('tb_data_webcode_backend')->result_array();
	}

	public function getSetting()
	{
		return $this->db->get('data_setting')->result_array();
	}

	public function getDataKomponenAll()
	{
		return $this->db->get('tb_komponen')->result_array();
	}

	public function getDataUISet()
	{
		$this->db->where('setmore', 'ui website');
		return $this->db->get('tb_developer')->result_array();
	}

}