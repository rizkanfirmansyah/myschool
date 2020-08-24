
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
    return $this->db->select('*')->from('staff_jabatan')->join('guru', 'staff_jabatan.guru_id=guru.id', 'left')->join('jabatan', 'staff_jabatan.jabatan_id=jabatan.id_jabatan', 'left')->where('jabatan.nama_jabatan', $id)->get()->result_array();
  }

  public function staffbag()
  {
    // $this->db->where('id_jabatan !=', 1);
    return $this->db->get('jabatan')->result_array();
  }

  public function guru()
  {
    return $this->db->select('*')->from('guru')->join('staff_jabatan', 'guru.id=staff_jabatan.guru_id', 'left')->where('guru_id', null)->get()->result_array();
  }

  public function staffjabatan()
  {
    return $this->db->get('jabatan')->result_array();
  }

  // ------------------------------------------------------------------------

}

/* End of file Staff_model.php */
/* Location: ./application/models/Staff_model.php */