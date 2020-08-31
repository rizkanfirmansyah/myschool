<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Kurikulum_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function jadwal()
  {
    return $this->db->select('*, jadwal.status as jadwal_status')->from('jadwal')->join('mapel', 'id_mapel=mapel_id', 'left')->join('ruangan', 'id_ruangan=ruangan_id', 'left')->join('kelas', 'id_kelas=kelas_id', 'left')->join('guru', 'jadwal.id_guru=guru.id', 'left')->join('data_jenjang', 'id_jenjang=jenjang_id', 'left')->get();
  }

  public function mapel()
  {
    return $this->db->select('*')->from('mapel')->join('data_jenjang', 'id_jenjang=jenjang_id', 'left')->get();
  }

  public function getEditJadwal($id)
  {
    $this->db->where('jadwal_id', $id);
    return $this->db->select('*, jadwal.status as jadwal_status')->from('jadwal')->join('mapel', 'id_mapel=mapel_id', 'left')->join('ruangan', 'id_ruangan=ruangan_id', 'left')->join('kelas', 'id_kelas=kelas_id', 'left')->join('guru', 'jadwal.id_guru=guru.id', 'left')->join('data_jenjang', 'id_jenjang=jenjang_id', 'left')->get();
  }

  public function ujian()
  {
    return $this->db->select('*')->from('cbt_ujian')->join('mapel', 'id_mapel=mapel_id', 'left')->join('data_jenjang', 'id_jenjang=jenjang_id', 'left')->join('tipe_ujian', 'id_tipe_ujian=tipe')->where('tipe_ujian', 'UAS')->or_where('tipe_ujian', 'UTS')->get();
  }

  public function jadwalujian()
  {
    return $this->db->select('*, jadwal_ujian.id as idjadwal')->from('jadwal_ujian')->join('cbt_ujian', 'id_ujian=cbt_ujian.id', 'left')->join('mapel', 'id_mapel=mapel_id', 'left')->join('data_jenjang', 'id_jenjang=jenjang_id', 'left')->join('kelas', 'id_kelas=kelas_id')->join('tipe_ujian', 'id_tipe_ujian=tipe')->join('ruangan', 'id_ruangan=ruangan.ruangan_id')->get();
  }

  public function editujian($id)
  {
    $this->db->where('jadwal_ujian.id', $id);
    return $this->db->select('*, jadwal_ujian.id as idjadwal')->from('jadwal_ujian')->join('cbt_ujian', 'id_ujian=cbt_ujian.id', 'left')->join('mapel', 'id_mapel=mapel_id', 'left')->join('data_jenjang', 'id_jenjang=jenjang_id', 'left')->join('kelas', 'id_kelas=kelas_id')->join('tipe_ujian', 'id_tipe_ujian=tipe')->join('ruangan', 'id_ruangan=ruangan.ruangan_id')->get();
  }

  // ------------------------------------------------------------------------

}

/* End of file Kurikulum_model.php */
/* Location: ./application/models/Kurikulum_model.php */