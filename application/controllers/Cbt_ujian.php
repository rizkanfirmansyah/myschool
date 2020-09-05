<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cbt_ujian extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Exam_model', 'exam');
    if ($this->session->noSoal == null) {
      $this->session->noSoal = 1;
    }
   
  }

  public function index()
  {
    // 
  }

  public function siswa_ujian()
  { 
    if($this->session->userdata('siswa') && $this->session->userdata('ujian')){
      redirect('ujian/ujian');
    }
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

  public function check_ujian($id)
  {
    if($id == 'identitas'){
      $this->_input_identitas();
    }elseif($id == 'authentication'){
      $this->_input_authentication();
    }
  }

  private function _input_identitas()
  { 
    if($this->session->ujian && $this->session->siswa){
      redirect('ujian/ujian');
    }
    $cek = $this->db->where($_POST)->get('data_nilai_ujian')->row();
    $ujian = $this->input->post('id_ujian');
    $siswa = $this->session->nama;
    $cek1 = $this->db->get_where('cbt_soal',['id_ujian' => $ujian])->result();
    if($cek == null){
      $this->db->insert('data_nilai_ujian', $_POST);
      foreach ($cek1 as $soal ) {
        $data =[
          'id_soal' => $soal->id,
          'id_ujian' => $soal->id_ujian,
          'id_siswa' => $siswa,
          'id_no_urut' => $soal->no_urut,
        ];
        $this->db->insert('data_jawaban', $data);
      }
    }else{  
      $this->db->where($_POST)->update('data_nilai_ujian', $_POST);
    }
    // echo json_encode($cek);
  }

  private function _input_authentication()
  {
    $code = $this->input->post('kode');
    $cek1 = $this->input->post('cek');
    $id = $this->input->post('ujian');
    $cek = $this->db->get_where('cbt_ujian', ['id' => $id])->row();
    if($code != base64_decode($cek->auth_key) || $cek1 != 'ujian'){
      echo json_encode([
        'tipe'=>'error',
        'pesan'=>'Kode authentication salah'
      ]);
    }else{
      echo json_encode([
        'tipe'=>'success',
        'pesan'=>'Kode authentication benar'
      ]);
    }
  }

  public function set_session_ujian()
  {
    $nis = $this->session->userdata('nama');
    $id_ujian = $this->input->post('ujian');
    $data = ['siswa'=>$nis, 'ujian' => $id_ujian];
    $this->session->set_userdata($data);
  }

  public function ujian()
  {
    $this->load->view('cbt_ujian/ujian/templates/header');
    $this->load->view('cbt_ujian/ujian/index');
    $this->load->view('cbt_ujian/ujian/templates/footer');
  }

  public function soal_ujian()
  {
    $urut = $this->input->post('noUrut');
    $idSiswa = $this->session->userdata('nama');
    if($this->session->userdata('ujian') == null){
      $idujian = $this->input->post('ujian');
    }else{
      $idujian = $this->session->userdata('ujian');
    }
    // ECHO "URUT $urut";
    if ($urut != 0) {
      $this->session->noSoal = $urut;
    }
    $noSoal = $this->session->noSoal;
    $data = $this->db->get_where('cbt_soal', ['id_ujian' => $idujian, 'no_urut' => $noSoal])->row();
    // echo $this->db->last_query();
    $data1 = $this->db->get_where('cbt_ujian', ['id' => $idujian])->row();
    $data2 = $this->db->get_where('cbt_jawaban', ['id_soal' => $data->id])->row();
    $data3 = $this->db->get_where('data_jawaban', ['id_soal' => $data->id, 'id_no_urut' => $noSoal, 'id_siswa' => $idSiswa, 'id_ujian' => 
    $idujian])->row();
    $idsoal = $data->id;
    $jawabanA = $data2->jawabanA;
    $jawabanB = $data2->jawabanB;
    $jawabanC = $data2->jawabanC;
    $jawabanD = $data2->jawabanD;
    $jawabanE = $data2->jawabanE;
    $jmlSoal = $this->db->get_where('cbt_soal', ['id_ujian' => $idujian])->num_rows();
    $waktu = $data1->akhir_at;
    $soal = $data->soal;
    $gambar = $data->file_soal;
    if (!isset($data3->jawaban)) {
      $jawaban  = 0;
    } else {
      $jawaban = $data3->jawaban;
    }
    echo json_encode((object)[
      'noSoal' => $noSoal ,
      'noSoalNext' => $noSoal+1,
      'soal' => $soal,
      'gambar' => $gambar,
      'idsoal' => $idsoal,
      'pilihan' => (object) [
        'A' => $jawabanA,
        'B' => $jawabanB,
        'C' => $jawabanC,
        'D' => $jawabanD,
        'E' => $jawabanE,
      ],
      'jmlSoal' => $jmlSoal,
      'waktu' => $waktu,
      'jawaban' => $jawaban,
    ]);
  }

  public function input_jawaban_siswa()
  {
    $data = [
      'id_soal' => $this->input->post('soal'),
      'id_no_urut' => $this->input->post('number'),
      'id_siswa' => $this->session->userdata('nama'),
      'id_ujian' => $this->session->userdata('ujian'),
      'jawaban' => $this->input->post('jawaban'),
    ];
    
    $data2 = [
      'id_soal' => $this->input->post('soal'),
      'id_no_urut' => $this->input->post('number'),
      'id_siswa' => $this->session->userdata('nama'),
      'id_ujian' => $this->session->userdata('ujian'),
    ];

    $cek = $this->db->where($data2)->get('data_jawaban')->row();
    if($cek){
      $this->db->where($data2)->update('data_jawaban', $data);
      echo json_encode('oke');
    }else{
      $this->db->insert('data_jawaban', $data);
      echo json_encode('mantap');
    } 
  }

  public function get_panel_soal()
  {
    $ujian = $this->session->ujian;
    $nama = $this->session->nama;
    $data = $this->db->select('*')->from('cbt_soal')->join('data_jawaban', 'cbt_soal.id=data_jawaban.id_soal', 'left')->where('cbt_soal.id_ujian', $ujian)->where('id_siswa', $nama)->get()->result();
    // echo $this->db->last_query();
    
    foreach ($data as $key) {
      $panel[] = [
        'no_urut' => $key->no_urut,
        'jawaban' => $key->jawaban,
        'selected' => ($key->no_urut == $this->session->noSoal) ? 'true' : 'false'
      ];
    }
    
    echo json_encode($panel);

  }

  public function dest_session()
  {
    $this->session->unset_userdata('ujian', 'siswa');
    redirect('siswa');
  }

}


/* End of file Cbt_ujian.php */
/* Location: ./application/controllers/Cbt_ujian.php */