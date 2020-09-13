<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tu_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function siswadsp()
  {
    return $this->db->select('*')->from('siswa')->join('data_dpp', 'siswa_nis=siswa.nis', 'left')->join('kelas', 'kelas.kelas_id=siswa.kelas_id')->get();
  }

  public function dspjml()
  {
    return $this->db->select('*')->from('siswa')->join('data_dpp', 'siswa_nis=siswa.nis')->get();
  }

  public function dspjmk()
  {
    return $this->db->select('*')->from('siswa')->join('data_dpp', 'siswa_nis=siswa.nis', 'left')->where('!data_dpp.nominal')->get();
  }

  public function dspjmb()
  {
    return $this->db->select('*')->from('siswa')->join('data_dpp', 'siswa.nis=siswa_nis', 'left')->where('nis!=siswa_nis')->get();
  }

  public function sppjml()
  {
    return $this->db->select('*')->from('siswa')->join('data_spp', 'siswa_nis=siswa.nis')->group_by('siswa_nis')->get();
  }

  public function sppjmb()
  {
    return $this->db->select('*')->from('siswa')->get();
  }

  public function siswaspp()
  {
    return $this->db->select('*, SUM(data_spp.nominal) as jml')->from('siswa')->join('data_spp', 'siswa_nis=siswa.nis', 'left')->join('kelas', 'kelas.kelas_id=siswa.kelas_id')->group_by('siswa_nis')->get();
  }

  // ------------------------------------------------------------------------

}

/* End of file Tu_model.php */
/* Location: ./application/models/Tu_model.php */