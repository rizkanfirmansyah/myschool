<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         if (!$this->session->userdata('email')) {
            redirect('auth');
        // is_logged_in();
        }
         maintanance_check();
        log_history();
        $this->load->model('Data_model', 'data');
        $this->load->model('User_model', 'user');
        $this->load->model('Kas_model', 'kas');
    }

    public function pemasukan($id)
    {
    	if ($id == 1) {$tgl = 'Januari';}
		elseif ($id == 2) {$tgl = 'Februari';} 
		elseif ($id == 3) {$tgl = 'Maret';} 
		elseif ($id == 4) {$tgl = 'April';} 
		elseif ($id == 5) {$tgl = 'Mei';} 
		elseif ($id == 6) {$tgl = 'Juni';} 
		elseif ($id == 7) {$tgl = 'Juli';} 
		elseif ($id == 8) {$tgl = 'Agustus';} 
		elseif ($id == 9) {$tgl = 'September';}
		elseif ($id == 10) {$tgl = 'Oktober';} 
		elseif ($id == 11) {$tgl = 'November';} 
		elseif ($id == 12) {$tgl = 'Desember';} ;
    	$data['title'] = 'Data Kas Bulan '. $tgl;
        $data['user'] = $this->data->getUserSession();
        $data['nama'] = $this->user->getUserAllKas();
        $data['kas'] = $this->kas->getPemasukanPerBulan($id);
        $data['jumlahLaba'] = $this->kas->getPemasukanJumlahPerBulan($id);
        $data['bulan'] = $tgl;
        $coba = $this->uri->segment(2);
        $data['identity'] = $coba;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/kas/pemasukan', $data);
        $this->load->view('templates/footer');
    }

    public function pengeluaran($id)
    {
    	if ($id == 1) {$tgl = 'Januari';}
		elseif ($id == 2) {$tgl = 'Februari';} 
		elseif ($id == 3) {$tgl = 'Maret';} 
		elseif ($id == 4) {$tgl = 'April';} 
		elseif ($id == 5) {$tgl = 'Mei';} 
		elseif ($id == 6) {$tgl = 'Juni';} 
		elseif ($id == 7) {$tgl = 'Juli';} 
		elseif ($id == 8) {$tgl = 'Agustus';} 
		elseif ($id == 9) {$tgl = 'September';}
		elseif ($id == 10) {$tgl = 'Oktober';} 
		elseif ($id == 11) {$tgl = 'November';} 
		elseif ($id == 12) {$tgl = 'Desember';} ;
    	$data['title'] = 'Data Pengeluaran Bulan '. $tgl;
        $data['user'] = $this->data->getUserSession();
        $data['nama'] = $this->user->getUserAllKas();
        $data['kas'] = $this->kas->getPengeluaranPerBulan($id);
        $data['jumlahLaba'] = $this->kas->getPengeluaranJumlahPerBulan($id);
        $data['bulan'] = $tgl;
        $coba = $this->uri->segment(2);
        $data['identity'] = $coba;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/kas/pemasukan', $data);
        $this->load->view('templates/footer');
    }

}