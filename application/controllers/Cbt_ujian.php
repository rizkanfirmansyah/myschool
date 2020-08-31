<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cbt_ujian extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Exam_model', 'exam');
  }

  public function index()
  {
    // 
  }

  public function siswa_ujian()
  {
    $nis = base64_decode(urldecode($_GET['nis']));  
    $idujian = $_GET['id_u'];  
    $data = [
      'siswa' => $this->exam->datasiswa($nis)->row_array(),
      'ujian' => $this->exam->dataujian($idujian)->row_array()
    ];
    $this->load->view('cbt_ujian/templates/header',$data);
    $this->load->view('cbt_ujian/index', $data);
    $this->load->view('cbt_ujian/templates/footer', $data);
  }

}


/* End of file Cbt_ujian.php */
/* Location: ./application/controllers/Cbt_ujian.php */