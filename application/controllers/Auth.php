<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Session_model', 'sesi');
		$this->load->model('User_model', 'user');
		$this->load->model('Home_model', 'home');
		 // maintanance_check();
	}


	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman Login IT Club';
			$data['footer'] = $this->home->getDataHomePageFooter();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('templates/auth_footer');
		} else {
			$this->user->prosesLogin();
		}
	}


	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'infoitsmkn5@gmail.com',
			'smtp_pass' => 'itclub12345',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];
		$this->email->initialize($config);
		$this->load->library('email', $config);

		$this->email->from('infoitsmkn5@gmail.com', 'Admin IT Club SMKN5');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
		$this->email->subject('Verifikasi Akun IT Club');
		$this->email->message('Klik link ini untuk verifikasi akun kamu : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
		}else if($type == 'forgot'){
			$this->email->subject('Reset Pasword Akun IT Club');
			$this->email->message('Klik link ini untuk reset password akun kamu : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset password</a>');
		}

		if($this->email->send()){
			return true;
		}else{
			echo $this->email->print_debugger();
			die;
		}

	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if($user_token){
				if (time() - $user_token['date_created'] < (60*60)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);
					$this->sesi->aktivasiAkun($email);
				}else{

					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->sesi->tokenKadaluarsa();
				}

			}else{
				$this->sesi->tokenSalah();
			}

		}else {
			$this->sesi->emailSalah();
		}
	}

	public function forgotPassword(){

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgotpassword');
			$this->load->view('templates/auth_footer');
		}else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');
				$this->sesi->resetPassword();
			}else {
				$this->sesi->belumAktivasi();
			}
		}

	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->sesi->set_userdata('reset_email', $email);
				$this->changePassword();
			}else{
				$this->sesi->resetPasswordTokenSalah();
			}
		} else{
			$this->sesi->resetPasswordEmailSalah();
		}
	}

	public function changePassword()
	{
		if (!$this->sesi->userdata('reset_email')) {
			redirect('auth/login');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[5]|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/changepassword');
			$this->load->view('templates/auth_footer');
		} else{
				$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
				$email = $this->sesi->userdata('reset_email');

				$this->db->set('password', $password);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->sesi->unset_userdata('reset_email');
				$this->sesi->passwordBerhasilDiubah();
		}
	}

	public function logout()
	{
		$this->sesi->logout();
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
