<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

	public function getDataArticle()
	{
		$this->db->select('data_blog.id, artikel, judul, tag, data_blog.image, data_blog.is_active, data_blog.email, deskripsi, lihat, data_blog.time, data_blog.date, user.name, user.email');
		$this->db->from('data_blog');
		$this->db->order_by('time', 'DESC');
		$this->db->limit('4');
		$this->db->where('data_blog.is_active', 1);
		$this->db->join('user', 'data_blog.email=user.email');
		return $this->db->get()->result_array();
	}

	public function getArticleRead($id)
	{
		$this->db->select('data_blog.id, data_blog.is_active, artikel, judul, tag, data_blog.image, data_blog.email, deskripsi, lihat, data_blog.time, data_blog.date, user.name, user.email');
		$this->db->from('data_blog');
		$this->db->join('user', 'data_blog.email=user.email');
		$this->db->where('data_blog.id', $id);
		return $this->db->get()->row_array();
	}

	public function getDataBlog()
	{
		$this->db->select('data_blog.email, deskripsi, judul, tag, data_blog.date, data_blog.image, data_blog.time, data_blog.is_active, user.name, user.email');
		$this->db->from('data_blog');
		$this->db->join('user', 'data_blog.email=user.email');
		$this->db->where('data_blog.is_active', 1);
		return $this->db->get()->result_array();
	}

	public function getDataGallery($id)
	{
		$this->db->order_by('download', 'DESC');
		$this->db->limit($id, 1);
		return $this->db->get('gallery')->result_array();
	}

	public function getDataGalleryOne()
	{
		$this->db->order_by('download', 'DESC');
		$this->db->limit(1);
		return $this->db->get('gallery')->row_array();
	}

	public function getDataKomentar($id)
	{
		$this->db->select('user.email, user.name, user.image, data_komentar.email, data_komentar.komentar, data_komentar.date, data_komentar.time, id_post');
		$this->db->from('data_komentar');
		$this->db->join('user', 'data_komentar.email=user.email');
		$this->db->where('id_post', $id);
		return $this->db->get()->result_array();
	}

	public function getdataHomePage()
	{
		$this->db->select('jenis, count(jenis) as jumlah');
		$this->db->group_by('jenis');
		return $this->db->get('data_homepage')->result_array();
	}

	public function getdataHomePageAll()
	{
		return $this->db->get('data_homepage')->result_array();
	}

	public function getDataHomePageSlider()
	{
		$this->db->where('jenis', 'slider');
		return $this->db->get('data_homepage')->result_array();
	}

	public function getDataHomePagePerId($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('data_homepage')->row_array();
	}

	public function getDataHomePageServices()
	{
		$this->db->where('jenis', 'services');
		return $this->db->get('data_homepage')->result_array();
	}

	public function getDataHomePageProfile()
	{
		$this->db->where('jenis', 'profile');
		return $this->db->get('data_homepage')->row_array();
	}

	public function getDataHomePageServicesRow()
	{
		$this->db->where('jenis', 'services');
		return $this->db->get('data_homepage')->num_rows();
	}

	public function getDataHomePageNewsFeed()
	{
		$this->db->limit('3');
		$this->db->order_by('time', 'DESC');
		return $this->db->get('data_blog')->result_array();
	}

	public function getDataHomePageTestimonials()
	{
		$this->db->where('jenis', 'testimonial');
		return $this->db->get('data_homepage')->result_array();
	}

	public function getDataHomePageFooter()
	{
		$this->db->where('jenis', 'footer');
		return $this->db->get('data_homepage')->row_array();
	}

	public function getDataHomePageSosmed()
	{
		$this->db->where('jenis', 'sosmed');
		return $this->db->get('data_homepage')->result_array();
	}

	public function getDataHomePageSosmedAktif()
	{
		$this->db->where('jenis', 'sosmed');
		$this->db->where('keterangan', 'aktif');
		return $this->db->get('data_homepage')->result_array();
	}

	public function getDataHomePageContact()
	{
		$this->db->where('jenis', 'contact');
		return $this->db->get('data_homepage')->row_array();
	}

	public function getDataHomePageSponsor()
	{
		$this->db->where('jenis', 'sponsor');
		return $this->db->get('data_homepage')->result_array();
	}

	public function getDataHomePageSponsorAktif()
	{
		$this->db->where('jenis', 'sponsor');
		$this->db->where('keterangan', 'aktif');
		return $this->db->get('data_homepage')->result_array();
	}

}