<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Siswa extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Siswa_model', 'siswa');
    $this->load->model('User_model', 'user');
  }

  public function dashboard()
  {
    $data = [
      'title' => 'Dashboard',
      'siswa' => $this->siswa->store(),
      'user' => $this->user->getUserSession(),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('guru/siswa', $data);
    $this->load->view('templates/footer');
  }

}


/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */