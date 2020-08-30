<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Kurikulum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        maintanance_check();
        log_history();
        $this->load->model('User_model', 'user');
        $this->load->model('Data_model', 'data');
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Kurikulum_model', 'Kurikulum');
    }

    public function jadwal()
    {
        $data= [
            'title' => 'Data Jadwal',
            'user' => $this->user->getUserSession(),
            'jmlruangan' => $this->data->ruangan()->num_rows(),
            'jmlkelas' => $this->siswa->kelas()->num_rows(),
            'jmlguru' => $this->guru->gurumapel()->num_rows(),
            'ruangan' => $this->data->ruangan()->result_array(),
            'kelas' => $this->siswa->kelas()->result_array(),
            'guru' => $this->guru->gurumapel()->result_array(),
            'all' => $this->Kurikulum->jadwal()->result_array(),
            'mapel' => $this->Kurikulum->mapel()->result_array(),
            'jmlmapel' => $this->Kurikulum->mapel()->num_rows(),
        ];

        // echo"<pre>";
        // var_dump($data['all']);
        // echo"</pre>";
        // die;
        $this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('kurikulum/jadwal/index');
    	$this->load->view('templates/footer', $data);
    }

    public function jadwalujian()
    {
        $data= [
            'title' => 'Data Jadwal Ujian',
            'user' => $this->user->getUserSession(),
            'jmlruangan' => $this->data->ruangan()->num_rows(),
            'jmlkelas' => $this->siswa->kelas()->num_rows(),
            'jmlguru' => $this->guru->gurumapel()->num_rows(),
            'ruangan' => $this->data->ruangan()->result_array(),
            'kelas' => $this->siswa->kelas()->result_array(),
            'guru' => $this->guru->gurumapel()->result_array(),
            'all' => $this->Kurikulum->jadwal()->result_array(),
            'ujian' => $this->Kurikulum->ujian()->result_array(),
            'jmlujian' => $this->Kurikulum->ujian()->num_rows(),
            'jadwalujian' => $this->Kurikulum->jadwalujian()->result_array(),
        ];

        // echo"<pre>";
        // var_dump($data['ujian']);
        // echo"</pre>";
        // die;
        $this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('kurikulum/ujian/jadwal');
    	$this->load->view('templates/footer', $data);
    }


    public function gallery()
    {
    	$data['title'] = "Gallery";
    	$data['user'] = $this->user->getUserSession();
    	$data['gallery'] = $this->data->getDataGallery();
    	
    	$this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('setup/gallery/index');
    	$this->load->view('templates/footer', $data);
    }

}