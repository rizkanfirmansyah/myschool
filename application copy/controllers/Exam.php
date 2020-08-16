<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Exam extends CI_Controller
{

      public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('');
        }
         maintanance_check();
        log_history();

        $this->load->model('Member_model', 'member');
        $this->load->model('User_model', 'user');
    }


    public function soal($enkripsi, $type, $bab)
    {
    	$id = base64_decode(urldecode($enkripsi));
    	$data['title'] = $type ." Exam " . $id; 
        $user = $this->user->getUserSession();
        $sessionData = [
            'ujian' => $user['email'],
            'type' => $type,
            'id_session' => $enkripsi,
            'bab' => $bab
        ];
        $this->session->set_userdata($sessionData);
    	$data['id_soal'] = $id;
    	$data['type_soal'] = $type;
    	$data['soal'] = $this->db->get_where('data_jawaban', ['id_soal' => $id])->result_array();
    	$data['jumlah_soal'] = $this->db->get_where('data_jawaban', ['id_soal' => $id])->num_rows();
    	$this->load->view('exam/index', $data);
    }

    public function check($enkripsi, $type, $bab)
    {
        $id = base64_decode(urldecode($enkripsi));
        $data['title'] = "Check Ujian"; 
        $data['user'] = $this->user->getUserSession();
        $data['soal'] = $this->db->get_where('data_soal', ['id_soal' => $id])->row_array();
        $data['ujian'] = $this->db->get_where('data_jawaban', ['id_soal' => $id])->num_rows();
        $data['pengajar'] = $this->db->get_where('data_materi', ['user_id' => $data['soal']['id_pengajar']])->row_array();
        $this->db->where('nama', $data['user']['email']);
        $data['check'] = $this->db->get_where('data_nilai_ujian', ['id_soal' => $id])->row_array();
        $data['enkripsi'] = $enkripsi;

        // $this->load->view('exam/hasil', $data);
        $this->load->view('exam/check', $data);
        // $this->load->view('exam/templates/footer', $data);
    }

    public function submit($enkripsi, $type)
    {
        $cek_submit = $this->input->post('submit');
    	$id = base64_decode(urldecode($enkripsi));
    	$angka = $this->db->get_where('data_jawaban', ['id_soal' => $id])->num_rows();
    	$data['user'] = $this->user->getUserSession();
    		
    	$this->_hitung($angka, $id, $type, $cek_submit);
    }

    private function _hitung($angka, $id, $type, $cek_submit)
    {
    	$this->load->model('Exam_model', 'exam');

    	$hasil = $this->exam->countAllAnswer();
    	
    	$this->nilai($hasil, $id, $type, $cek_submit);
    }

    public function nilai($hasil, $id, $type, $cek_submit)
    {
    	$data['title'] = "Hasil ". $type. ' ' . $id; 
    	$title = $data['title'];
    	$subtitle = $type. ' ' . $id;

    	if ($type == 'kompetensi') {
    		$this->_kompetensi($subtitle, $title, $hasil, $id, $cek_submit);
    	}else if ($type == 'remedial') {
    		$this->_remedial($subtitle, $title, $hasil, $id, $cek_submit);
    	}
    }

    private function _kompetensi($subtitle, $title, $hasil, $id, $cek_submit)
    {
    	$soal = $this->db->get_where('data_jawaban', ['id_soal' => $id])->num_rows();
    	$query = $this->db->get_where('data_soal', ['id_soal' => $id])->row_array();
    	$data['user'] = $this->user->getUserSession();
    	$this->db->where('nama', $data['user']['email']);
    	$queryHasil = $this->db->get_where('data_nilai_ujian', ['id_soal' => $id])->row_array(); 
    	$data['salah'] = $soal-$hasil;
    	$data['nilai'] = $hasil*100/$soal;
    	$data['soal'] = $query;
    	$data['title'] = $title;
    	$data['subtitle'] = $title;


    	if ($data['nilai'] >= $query['kkm']) {
    		$status = 1;
    	} else if($data['nilai'] <= $query['kkm'] ){
    		$status = 2;
    	}
    	
    	$input = [
    		'id_soal' => $id,
    		'nama' => $data['user']['email'],
    		'jurusan' => $query['jurusan'],
    		'jumlah_soal' => $soal,
    		'jumlah_benar' => $hasil,
    		'jumlah_salah' => $data['salah'],
    		'nilai' => $data['nilai'],
    		'status' => $status,
    		'time' => time(),
            'date' => date('Y-m-d H:i:s')
    	];

    	if ($queryHasil) {
    		 echo "
				<script>
					alert('Anda sudah mengerjakan ujian, nilai bisa dilihat di profil atau dashboard akun anda.');
					document.location.href = 'http://localhost/itclub/member/dashboard';
				</script>
				";
				die;
    	}

    	$this->db->insert('data_nilai_ujian', $input);
    	$this->_nilaiExam($data, $input, $queryHasil, $cek_submit);
    }

    private function _remedial($subtitle, $title, $hasil, $id, $cek_submit)
    {
    	$soal = $this->db->get_where('data_jawaban', ['id_soal' => $id])->num_rows();
    	$query = $this->db->get_where('data_soal', ['id_soal' => $id])->row_array();
    	$data['user'] = $this->user->getUserSession();
    	$this->db->where('nama', $data['user']['email']);
    	$this->db->where('status', 2);
    	$queryHasil = $this->db->get_where('data_nilai_ujian', ['id_soal' => $id])->row_array(); 
    	$data['salah'] = $soal-$hasil;
    	$data['nilai'] = $hasil*100/$soal;
    	$data['soal'] = $query;
    	$data['title'] = $title;
    	$data['subtitle'] = $subtitle;

    	if ($data['nilai'] >= $query['kkm']) {
	    			$ubah = [
	    				'nilai' => $data['nilai'],
                        'jumlah_benar' => $hasil,
                        'jumlah_salah' => $data['salah'],
	    				'status' => 1
	    			];
	    			$this->db->where('id', $queryHasil['id']);
	    			$this->db->update('data_nilai_ujian', $ubah);
	    		}else if ($data['nilai'] >= $queryHasil['nilai'] && $data['nilai'] <= $query['kkm']) {
	    			$ubah = [
	    				'nilai' => $data['nilai'],
                        'jumlah_benar' => $hasil,
                        'jumlah_salah' => $data['salah'],
	    				'status' => 0
	    			];
	    			$this->db->where('id', $queryHasil['id']);
	    			$this->db->update('data_nilai_ujian', $ubah);
	    		}else{
	    			$ubah = [
	    				'status' => 0
	    			];
	    			$this->db->where('id', $queryHasil['id']);
	    			$this->db->update('data_nilai_ujian', $ubah);
	    		}

    	$input = [
    		'id_soal' => $id,
    		'nama' => $data['user']['email'],
    		'jurusan' => $query['jurusan'],
    		'jumlah_soal' => $soal,
    		'jumlah_benar' => $hasil,
    		'jumlah_salah' => $data['salah'],
    		'nilai' => $data['nilai'],
    		'status' => $ubah['status'],
    		'time' => time()
    	];
    		
	    $this->_nilaiExam($data, $input, $queryHasil, $cek_submit);
    }

    private function _nilaiExam($data, $input, $queryHasil, $cek_submit)
    {
        if ($cek_submit == 'kembali') {
            redirect('member/dashboard');
        }
    	$data['input'] = $input;
    	$this->load->view('exam/templates/header', $data, $input);
        $this->load->view('exam/hasil', $data, $input);
        $this->load->view('exam/templates/footer', $data, $input);
    }



}
