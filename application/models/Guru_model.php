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
    $id_guru = $this->db->get_where('guru', ['nip' =>  $this->session->userdata('nama')])->row();
    // $data['jam_masuk'] <= $cek_jadwal->jam_keluar && $data['jam_masuk'] >= $cek_jadwal->jam_masuk;
    $this->db->where('jam_keluar >=', date('H:i'));
    $this->db->where('jam_masuk <=', date('H:i'));
    return $this->db->select('*, siswa.nama as nama_siswa')->from('siswa')->join('kelas', 'siswa.kelas_id=kelas.kelas_id', 'left')->join('jadwal', 'kelas.kelas_id=id_kelas')->join('mapel', 'jadwal.id_mapel=mapel.mapel_id')->join('ruangan', 'jadwal.id_ruangan=ruangan.ruangan_id')->join('guru', 'jadwal.id_guru=guru.id')->where('hari', $day)->where('id_guru', $id_guru->id)->get()->result_array();
  }

  public function guruSession()
  {
    return $this->db->get_where('guru', ['nip' => $this->session->userdata('nama')])->row_array();
  }

  public function kepalasekolah()
  {
    return $this->db->select('*')->from('kepala_sekolah')->join('guru', 'id_guru=guru.id', 'left')->get()->row_array();
  }

  public function absenSiswa()
  {
    $guru_id = $this->session->userdata('nama');
    $guru = $this->db->get_where('guru', ['nip' => $guru_id])->row();
    $this->db->where('jam_keluar >=', date('H:i'));
    $this->db->where('jam_masuk <=', date('H:i'));
    $this->db->where('date', date('d-M-Y'));
    $this->db->where('jadwal.id_kelas=data_absen.id_kelas');
    return $this->db->select('*, COUNT(keterangan) as jml')->from('data_absen')->join('jadwal', 'data_absen.id_mapel=jadwal.id_mapel', 'left')->where('id_guru', $guru->id)->group_by('keterangan')->get()->result_array();
  }

  public function siswaKelas()
  {
    $guru_id = $this->session->userdata('nama');
    $guru = $this->db->get_where('guru', ['nip' => $guru_id])->row();
    return $this->db->select('*')->from('kelas')->join('jadwal', 'kelas.kelas_id=jadwal.id_kelas', 'left')->where('id_guru', $guru->id)->group_by('id_kelas')->get();
  }

  public function getDataKelasSiswa($id)
  {
    return $this->db->select('*')->from('siswa')->join('kelas', 'siswa.kelas_id=kelas.kelas_id', 'left')->where('siswa.kelas_id', $id)->get();
  }

  public function getDataMateri()
  {
    $guru_id = $this->session->userdata('nama');
    $guru = $this->db->get_where('guru', ['nip' => $guru_id])->row();
    $this->db->where('data_materi.id_guru', $guru->id);
    return $this->db->select('*, count(data_file.id_materi) as jmlfile, data_materi.date as tgl, data_materi.id as idmateri, data_materi.status as status_materi')->from('data_materi')->join('guru', 'data_materi.id_guru=guru.id', 'left')->join('mapel', 'data_materi.id_mapel=mapel.mapel_id', 'left')->join('data_file', 'data_materi.id=data_file.id_materi', 'left')->join('kelas', 'data_materi.id_kelas=kelas.kelas_id', 'left')->group_by('data_file.id_materi')->get();
  }

  public function getDataMapel()
  {
    $guru_id = $this->session->userdata('nama');
    $guru = $this->db->get_where('guru', ['nip' => $guru_id])->row();
    $this->db->where('jadwal.id_guru', $guru->id);
    return $this->db->select('*')->from('mapel')->join('jadwal', 'mapel.mapel_id=jadwal.id_mapel', 'left')->group_by('mapel_id')->get();
  }

}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */