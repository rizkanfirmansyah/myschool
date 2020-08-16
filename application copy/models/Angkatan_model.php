<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Angkatan_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function rows()
  {
    return $this->db->get('angkatan')->num_rows();
  }

  // ------------------------------------------------------------------------

}

/* End of file Angkatan_model.php */
/* Location: ./application/models/Angkatan_model.php */