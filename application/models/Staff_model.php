
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
    return $this->db->select('*')->from('staff')->join('jabatan', 'staff.id_jabatan=jabatan.id_jabatan', 'left')->join('users', 'staff.email=users.email', 'left')->get()->result_array();
  }

  public function staff()
  {
    return $this->db->select('*')->from('staff')->join('jabatan', 'staff.id_jabatan=jabatan.id_jabatan', 'left')->join('users', 'staff.email=users.email', 'left')->where('staff.id_jabatan', 1)->get()->result_array();
  }

  public function kesiswaan()
  {
    return $this->db->select('*')->from('staff_jabatan')->join('staff', 'staff_jabatan.staff_id=staff.id_staff', 'left')->where('jabatan_id', 1)->get()->row_array();
  }

  public function Kurikulum()
  {
    return $this->db->select('*')->from('staff_jabatan')->join('staff', 'staff_jabatan.staff_id=staff.id_staff', 'left')->where('jabatan_id', 2)->get()->row_array();
  }

  public function Tatausaha()
  {
    return $this->db->select('*')->from('staff_jabatan')->join('staff', 'staff_jabatan.staff_id=staff.id_staff', 'left')->where('jabatan_id', 3)->get()->row_array();
  }

  public function Prasarana()
  {
    return $this->db->select('*')->from('staff_jabatan')->join('staff', 'staff_jabatan.staff_id=staff.id_staff', 'left')->where('jabatan_id', 4)->get()->row_array();
  }

  public function sKurikulum()
  {
    return $this->db->select('*')->from('staff')->join('jabatan', 'staff.id_jabatan=jabatan.id_jabatan', 'left')->join('users', 'staff.email=users.email', 'left')->where('staff.id_jabatan', 2)->get()->result_array();
  }

  public function sTataUsaha()
  {
    return $this->db->select('*')->from('staff')->join('jabatan', 'staff.id_jabatan=jabatan.id_jabatan', 'left')->join('users', 'staff.email=users.email', 'left')->where('staff.id_jabatan', 3)->get()->result_array();
  }

  public function sPrasarana()
  {
    return $this->db->select('*')->from('staff')->join('jabatan', 'staff.id_jabatan=jabatan.id_jabatan', 'left')->join('users', 'staff.email=users.email', 'left')->where('staff.id_jabatan', 4)->get()->result_array();
  }

  // ------------------------------------------------------------------------

}

/* End of file Staff_model.php */
/* Location: ./application/models/Staff_model.php */