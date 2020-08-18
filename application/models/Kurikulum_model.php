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
    return $this->db->select('*, jadwal.status as jadwal_status')->from('jadwal')->join('mapel', 'id_mapel=mapel_id', 'left')->join('ruangan', 'id_ruangan=ruangan_id', 'left')->join('kelas', 'id_kelas=kelas_id', 'left')->join('guru', 'kelas.guru_id=guru.id', 'left')->get();
  }

  // ------------------------------------------------------------------------

}

/* End of file Kurikulum_model.php */
/* Location: ./application/models/Kurikulum_model.php */