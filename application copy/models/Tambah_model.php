
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tambah_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function dataAngkatan()
  {
    $this->db->insert('angkatan', ['angkatan_nama' => htmlspecialchars($this->input->post('angkatan'))]);
    $swal = [
      'tipe' => 'success',
      'pesan' => 'Data angkatan berhasil ditambahkan'
    ];

    $this->session->set_flashdata($swal);
    redirect('kurikulum/angkatan');
  }

  // ------------------------------------------------------------------------

}

/* End of file Tambah_model.php */
/* Location: ./application/models/Tambah_model.php */