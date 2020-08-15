<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{

	public function databaseMember()
	{
		return $this->db->get('data_member')->result_array();
	}

	public function totalMember()
	{
        return $this->db->get('data_member')->num_rows();
	}

	public function getMemberId($id)
	{
		return $this->db->get_where('data_member', ['id' => $id])->row_array();
	}

	public function cariDataMember()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->or_like('user_id', $keyword);
		$this->db->or_like('email', $keyword);
		$this->db->or_like('kelas', $keyword);
		return $this->db->get('data_member')->result_array();
	}

	public function countAllMember()
	{
		return $this->db->get('data_member')->num_rows();
	}

	public function getEmailMember()
	{
		return $this->db->get_where('data_member', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function getGalleryAll()
	{
		return $this->db->get('gallery')->result_array();
	}

	public function getDataAbsen()
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('YEAR(date)', date('Y'));
		$this->db->where('MONTH(date)', date('m'));
		$this->db->where('DAY(date)', date('d'));
		return $this->db->get('data_absen')->row_array();

	}

	public function getDataTugasProfile()
	{
		$this->db->where('file !=', ' ');
		$this->db->where('email', $this->session->userdata('email'));
		return $this->db->get('data_nilai')->result_array();
	}

	public function getDataTugasList($jurusan)
	{ 
		$this->db->where('id_pengajar', $jurusan['pengajar']);
		$this->db->where('email', $this->session->userdata('email'));
		return $this->db->get('data_nilai')->result_array();
	}

	public function getDataMateriPribadi()
	{
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->where('status', 1);
		return $this->db->get('materi_check')->num_rows();
	}

	public function getDataTugasPribadi()
	{
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->where('nilai !=', ' ');
		return $this->db->get('data_nilai')->num_rows();
	}

	public function getDataNilaiPribadi()
	{
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->select_avg('nilai');
		return $this->db->get('data_nilai')->row_array();
	}

	public function getDataListMateri($dm)
	{
        $this->db->where('materi !=', 'contoh');
        $this->db->where('user_id', $dm['pengajar']);
		return $this->db->get('data_materi')->result_array();
	}

	public function getDataCatatanPribadi()
	{
        $this->db->where('email', $this->session->userdata('email'));
		return $this->db->get('data_catatan')->result_array();
	}

	public function getDataUjianPribadi()
	{
        $this->db->where('nama', $this->session->userdata('email'));
		return $this->db->get('data_nilai_ujian')->result_array();
	}

	public function getDataSertifikatPribadi()
	{
        $this->db->where('email', $this->session->userdata('email'));
		return $this->db->get('data_sertifikat')->num_rows();
	}

	public function getDataCert()
	{
        $this->db->where('email', $this->session->userdata('email'));
		return $this->db->get('data_sertifikat')->result_array();
	}

	public function getDataBioPribadi()
	{
		return $this->db->get_where('data_bio', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function getDataStatusPribadi()
	{
		return $this->db->get_where('data_status', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function getDataPortfolioPribadi()
	{
		return $this->db->get_where('data_portfolio', ['email' => $this->session->userdata('email')])->result_array();
	}


}