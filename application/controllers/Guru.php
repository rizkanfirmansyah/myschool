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

    public function index()
    {
      $data = [
        'title' => 'Dashboard',
        'user' => $this->user->getUserSession(),
        'siswa' => $this->Guru->siswaToday(),
        'guru' => $this->Guru->guruSession(),
        'absen' => $this->Guru->absenSiswa(),
        'kelas' => $this->Guru->siswaKelas()->result_array(),
        'jmlkelas' => $this->Guru->siswaKelas()->num_rows(),
      ];

      // var_dump($data['kelas']);
      // die;

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('guru/index', $data);
      $this->load->view('templates/footer');
    }

    public function siswa()
    {
      $data = [
        'title' => 'Data Siswa',
        'user' => $this->user->getUserSession(),
        'siswa' => $this->Guru->siswaToday(),
        'guru' => $this->Guru->guruSession(),
        'absen' => $this->Guru->absenSiswa(),
      ];

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('guru/siswa', $data);
      $this->load->view('templates/footer');
    }

    public function kelas($id)
    {
      $kelas = $this->db->get_where('kelas', ['kelas_id' => $id])->row();
      $data = [
        'user' => $this->user->getUserSession(),
        'guru' => $this->Guru->guruSession(),
        'siswa' => $this->Guru->getDataKelasSiswa($id)->result_array(),
        'jmlsiswa' => $this->Guru->getDataKelasSiswa($id)->num_rows(),
        'title' => 'Data Siswa Kelas '.$kelas->nama_kelas,
      ];

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('guru/kelas/index', $data);
      $this->load->view('templates/footer');
    }

}


/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */