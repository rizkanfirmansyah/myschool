<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Inventaris extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    redirect('auth/blocked');
  }

  public function daftar()
  {
    $data = [
      'title' => 'Data Inventaris '
    ];
      $this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('inventaris/index');
    	$this->load->view('templates/footer', $data);
  }

  public function transaksi()
  {
    
  }

}


/* End of file Inventaris.php */
/* Location: ./application/controllers/Inventaris.php */