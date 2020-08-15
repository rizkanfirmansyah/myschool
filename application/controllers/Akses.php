<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Akses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('User_model', 'user');
        maintanance_check();
        log_history();
    }

    public function tugas($id, $batas_waktu, $jenis_file, $file)
    {
    	$tugas = $this->db->get_where('data_tugas', ['id' => $id])->row_array();
    	$nama = $this->db->get_where('data_jurusan', ['pengajar' => $tugas['id_pengajar']])->row_array();
    	$this->db->where('tugas', $tugas['tugas']);
    	$sama = $this->db->get_where('data_nilai', ['email' => $nama['email']])->row_array();
 
    	if (!empty($sama)) {
    			redirect('download/tugas/'.$file);
	    	}else{
		    	$data = [
		    		'id_pengajar' => $tugas['id_pengajar'],
		    		'email' => $this->session->userdata('email'),
		    		'tugas' => $tugas['tugas'],
		    		'bab' => $tugas['bab'],
		    		'status' => 2,
		    		'jenis_file' => $jenis_file,
                    'waktu' => date('Y-m-d'),
		    		'deadline' => $batas_waktu
		    	];
    	
	    	$this->db->insert('data_nilai', $data);
	    	if ($jenis_file == 'video') {
	    		redirect('download/tugas/'.$file);
	    	}else{
                redirect('download/tugas/'.$file);
	    	}
    	}
    }

    public function nilai($id, $nama)
    {
    	$data['title'] = 'Akses Nilai';
    	$data['user'] = $this->user->getUserSession();
        $data['nama'] = $nama;
    	$tugas = $this->db->get_where('data_tugas', ['id' => $id])->row_array();
    	$data['nilai'] = $this->db->get_where('data_nilai', ['id' => $id])->row_array();

    	$this->form_validation->set_rules('nilai', 'Nilai', 'required');

    	if ($this->form_validation->run() == false) {
    	 	$this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('akses/nilai', $data);
	        $this->load->view('templates/footer');
    	}else {
    		$data = [
    			'nilai' => $this->input->post('nilai'),
                'komentar' => htmlspecialchars($this->input->post('komentar'), true),
    			'status' => 1
    		];
    		
    		$this->db->where('id', $id);
    		$this->db->update('data_nilai', $data);
    		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Tugas member '. urldecode($nama) .' sudah dinilai!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>');
            redirect('input/nilai');
    	}
	}
	

	public function materiakses()
    {
        $materi = $this->input->post('materi');
		$pengajar = $this->input->post('pengajar');

		$data = [
			'materi' => $materi,
			'pengajar' => $pengajar,
			'email' => $this->session->userdata('email'),
			'date' => date('Y-m-d H:i:s'),
			'time' => time(),
			'status' => 1
		];
        
		$this->db->where('pengajar', $pengajar);
        $this->db->where('email', $this->session->userdata('email'));
        $this->db->where('materi', $materi);
		$result = $this->db->get('materi_check'); 
		$check = $result->row();
		
		if ($result->num_rows() < 1) {
			$this->db->insert('materi_check', $data);
		}elseif ($check->status != 0) {
				$this->db->set('status', 0);        
				$this->db->where('pengajar', $pengajar);
     			$this->db->where('email', $this->session->userdata('email'));
        		$this->db->where('materi', $materi);
				$this->db->update('materi_check');
		}elseif ($check->status != 1){
				$this->db->set('status', 1);
				$this->db->where('pengajar', $pengajar);
     			$this->db->where('email', $this->session->userdata('email'));
        		$this->db->where('materi', $materi);
				$this->db->update('materi_check');
		}
	}
	

	public function loadMateri()
	{
		$data['soal'] = $this->db->get('data_soal')->result_array();
	}

}