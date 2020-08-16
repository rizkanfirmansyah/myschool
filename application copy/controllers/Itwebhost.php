<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Itwebhost extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
         maintanance_check();
        log_history();

        $this->load->model('Data_model', 'data');
        $this->load->model('User_model', 'user');
        $this->load->model('Kas_model', 'kas');
    }

    public function index($folder)
    {
        $id_user = $this->session->userdata('email');
    	$this->db->where('id_folder', 1);
    	$cek_folder = $this->db->get_where('data_folder', ['id_user' => $id_user])->row_array();
    	$folder_name = $cek_folder['folder'];
    	$check = $this->db->get_where('data_folder', ['folder' => $folder])->row_array();
    	if ($check['is_active'] == 2) {
    		redirect('auth/blocked');
    	}
    	$path = 'application/views/hosting/user/'.$folder_name.'/';
    	if (file_exists($path.$folder)) {
    	} else {
    		
    	}
    		$sessionFolder = $this->session->userdata('folder');
    	$this->db->where('file', 'index.html');
    	$host = $this->db->get_where('data_hosting', ['nama_folder' => $folder])->row_array();
    	$this->session->set_userdata('folder', $folder);
    	if ($host) {
	    	$this->load->view('hosting/user/'. $folder_name . '/' . $folder . '/index.html');
    	}elseif ($folder != 'index.html' || $folder != 'index.php'){
    		$this->load->view('hosting/user/'. $folder_name . '/' . $sessionFolder . '/' . $folder);
    	}else{
	    	$this->load->view('hosting/user/'. $folder_name . '/' . $folder . '/index');
    	}
    }
}