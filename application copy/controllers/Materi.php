<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Materi extends CI_Controller
{

      public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
         maintanance_check();
        log_history();
    }

    public function daftar($id)
    {
        if ($this->db->get_where('data_jurusan', ['email' => $this->session->userdata('email')])->row_array() > 1) {
            redirect('auth/blocked');
        }

        $data['title'] = 'Daftar Jurusan IT Club';
        $data['member'] = $this->db->get_where('data_member', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['keahlian'] = $this->db->get_where('bidang_keahlian', ['id' => $id])->row_array();
        $data['jurusan'] = $this->db->get_where('data_jurusan', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('member/templates/header', $data);
        $this->load->view('member/materi/index', $data);
        $this->load->view('member/templates/footer', $data);
        
    }

    public function tambah()
    {
    	$data = [
                'email' => $this->session->userdata('email'),
                'keahlian' => $this->input->post('keahlian'),
                'angkatan' => $this->input->post('angkatan'),
                'user_id' => $this->input->post('user_id'),
                'nama' => $this->input->post('nama'),
                'kelas' => $this->input->post('kelas'),
            ];

            $this->db->insert('data_jurusan', $data);
            $this->session->set_flashdata('message', '<script> alert("Data Berhasil Ditambahkan"); </script>');
            redirect('member/dashboard');
    }

}