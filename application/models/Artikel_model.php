<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_model extends CI_Model
{

	public function countKomen($id, $limit, $start)
	{
		$this->db->order_by('time', 'desc');
		$this->db->where('id_post', $id);
		return $this->db->get('data_komentar', $limit, $start)->result_array();
	}

	public function countAllKomen($id)
	{
		$this->db->where('id_post', $id);
		return $this->db->get('data_komentar')->num_rows();
	}

	public function countArtikel($limit, $start)
	{
		$this->db->select('data_blog.id, artikel, judul, tag, data_blog.image, data_blog.is_active, data_blog.email, deskripsi, lihat, data_blog.time, data_blog.date, user.name, user.email');
		$this->db->from('data_blog');
		$this->db->order_by('time', 'DESC');
		$this->db->limit($limit, $start);
		$this->db->where('data_blog.is_active', 1);
		$this->db->join('user', 'data_blog.email=user.email');
		return $this->db->get()->result_array();
	}

	public function dataPostingan()
	{
		$this->db->select('data_blog.id, artikel, judul, tag, data_blog.image, data_blog.is_active, data_blog.email, deskripsi, lihat, data_blog.time, data_blog.date, user.name, user.email');
		$this->db->from('data_blog');
		$this->db->order_by('time', 'DESC');
		$this->db->limit('3', '0');
		$this->db->where('data_blog.is_active', 1);
		$this->db->join('user', 'data_blog.email=user.email');
		return $this->db->get()->result_array();
	}


	public function dataPostinganRead($id, $tags)
	{
		$this->db->select('data_blog.id, artikel, judul, tag, data_blog.image, data_blog.is_active, data_blog.email, deskripsi, lihat, data_blog.time, data_blog.date, user.name, user.email');
		$this->db->from('data_blog');
		$this->db->limit('3', '0');
        $this->db->order_by('lihat', 'desc');
        $this->db->where('data_blog.id !=', $id);
        $this->db->where('tag', $tags);
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

	public function countAllArtikel()
	{
		$this->db->where('is_active !=', 0);
		return $this->db->get('data_blog')->num_rows();
	}

	public function hitungJumlahKomen($id)
	{
        $this->db->where('id_post', $id);
		$this->db->select('id, id_post, COUNT(id_post) as total');
        $this->db->group_by('id_post');
        return $this->db->get('data_komentar')->row_array();
	}
}