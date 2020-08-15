<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Back extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
          if (!$this->session->userdata('email')) {
            redirect('auth');
            if ($this->session->userdata('role_id') != 1 || $this->session->userdata('role_id') != 2) {
            	redirect('auth/blocked');
            }
   		 }
        maintanance_check();
        log_history();

         $this->load->model('User_model', 'user');

	}

    public function end($kode, $id)
    {
    	if ($kode == "add") {
    		$this->_add();
    	}elseif ($kode == "edit"){
            $this->_edit($id);
        }elseif ($kode == "update"){
            $this->_update($id);
        }elseif ($kode == "delete"){
            $this->_delete($id);
        }
    }

    private function _add()
    {
    	$data = [
    		'id_komponen' => $this->input->post('id_komponen'),
    		'nama_komponen' => $this->input->post('nama_komponen'),
    		'jumlah_baris' => $this->input->post('jumlah_baris'),
    		'jumlah_code' => $this->input->post('jumlah_code'),
    		'time' => time(),
    		'date' => date('Y-m-d H:i:s'),
    		'modifier' => 1
    	];

    	$this->db->insert('tb_data_webcode_backend', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"role="alert"> 
            Data </> Backend </> berhasil diinput!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/backend');
    }

    private function _edit($id)
    {
        $data['title'] = 'Data Backend';
        $data['user'] = $this->user->getUserSession();
        $data['code'] = $this->db->get_where('tb_data_webcode_backend', ['id_id' => $id])->row_array();
        $this->db->where('id !=', $data['code']['id_komponen']);
        $data['komponen'] = $this->db->get('tb_komponen')->result_array();
        $data['get'] = $this->db->get_where('tb_komponen', ['id' => $data['code']['id_komponen']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('code/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    private function _update($id)
    {
        $modifier = $this->input->post('modifier');
        $data = [
            'nama_komponen' => $this->input->post('nama_komponen'),
            'jumlah_baris' => $this->input->post('jumlah_baris'),
            'jumlah_code' => $this->input->post('jumlah_code'),
            'id_komponen' => $this->input->post('id_komponen'),
            'modifier' => $modifier,
            'time' => time()
        ];
        $this->db->where('id_id', $id);
        $this->db->update('tb_data_webcode_backend', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show"role="alert"> 
            Data </> Backend </> berhasil diubah!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/backend');

    }
    private function _delete($id)
    {
        $this->db->where('id_id', $id);
        $this->db->delete('tb_data_webcode_backend');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show"role="alert"> 
            Data </> Backend </> berhasil dihapus!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/backend');

    }

}