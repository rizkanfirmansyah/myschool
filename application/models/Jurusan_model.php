<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function all()
  {
    return $this->db->where('jurusan_id !=', 1)->get('jurusan')->result_array();
  }

  // ------------------------------------------------------------------------

  public function jml()
  {
    return $this->db->where('jurusan_id !=', 1)->get('jurusan')->num_rows();
  }

  // ------------------------------------------------------------------------

  public function payload()
  {
    return $this->db->select_sum('payload')->where('jurusan_id !=', 1)->get('jurusan')->row_array();
  }

  // ------------------------------------------------------------------------

  public function totalpayload()
  {
    return $this->db->get_where('jurusan', ['jurusan_id' => 1])->row_array();
  }

  public function ruangan()
  {
    return $this->db->get('ruangan')->result_array();
  }

}

/* End of file Jurusan_model.php */
/* Location: ./application/models/Jurusan_model.php */