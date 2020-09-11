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
        'materi' => $this->Guru->getDataMateri()->result_array(),
        'mapel' => $this->Guru->getDataMapel()->result_array(),
        'jmlmateri' => $this->Guru->getDataMateri()->num_rows(),
        'tugas' => $this->Guru->getDataTugas()->result_array(),
        'jmltugas' => $this->Guru->getDataTugas()->num_rows(),
        'absen' => $this->Guru->getDataAbsenToday(),
        'data1' => $this->Guru->getAbsenGuru()->result_array()
      ];

      // var_dump($data['tugas']);
      // die;

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('guru/index', $data);
      $this->load->view('templates/footer');
    }

    public function download($id, $file_id)
    {
      if($id == 'materi'){
        $this->_materi_download($file_id);
      }elseif($id == 'tugas'){
        $this->_tugas_download($file_id);
      }
    }

    public function materi($id, $kelas)
    {
      if($id == 'kelas'){
        $this->_kelas_siswa($kelas);
      }
    }

    public function tugas($id, $kelas)
    {
      if($id == 'kelas'){
        $this->_tugas_siswa($kelas);
      }
    }

    public function _kelas_siswa($kelas_id)
    {
      $kelas = $this->db->get_where('kelas', ['kelas_id' => $kelas_id])->row()->nama_kelas;
      $data = [
        'user' => $this->user->getUserSession(),
        'guru' => $this->Guru->guruSession(),
        'siswakelas' => $this->Guru->getDataKelasMateri($kelas_id)->result_array(),
        'jmlsiswa' => $this->Guru->getDataKelasMateri($kelas_id)->num_rows(),
        'jmlsiswamengerjakan' => $this->Guru->getDataSiswaMengerjakan($kelas_id)->num_rows(),
        'siswamengerjakan' => $this->Guru->getSiswaMengerjakan($kelas_id)->result_array(),
        'title' => 'Data Siswa Kelas '. $kelas,
      ];

      // var_dump($data['siswa']);
      // die;

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('guru/materi/kelas', $data);
      $this->load->view('templates/footer');
    }

    public function _tugas_siswa($kelas_id)
    {
      $kelas = $this->db->get_where('kelas', ['kelas_id' => $kelas_id])->row()->nama_kelas;
      $data = [
        'user' => $this->user->getUserSession(),
        'guru' => $this->Guru->guruSession(),
        'siswakelas' => $this->Guru->getDataKelasTugas($kelas_id)->result_array(),
        'jmlsiswa' => $this->Guru->getDataKelasTugas($kelas_id)->num_rows(),
        'jmlsiswamengerjakan' => $this->Guru->getDataSiswaMengerjakanTugas($kelas_id)->num_rows(),
        'siswamengerjakan' => $this->Guru->getSiswaMengerjakanTugas($kelas_id)->result_array(),
        'title' => 'Data Siswa Kelas '. $kelas,
      ];

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('guru/tugas/kelas', $data);
      $this->load->view('templates/footer');
    }

    public function _materi_download($file_id)
    {
      $materi = $this->db->get_where('data_materi', ['id' => $file_id])->row();
      $data = [
        'user' => $this->user->getUserSession(),
        'guru' => $this->Guru->guruSession(),
        'title' => 'File Materi '. $materi->nama_materi,
        'file' => $this->db->get_where('data_file', ['id_materi' => $file_id])->result_array(),
        'jmlfile' => $this->db->get_where('data_file', ['id_materi' => $file_id])->num_rows()
      ];

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('guru/download/materi', $data);
      $this->load->view('templates/footer');
    }

    public function _tugas_download($file_id)
    {
      $materi = $this->db->get_where('data_tugas', ['id' => $file_id])->row();
      $data = [
        'user' => $this->user->getUserSession(),
        'guru' => $this->Guru->guruSession(),
        'title' => 'File Materi '. $materi->nama_tugas,
        'file' => $this->db->get_where('data_file', ['id_materi' => $file_id])->result_array(),
        'jmlfile' => $this->db->get_where('data_file', ['id_materi' => $file_id])->num_rows()
      ];

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('guru/download/materi', $data);
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