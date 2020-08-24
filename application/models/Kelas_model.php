<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function all()
  {
    return $this->db->select('*')->from('kelas')
            ->join('jurusan', 'kelas.jurusan_id=jurusan.jurusan_id', 'left')
            ->join('ruangan', 'kelas.ruangan_id=ruangan.ruangan_id', 'left')
            ->join('guru', 'kelas.guru_id=guru.id', 'left')
            ->get();
  }


  public function kelas($id)
  {
    return $this->db->select('*')->from('kelas')
            ->join('jurusan', 'kelas.jurusan_id=jurusan.jurusan_id', 'left')
            ->join('ruangan', 'kelas.ruangan_id=ruangan.ruangan_id', 'left')
            ->join('guru', 'kelas.guru_id=guru.id', 'left')
            ->where('kelas_id', $id)
            ->get();
  }

  // ------------------------------------------------------------------------

}

/* End of file Kelas_model.php */
/* Location: ./application/models/Kelas_model.php */