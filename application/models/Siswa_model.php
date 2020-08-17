<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Siswa_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function all()
  {
    return $this->db->select('*')->from('siswa')->join('kelas', 'siswa.kelas_id=kelas.kelas_id', 'left')->join('jurusan', 'jurusan.jurusan_id=kelas.jurusan_id', 'left')->get()->result_array();
  }
  public function allsiswa()
  {
    return $this->db->select('*')->from('siswa')->join('kelas', 'siswa.kelas_id=kelas.kelas_id', 'left')->join('jurusan', 'jurusan.jurusan_id=kelas.jurusan_id', 'left')->get()->result();
  }

  public function siswa()
  {
    return $this->db->get('siswa');
  }

  public function datasiswa()
  {
    return $this->db->select('*')->from('siswa')->join('profile_siswa', 'siswa.siswa_id=profile_siswa.siswa_id', 'right')->get();
  }

  public function siswanotcomplete()
  {
    return $this->db->select('*')->from('siswa')->join('profile_siswa', 'siswa.siswa_id=profile_siswa.siswa_id', 'left')->where('nik', null)->where('nisn', null)->get();
  }

  public function angkatan()
  {
    return $this->db->get('angkatan');
  }

  public function kelas()
  {
    return $this->db->get('kelas');
  }

  public function jurusan()
  {
    $this->db->where('jurusan_id !=', 1);
    return $this->db->get('jurusan')->num_rows();
  }

  public function sJurusan()
  {
    return $this->db->get('juruswan')->num_rows();
  }

  public function siswaAngkatan()
  {
    return $this->db->select('siswa.*, angkatan.*, count(siswa.angkatan_id) as jml_siswa')->from('siswa')->join('angkatan', 'siswa.angkatan_id=angkatan.angkatan_id')->group_by('siswa.angkatan_id')->get() ->result_array();
  }

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */