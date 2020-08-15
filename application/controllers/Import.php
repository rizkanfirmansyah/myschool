<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Import extends CI_Controller
{
	public function __construct()
    {
	 parent::__construct();
        maintanance_check();
        log_history();
        $this->load->model('User_model', 'user');
        $this->load->model('Insert_model', 'insert');
        $this->load->model('Data_model', 'data');
        $this->load->model('Update_model', 'update');
        $this->load->model('Delete_model', 'delete');
        $this->load->model('Member_model', 'member');
        $this->load->model('Backend_model', 'backend');
        $this->load->model('Import_model', 'import');
        require_once APPPATH."/third_party/PHPExcel.php";
        require_once APPPATH."/third_party/PHPExcel/IOFactory.php";
         if ($this->session->userdata('role_id') != 1) {
                redirect('data/user/');
        }
    }

	public function siswa()
	{
        $check = $this->input->post('checkbox');
        if($check == null){
            // echo'wokeeeeeeee';
            $this->import->siswa();
        }else{
            $this->import->updateSiswa();
        }
    }
    
    public function guru()
    {
        $this->import->guru();
    }

    public function password($url)
    {
        if($url == 'siswa'){
            $this->db->where('password', ' ');
            $this->db->or_where('password', '-');
            $this->db->or_where('password', null);
            $data = $this->db->get('siswa')->result_array();
            foreach($data as $d){
                $password = password_hash($d['nis'], PASSWORD_DEFAULT);
                $this->db->where('id', $d['id']);
                $this->db->update('siswa', ['password' => $password]);
            }
            redirect('data/siswa');
        }
    }

}