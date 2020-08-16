<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Session_model extends CI_Model
{

	public function passwordSalah()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
					Maaf, password yang anda masukan salah.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>');
					redirect('auth/login');
	}

	public function emailBelumAktif()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
				Maaf, email anda belum aktif. Silahkan lakukan aktivasi pada pesan email anda.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('auth/login');
	}

	public function emailBelumDaftar()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
			Maaf, Email anda belum terdaftar.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button> 
			</div>');
			redirect('auth/login');
	}

	public function daftarAkun()
	{
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
			Selamat, akun anda telah berhasil dibuat. Silahkan aktivasi akun kamu terlebih dahulu.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		 	</div>');
			redirect('auth/login');
	}

	public function aktivasiAkun($email)
	{
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Akun dengan email '. $email .' berhasil diaktivasi! Kamu bisa login sekarang.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					 </div>');
					redirect('auth/login');
	}

	public function tokenKadaluarsa()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
					Aktivasi akun gagal! token kadaluarsa.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					 </div>');
					redirect('auth/login');
	}

	public function tokenSalah()
	{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
				Aktivasi akun gagal! token salah atau tidak valid.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				 </div>');
				redirect('auth/login');
	}

	public function emailSalah()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
			Aktivasi akun gagal! email salah atau belum terdaftar.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			 </div>');
			redirect('auth/login');
	}

	public function resetPassword()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
				Periksa email akun anda, untuk mereset password kamu.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				 </div>');
				redirect('auth/forgotpassword');
	}

	public function belumAktivasi()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
				Email belum terdaftar atau belum aktivasi!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				 </div>');
				redirect('auth/forgotpassword');
	}

	public function resetPasswordTokenSalah()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
				Reset password gagal! token salah.  
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				 </div>');
				redirect('auth/login');
	}

	public function resetPasswordEmailSalah()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
			Reset password gagal! email salah. 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			 </div>');
			redirect('auth/login');
	}

	public function passwordBerhasilDiubah()
	{
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
				Password telah berhasil diubah, silahkan login!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				 </div>');
				redirect('auth/login');
	}

	public function logout()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('role_id');
		$swal = [
			'tipe' => 'success',
			'pesan' => 'User Berhasil Logout, Terima Kasih'
		  ];
		  $this->session->set_flashdata($swal);
		redirect('auth/login');
	}

}