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

  public function index()
  {
    $data = [
      'title' => 'Dashboard',
      'siswa' => $this->siswa->store(),
      'user' => $this->user->getUserSession(),
      'absen' => $this->siswa->siswaAbsen(),
      'materi' => $this->siswa->siswaMateri()->result_array(),
      'jmlmateri' => $this->siswa->siswaMateri()->num_rows(),
      'tugas' => $this->siswa->siswaTugas()->result_array(),
      'jmltugas' => $this->siswa->siswaTugas()->num_rows(),
      'tugasguru' => $this->siswa->siswaTugasGuru()->result_array(),
    ];

    // var_dump($data['tugasguru']);
    // die;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('siswa/index', $data);
    $this->load->view('templates/footer');
  }

  public function spp()
  {
    $data = [
      'title' => 'SPP',
      'siswa' => $this->siswa->store(),
      'user' => $this->user->getUserSession(),
      'bulan' => $this->db->get('bulan')->result_array(),
    ];

    // var_dump($data['tugasguru']);
    // die;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('siswa/spp/index', $data);
    $this->load->view('templates/footer');
  }

  public function dsp()
  {
    $data = [
      'title' => 'DSP',
      'siswa' => $this->siswa->store(),
      'user' => $this->user->getUserSession(),
      'jmldpp' => $this->siswa->getDPPSiswa()->result_array(),
      'nominaldsp' => $this->db->get_where('data_dpp', ['siswa_nis' => $this->session->userdata('nama')])->row()->nominal,
      'dpp' => $this->db->get_where('setup_spp', ['tipe' => 'dpp'])->row()->nominal,
      'spp' => $this->db->get_where('setup_spp', ['tipe' => 'spp'])->row()->nominal,
    ];

    // var_dump($data['jmldpp']);
    // die;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('siswa/dpp/index', $data);
    $this->load->view('templates/footer');
  }

}


/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */