<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Setup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        maintanance_check();
        log_history();
        $this->load->model('User_model', 'user');
        $this->load->model('Data_model', 'data');
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