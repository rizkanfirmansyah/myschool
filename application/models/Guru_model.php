<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Guru_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function all()
  {
    return $this->db->select('*, guru.nama as nama_guru, guru.status as status_guru')->from('guru')->join('users', 'guru.nip=users.nama', 'left')->join('jurusan', 'guru.id_jurusan=jurusan.jurusan_id', 'left')->get()->result_array();
  }

  public function guru()
  {
    return $this->db->select('*')->from('guru')->join('kelas', 'guru.id=kelas.guru_id', 'left')->group_by('nama')->get()->result_array();
  }

  // ------------------------------------------------------------------------
  public function jml()
  {
    return $this->db->get('guru')->num_rows();
  }


  // ------------------------------------------------------------------------

  public function lengkap()
  {
    return $this->db->select('*')->from('guru')->join('profile_guru', 'guru.guru_id=profile_guru.guru_id', 'left')->where('mapel !=', ' ')->where('sertifikasi !=', ' ')->get();
  }

  public function allObj()
  {
    return $this->db->select('*')->from('guru')->join('jurusan', 'guru.id_jurusan=jurusan.jurusan_id', 'left')->get();
  }

}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */