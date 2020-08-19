<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Guru extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    maintanance_check();
    log_history();

    $this->load->model('User_model', 'user');
    $this->load->model('Data_model', 'data');
    $this->load->model('Insert_model', 'insert');
    $this->load->model('Guru_model', 'Guru');
  }

  public function siswa()
  {
    $data = [
      'title' => 'Data Siswa',
      'user' => $this->user->getUserSession(),
      'siswa' => $this->Guru->siswaToday(),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('guru/siswa', $data);
    $this->load->view('templates/footer');
  }

}


/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */