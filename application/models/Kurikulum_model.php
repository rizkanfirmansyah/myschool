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

  // ------------------------------------------------------------------------

}

/* End of file Kurikulum_model.php */
/* Location: ./application/models/Kurikulum_model.php */