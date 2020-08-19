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
    return $this->db->select('*, guru.nama as nama_guru, guru.status as status_guru')->from('guru') ->join('jurusan', 'guru.id_jurusan=jurusan.jurusan_id', 'left')->get()->result_array();
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

  public function allmapel()
  {
    return $this->db->select('*')->from('mapel')->get()->result_array();
  }

  public function gurumapel()
  {
    return $this->db->select('*')->from('guru')->get();
  }

  public function siswaToday()
  {
    $hari = date('D');
    if($hari == 'Mon'){
      $day = 'senin';
    }elseif($hari == 'Tue'){
      $day = 'selasa';
    }elseif($hari == 'Wed'){
      $day = 'rabu';
    }elseif($hari == 'Thu'){
      $day = 'kamis';
    }elseif($hari == 'Fri'){
      $day = 'jumat';
    }elseif($hari == 'Sat'){
      $day = 'sabtu';
    }elseif($hari == 'Sun'){
      $day = 'minggu';
    }
    // $data['jam_masuk'] <= $cek_jadwal->jam_keluar && $data['jam_masuk'] >= $cek_jadwal->jam_masuk;
    return $this->db->select('*, siswa.nama as nama_siswa')->from('siswa')->join('kelas', 'siswa.kelas_id=kelas.kelas_id', 'left')->join('jadwal', 'kelas.kelas_id=id_kelas')->join('mapel', 'jadwal.id_mapel=mapel.mapel_id')->join('ruangan', 'jadwal.id_ruangan=ruangan.ruangan_id')->join('guru', 'jadwal.id_guru=guru.id')->where('hari', $day)->get()->result_array();
  }

  public function kepalasekolah()
  {
    return $this->db->select('*')->from('kepala_sekolah')->join('guru', 'id_guru=guru.id', 'left')->get()->row_array();
  }

}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */