<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Siswa_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function store()
  {
    $this->db->where('nis', $this->session->userdata('nama'));
    return $this->db->select('*')->from('siswa')->join('kelas', 'siswa.kelas_id=kelas.kelas_id', 'left')->join('jurusan', 'jurusan.jurusan_id=kelas.jurusan_id', 'left')->join('angkatan', 'siswa.angkatan_id=angkatan.angkatan_id')->get()->row_array();
    
  }

  public function all()
  {
    return $this->db->select('*')->from('siswa')->join('kelas', 'siswa.kelas_id=kelas.kelas_id', 'left')->join('jurusan', 'jurusan.jurusan_id=kelas.jurusan_id', 'left')->join('angkatan', 'siswa.angkatan_id=angkatan.angkatan_id')->get()->result_array();
  }
  public function allsiswa()
  {
    return $this->db->select('*')->from('siswa')->join('kelas', 'siswa.kelas_id=kelas.kelas_id', 'left')->join('jurusan', 'jurusan.jurusan_id=kelas.jurusan_id', 'left')->get()->result();
  }

  public function siswa()
  {
    return $this->db->get('siswa');
  }

  public function getDataDiri($id)
  {
    return $this->db->select('*')->from('siswa')->join('kelas', 'siswa.kelas_id=kelas.kelas_id', 'left')->join('jurusan', 'jurusan=jurusan.jurusan_id')->where('nis', $id)->get()->row();
  }

  public function HasilUjian($id, $nis)
  {
		return $this->db->select('*')->from('data_nilai_ujian')->join('siswa', 'nis=id_siswa', 'left')->join('kelas', 'id_kelas=kelas.kelas_id')->join('cbt_ujian', 'id_ujian=cbt_ujian.id')->join('mapel', 'id_mapel=mapel_id')->where('id_ujian', $id)->where('id_siswa', $nis)->get()->row();
  }

  public function datasiswa()
  {
    return $this->db->select('*')->from('siswa')->join('profile_siswa', 'siswa.siswa_id=profile_siswa.siswa_id', 'right')->get();
  }

  public function siswaMateri()
  {
    $siswa = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nama')])->row();
    return $this->db->select('*, data_materi.id as idmateri')->from('data_materi')->join('mapel', 'id_mapel=mapel.mapel_id', 'left')->where('data_materi.status', 1)->join('guru', 'id_guru=guru.id', 'left')->where('id_kelas', $siswa->kelas_id)->get();
  }

  public function siswaTugas()
  {
    $siswa = $this->db->get_where('siswa', ['nis' => $this->session->userdata('nama')])->row();
    $this->db->where('batas_waktu >', date('Y-m-d'));
    return $this->db->select('*, data_tugas.id as idtugas, data_tugas.id as idnilaitugas')->from('data_tugas')->join('mapel', 'id_mapel=mapel.mapel_id', 'left')->where('data_tugas.status', 1)->join('guru', 'id_guru=guru.id', 'left')->where('id_kelas', $siswa->kelas_id)->get();  
  }

  public function getDPPSiswa()
  {
    return $this->db->where('siswa_nis', $this->session->userdata('nama'))->get('data_dpp');
  }

  public function siswaTugasGuru()
  {
    return $this->db->select('*, data_tugas.id as idtugas')->from('data_tugas')->join('nilai_tugas', 'data_tugas.id=id_tugas', 'left')->where('id_siswa', null)->where('id_tugas', null)->get();
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
    return $this->db->get('jurusan')->num_rows();
  }

  public function siswaAngkatan()
  {
    return $this->db->select('siswa.*, angkatan.*, count(siswa.angkatan_id) as jml_siswa')->from('siswa')->join('angkatan', 'siswa.angkatan_id=angkatan.angkatan_id')->group_by('siswa.angkatan_id')->get() ->result_array();
  }

  public function siswaAbsen()
  {
    $hari = date('d-M-Y');
    return $this->db->get_where('data_absen', ['date' => $hari])->row_array();
  }

  public function siswaUjian()
  {
    $nis = $this->session->userdata('nama');
    $kelas = $this->db->get_where('siswa', ['nis' => $nis])->row()->kelas_id;
    // $this->db->where('DAY(mulai)', date('d'));
    // $this->db->where('MONTH(mulai)', date('m'));
    $this->db->where('YEAR(mulai)', date('Y'));
    $this->db->where('id_kelas', $kelas);
    return $this->db->select('*, cbt_ujian.id')->from('cbt_ujian')->join('jadwal_ujian', 'id_ujian=cbt_ujian.id', 'left')->join('tipe_ujian', 'tipe=id_tipe_ujian')->join('mapel', 'id_mapel=mapel_id')->get();
  }

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */