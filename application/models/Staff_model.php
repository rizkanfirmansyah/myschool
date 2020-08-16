
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Staff_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function all()
  {
    return $this->db->select('*')->from('staff_jabatan')->join('guru', 'staff_jabatan.guru_id=guru.id', 'left')->join('jabatan', 'staff_jabatan.jabatan_id=jabatan.id_jabatan', 'left')->get()->result_array();
  }

  public function kabag($id)
  {
    return $this->db->select('*')->from('staff_jabatan')->join('guru', 'staff_jabatan.guru_id=guru.id', 'left')->join('jabatan', 'staff_jabatan.jabatan_id=jabatan.id_jabatan', 'left')->where('jabatan.nama_jabatan', $id)->get()->row_array();
  }

  public function staff($id)
  {
    return $this->db->select('*')->from('staff_jabatan')->join('guru', 'staff_jabatan.guru_id=guru.id', 'left')->join('jabatan', 'staff_jabatan.jabatan_id=jabatan.id_jabatan', 'left')->where('jabatan.nama_j  abatan', $id)->get()->result_array();
  }

  // ------------------------------------------------------------------------

}

/* End of file Staff_model.php */
/* Location: ./application/models/Staff_model.php */