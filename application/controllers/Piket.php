<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Piket extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
  }

  public function index()
  {
    show_404();
  }

  public function guru()
  {
    $data = [
      'title' => 'Absen Guru',
      'user' => $this->user->getUserSession(),
      'guru' => $this->db->get('guru')->result_array()
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('piket/guru/index', $data);
    $this->load->view('templates/footer');
  }

  public function absen_guru()
  {
        $this->db->where('id_guru', $_POST['id_guru']);
        $this->db->where('DAY(date)', date('d'));
        $this->db->where('MONTH(date)', date('m'));
        $this->db->where('YEAR(date)', date('Y'));
        $check = $this->db->get('absen_guru')->row();

        if($check->keterangan == $_POST['keterangan']){
            $this->db->where('id_absen', $check->id_absen)->delete('absen_guru');
            $swal=[
                'tipe' => 'warning',
                'pesan' => 'Guru dengan NIP/NUPTK '.$_POST['id_guru'].' tidak jadi absen'
            ];
            $this->session->set_flashdata($swal);
            die;
        }elseif($check){
            $swal=[
                'tipe' => 'error',
                'pesan' => 'Guru dengan NIP/NUPTK '.$_POST['id_guru'].' sudah absen'
            ];
            $this->session->set_flashdata($swal);
            die;
        }

        $this->db->insert('absen_guru', $_POST);
        $swal=[
            'tipe' => 'success',
            'pesan' => 'Guru dengan NIP/NUPTK '.$_POST['id_guru'].' berhasil absen'
        ];
        $this->session->set_flashdata($swal);
  }

}


/* End of file Piket.php */
/* Location: ./application/controllers/Piket.php */