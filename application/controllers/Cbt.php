<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cbt extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
    $this->load->model('Insert_model', 'insert');
    $this->load->model('Guru_model', 'Guru');
    $this->load->model('Cbt_model', 'Cbt');
  }

  public function ujian()
  {
    $data = [
      'title' => 'Data Ujian',
      'user' => $this->user->getUserSession(),
      'mapel' => $this->Guru->getDataMapel()->result_array(),
      'data1' => $this->Guru->getDataTipeUjian()->result_array(),
      'ujian' => $this->Cbt->store(),
    ];
    

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cbt/ujian/index', $data);
    $this->load->view('templates/footer');
  }

  public function soal()
  {
    $data = [
      'title' => 'Bank Soal',
      'user' => $this->user->getUserSession(),
      'ujian' => $this->Cbt->storeActive(),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cbt/soal/index', $data);
    $this->load->view('templates/footer');
  }
  
  private function _soal()
  {
    $this->Cbt->input_soal_ujian();
  }
  
  public function input($id)
  {
    if($id == 'ujian'){
      $this->Cbt->_input_ujian();
    }elseif($id == 'pagesoal'){
      $this->page_soal();
    }elseif($id == 'soal'){
      $this->_soal();
    }elseif($id == 'pagejawaban'){
      $this->page_jawaban();
    }elseif($id == 'jawaban'){
      $this->_input_jawaban();
    }
  }

  private function _input_jawaban()
  {
    $this->Cbt->input_jawaban();
  }

  public function update($id, $idujian)
  {
    if($id == 'status'){
      $this->Cbt->update_status_ujian($idujian);
    }elseif($id == 'ujian'){
      $this->Cbt->update_ujian($idujian);
    }elseif($id == 'pageujian'){
      $this->page_ujian_update($idujian);
    }elseif($id == 'pagesoal'){
      $this->page_soal_update($idujian);
    }elseif($id == 'filesoal'){
      $this->Cbt->update_filesoal($idujian);
    }
  }
  
  public function delete($id, $idujian)
  {
    if($id == 'ujian'){
      $this->Cbt->delete_ujian($idujian);
    }elseif($id == 'soal'){
      $this->Cbt->delete_soal($idujian);
    }elseif($id == 'filesoal'){
      $this->Cbt->delete_file_soal($idujian);
    }
  }
  
  public function upload($id, $idujian)
  {
    if($id == 'pagejawaban'){
      $this->upload_page_jawaban($idujian);
    }elseif($id == 'filejawaban'){
      $this->Cbt->upload_file_jawaban($idujian);
    }
  }

  public function upload_page_jawaban($idujian)
  {
    $data = [
      'title' => 'Bank Soal',
      'user' => $this->user->getUserSession(),
      'jawaban' => $this->Cbt->jawaban_half($idujian),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cbt/upload/filejawaban/index', $data);
    $this->load->view('templates/footer');
  }

  public function page_ujian_update($idujian)
  {
    $data = [
      'title' => 'Data Ujian',
      'user' => $this->user->getUserSession(),
      'mapel' => $this->Guru->getDataMapel()->result_array(),
      'ujian' => $this->Cbt->half($idujian),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cbt/ujian/edit/index', $data);
    $this->load->view('templates/footer');
  }

  public function page_soal()
  {
    $data = [
      'title' => 'Bank Soal',
      'user' => $this->user->getUserSession(),
      'soal' => $this->Cbt->soal()->result_array(),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cbt/soal/soal/index', $data);
    $this->load->view('templates/footer');
  }

  public function page_jawaban()
  {
    $data = [
      'title' => 'Bank Soal',
      'user' => $this->user->getUserSession(),
      'detail' => $this->Cbt->detail_jawaban()->row_array(),
      'jawaban' => $this->Cbt->get_jawaban(),
    ];

    // var_dump($data['detail']);
    // die;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cbt/soal/jawaban/index', $data);
    $this->load->view('templates/footer');
  }

  public function page_soal_update($idsoal)
  {
    $data = [
      'title' => 'Bank Soal',
      'user' => $this->user->getUserSession(),
      'soal' => $this->Cbt->get_soal_half($idsoal),
    ];

    // var_dump($data['detail']);
    // die;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cbt/soal/edit/index', $data);
    $this->load->view('templates/footer');
  }

}


/* End of file Cbt.php */
/* Location: ./application/controllers/Cbt.php */