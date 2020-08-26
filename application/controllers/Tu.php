<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tu extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('User_model', 'user');
    $this->load->model('Tu_model', 'tu');
  }

  public function dsp()
  {
    $data = [
      'title' => 'DSP',
      'user' => $this->user->getUserSession(),
      'dpp' => $this->db->get_where('setup_spp', ['tipe' => 'dpp'])->row()->nominal,
      'dppjml' => $this->db->select_sum('nominal')->get('data_dpp')->row()->nominal,
      'siswa'=> $this->tu->siswadsp()->result_array(),
      'siswadsp'=> $this->tu->dspjml()->num_rows(),
      // 'siswadspk'=> $this->tu->dspjmk()->num_rows()-$this->tu->dspjml()->num_rows(),
      'siswadspb'=> $this->tu->dspjmb()->num_rows(),
    ];

    // var_dump($data['siswadspk']);
    // die;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('tu/dpp/index', $data);
    $this->load->view('templates/footer');
  }

  public function spp()
  {
    $data = [
      'title' => 'SPP',
      'user' => $this->user->getUserSession(),
      'spp' => $this->db->get_where('setup_spp', ['tipe' => 'spp'])->row()->nominal,
      'sppjml' => $this->db->select_sum('nominal')->get('data_spp')->row()->nominal,
      'siswaspp'=> $this->tu->sppjml()->num_rows(),
      'siswasppb'=> $this->tu->sppjmb()->num_rows() - $this->tu->sppjml()->num_rows(),
      'siswa'=> $this->tu->siswaspp()->result_array(),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('tu/spp/index', $data);
    $this->load->view('templates/footer');
  }

  public function bayar($tipe, $nis)
  {
    if($tipe == 'dsp'){
      $this->bayardsp($nis);
    }elseif($tipe == 'spp'){
      $this->bayarspp($nis);
    }
  }

  public function nominal($id)
  {
    if($id == 'dsp'){
      $this->_bayardsp();
    }elseif($id == 'spp'){
      $this->_bayarspp();
    }
  }

  private function _bayardsp()
  {
    $nis = $this->input->post('nis');
    $cek = $this->db->get_where('data_dpp', ['siswa_nis' => $nis])->row();
    if($cek){
      $data = [
        'siswa_nis' => $nis,
        'nominal' => $this->input->post('nominal') + $cek->nominal,
        'tanggal' => date('d-m-Y'),
        'dpp_id' => 2,
      ];
      $this->db->where('id', $cek->id)->update('data_dpp', $data);
      $swal = [
        'tipe' => 'success',
        'pesan' => 'DSP berhasil dibayar'
      ];
      $this->session->set_flashdata($swal);
      redirect('tu/dsp');
    }else{
      $data = [
        'siswa_nis' => $nis,
        'nominal' => $this->input->post('nominal'),
        'tanggal' => date('d-m-Y'),
        'dpp_id' => 2,
      ];
      $this->db->insert('data_dpp', $data);
      $swal = [
        'tipe' => 'success',
        'pesan' => 'DSP berhasil dibayar'
      ];
      $this->session->set_flashdata($swal);
      redirect('tu/dsp');
    }
    

  }

  private function _bayarspp()
  {
    $nis = $this->input->post('nis');
    $bulan = $this->input->post('bulan');
    $data = [
      'siswa_nis' => $nis,
      'nominal' => $this->input->post('nominal'),
      'tanggal' => date('d-m-Y'),
      'bulan' => $bulan,
    ];
    $cek = $this->db->get_where('data_spp', ['siswa_nis' => $nis, 'bulan' => $bulan])->row();
    if($cek != null){
      $swal = [
        'tipe' => 'error',
        'pesan' => 'SPP gagal dibayar, siswa telah membayar pada bulan ini'
      ];
      $this->session->set_flashdata($swal);
      redirect('tu/bayar/spp/'.$nis);
    }
    $this->db->insert('data_spp', $data);
    $swal = [
      'tipe' => 'success',
      'pesan' => 'SPP berhasil dibayar'
    ];
    $this->session->set_flashdata($swal);
    redirect('tu/bayar/spp/'.$nis);
  }

  public function bayardsp($nis)
  {
    $data = [
      'title' => 'Bayar DSP',
      'user' => $this->user->getUserSession(),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('tu/dpp/bayar', $data);
    $this->load->view('templates/footer');
  }

  public function bayarspp($nis)
  {
    $data = [
      'title' => 'SPP',
      'user' => $this->user->getUserSession(),
      'spp' => $this->db->get_where('setup_spp', ['tipe' => 'spp'])->row()->nominal,
      'bulan' => $this->db->get('bulan')->result_array(),
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('tu/dpp/bayar', $data);
    $this->load->view('templates/footer');
  }

}


/* End of file Tu.php */
/* Location: ./application/controllers/Tu.php */