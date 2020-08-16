<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Developer extends CI_Controller
{

      public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('email')) {
        //     redirect('auth/login');
        // }
     	 maintanance_check();
        log_history();
        $this->load->model('User_model', 'user');
        $this->load->model('Backend_model', 'backend');
    }

    public function setting()
    {
    	$password = $this->input->post('password');
    	$site = $this->input->post('site');
    	if ($password == 'itclub') {
    		$this->session->set_userdata('debug', 'debug');
    		$this->developer();
    	}elseif ($password != 'itclub'){
    		redirect($site);
    	}else{
    		redirect('auth/blocked');
    	}
    }


    public function developer()
    {
    	if (!$this->session->userdata('debug')) {
    		redirect('auth/blocked');
    	}else{
            $data['uiset'] = $this->backend->getDataUISet();
    		$data['user'] = $this->user->getUserSession();
    		$data['setrule'] = $this->db->get_where('tb_developer', ['setmore' => 'maintanance'])->result_array();
    		$this->db->select('id_id, id_komponen, nama_komponen');
    		$this->db->where('id_komponen', 3);
    		$this->db->where('nama_komponen !=', 'Root');
    		$data['controller'] = $this->db->get('tb_data_webcode_backend')->result_array();
	        $data['title'] = 'Developer mode';

	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('setup/developer/index', $data);
	        $this->load->view('templates/footer');
    	}
    }

    public function setrule($id)
    {
    	$data = [
    		'setting'=> strtolower($this->input->post('setting', true)),
    		'parameter'=> strtolower($this->input->post('parameter')),
    		'rule'=> $this->input->post('rule'),
    		'setmore'=> $id
    	];

    	$this->db->insert('tb_developer', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Rule have been added!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('developer/developer');
    }

    public function changerule($id, $rule)
    {
    	if ($rule == 1) {
    		$this->db->where('id', $id);
    		$this->db->set('rule', 0);
    		$this->db->update('tb_developer');
    	} elseif ($rule == 0){
    		$this->db->where('id', $id);
    		$this->db->set('rule', 1);
    		$this->db->update('tb_developer');
    	}

    	$rules = $this->db->get_where('tb_developer', ['id' => $id])->row_array();
    	if ($rules['rule'] == 1) {
    		$param = 'maintanance!';
    	} else {
    		$param = 'normal';
    	}
    	
    	
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Setting 
                '. $rules['setting'] .' and method '. $rules['parameter'] .' have been '. $param . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('developer/developer');
    }

    public function uset($param)
    {
        if ($param = 'add') {
            $this->addSetting();
        } else {
            # code...
        }
        
    }

    public function addSetting()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'value_awal' => $this->input->post('value_awal'),
            'value_akhir' => $this->input->post('value_akhir'),
            'date' => date('Y-m-d'),
            'time' => time()
        ];

        $this->db->insert('data_setting', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Setting has been added!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('user/setting');
    }

    public function changesetting($name, $value)
    {
        $this->session->set_userdata($name, $value);
        redirect('user/setting');
    }

    public function deletesetting($name)
    {
        $this->session->unset_userdata($name);
        redirect('user/setting');
    }

    public function changes($set, $param)
    {
        if ($set == 'tema') {
            $this->themasetting($param);
        }elseif ($set == 'topbar') {
            $this->topbarsetting($param);
        }
    }

    private function themasetting($param)
    {
        $this->db->where('setting', 'tema');
        $this->db->set('parameter', $param);
        $this->db->update('tb_developer');

        redirect('developer/developer');
    }

    public function topbarsetting($param)
    {
        $this->db->where('setting', 'topbar');
        $this->db->set('parameter', $param);
        $this->db->update('tb_developer');

        redirect('developer/developer');
    }

}