<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function prosesLogin()
	{
		$nama = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('users', ['nama' => $nama])->row_array();
		// $siswa = $this->db->get_where('siswa', ['nis' => $nama])->row_array();
		// $guru = $this->db->get_where('guru', ['nip' => $nama])->row_array();
		// $staff = $this->db->get_where('staff', ['nip' => $nama])->row_array();

		if($user){
			if(password_verify($password, $user['password'])){
				if($user['status'] == 1){
					if($user['role_id'] == 1){
						$data = [
							'nama' => $nama,
							'role' => 'users',
							'role_id' => $user['role_id']
						];
						$swal =[
							'tipe' =>'success',
							'pesan' => 'Login Berhasil, Selamat datang '.$data['nama']
						];
						$this->session->set_flashdata($swal);
						$this->session->set_userdata($data);
						redirect('admin');
					}elseif($user['role_id'] == 3){
						$data = [
							'nama' => $nama,
							'role' => 'users',
							'role_id' => $user['role_id']
						];
						$swal =[
							'tipe' =>'success',
							'pesan' => 'Login Berhasil, Selamat datang '.$data['nama']
						];
						$this->session->set_flashdata($swal);
						$this->session->set_userdata($data);
						redirect('guru/siswa');
					}elseif($user['role_id'] == 4){
						$data = [
							'nama' => $nama,
							'role' => 'users',
							'role_id' => $user['role_id']
						];
						$swal =[
							'tipe' =>'success',
							'pesan' => 'Login Berhasil, Selamat datang '.$data['nama']
						];
						$this->session->set_flashdata($swal);
						$this->session->set_userdata($data);
						redirect('siswa');
					}else{
						$data = [
							'nama' => $nama,
							'role' => 'users',
							'role_id' => $user['role_id']
						];
						$swal =[
							'tipe' =>'success',
							'pesan' => 'Login Berhasil, Selamat datang '.$data['nama']
						];
						$this->session->set_flashdata($swal);
						$this->session->set_userdata($data);
						redirect('data/siswa');
					}
				}else{
					$swal = [
						'tipe' => 'warning',
						'pesan' => 'User tidak aktif, mohon untuk hubungi admin'
					];
					$this->session->set_flashdata($swal);
           		 	redirect('auth/login');
				}
			}else{
				$swal = [
					'tipe' => 'error',
					'pesan' => 'Password salah, mohon coba lagi'
				];
				 $this->session->set_flashdata($swal);
           		 redirect('auth/login');
			}

		}else{
			$swal = [
				'tipe' => 'info',
				'pesan' => 'Akun tidak ditemukan, mohon buat terlebih dahulu akunmu'
			];
			$this->session->set_flashdata($swal);
           	redirect('auth/login');
		}
	}

	public function getUserSession()
	{
		$sesi = $this->session->userdata('role_id');
		if($sesi == 1){
			$this->db->where('nama', $this->session->userdata('nama'));
			return $this->db->get('users')->row_array();
		}elseif($sesi == '4'){
			$this->db->where('nis', $this->session->userdata('nama'));
			return $this->db->get('siswa')->row_array();
		}elseif($sesi == '3'){
			$this->db->where('nip', $this->session->userdata('nama'));
			return $this->db->get('guru')->row_array();
		}else{
			$this->db->where('nip', $this->session->userdata('nama'));
			return $this->db->get('guru')->row_array();
		}
	}

	public function all()
	{
		return $this->db->select('*, users.id as user_id')->from('users')->join('user_role', 'users.role_id=user_role.id', 'left')->where('role_id !=', 1)->get()->result_array();
	}

	public function useraktif()
	{
		return $this->db->select('*, users.id as user_id, users.nama as username, users.status as status_user')->from('users')->join('user_role', 'users.role_id=user_role.id', 'left')->where('role_id !=', 1)->where('status', 1)->get()->result_array();
	}

	public function userinaktif()
	{
		return $this->db->select('*, users.id as user_id, users.nama as username, users.status as status_user')->from('users')->join('user_role', 'users.role_id=user_role.id', 'right')->where('role_id !=', 1)->where('status', 0)->get()->result_array();
	}

	public function siswa()
	{
		return $this->db->select('*, users.id as user_id, users.nama as username, users.status as status_user')->from('users')->join('user_role', 'users.role_id=user_role.id', 'left')->join('siswa', 'users.nama=nis', 'right')->where('role_id', 4)->get()->result_array();
	}

	public function guru()
	{
		return $this->db->select('*, users.id as user_id, users.nama as username, users.status as status_user')->from('users')->join('user_role', 'users.role_id=user_role.id', 'left')->join('guru', 'users.nama=nip', 'left')->where('role_id', 3)->get()->result_array();
	}

	public function alumni()
	{
		return $this->db->select('*')->from('siswa')->join('jurusan', 'siswa.jurusan=jurusan.jurusan_id', 'left')->join('angkatan', 'siswa.angkatan_id=angkatan.angkatan_id')->where('status', 'alumni')->get()->result_array();
	}

	public function segmentuser()
	{
		return $this->db->select('*, COUNT(role_id)')->from('users')->join('user_role', 'users.role_id=user_role.id', 'left')->group_by('role_id')->where('role_id !=', 1)->get()->result_array();
	}

	public function getAllUserActive()
	{
		$this->db->where('status', 1);
		return $this->db->get('users')->num_rows();
	}

	public function getAllUserNotActive()
	{
		$this->db->where('status', 0);
		return $this->db->get('users')->num_rows();
	}

	public function getUserProfile()
	{
		$session = $this->session->userdata('email');
		$this->db->select('data_member.email, data_member.nama, data_member.kelas, data_member.ttl, data_member.user_id, data_member.time, user.email, user.name, user.user_id AS id_user, user.image, user.date_created');
		$this->db->where('user.email', $session);
		$this->db->from('user');
		$this->db->join('data_member','data_member.email=user.email', 'left');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getRole()
	{
		// $this->db->where('role !=', 'Root');
		return $this->db->get('user_role')->result_array();
	}

	public function getRoleId($role_id)
	{
		return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
	}

	public function getMenu()
	{
		$this->db->where('id !=', 1);
        return $this->db->get('user_menu')->result_array();
	}

	public function getUserRole($id)
	{
		return $this->db->get_where('user_role', ['id' => $id])->row_array();
	}

	public function getUser()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_role', 'user.role_id=user_role.id');
		$this->db->select('user.id, role_id, COUNT(role_id) as total');
        $this->db->group_by('role_id');
        $this->db->order_by('role_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function totalUser()
	{
		$this->db->select('name, COUNT(name) as jumlah');
        return $this->db->get('users')->result_array();
	}

	public function getJudul($id)
	{
		return $this->db->get_where('user_role', ['id' => $id])->row_array();
	}

	public function getUsers($id)
	{
		$this->db->order_by('name', 'asc');
        return $this->db->get_where('user', ['role_id' => $id])->result_array();
	}

	public function countAllUser($id)
	{
		return $this->db->get_where('user', ['role_id' => $id])->num_rows();
	}

	public function getUserAllKas()
	{
		$this->db->where('user_id !=', '');
		$this->db->where('status', 1);
		$this->db->where('role_id !=', 1);
		return $this->db->get('users')->result_array();
	}

	public function getAllData()
	{
		$session = $this->session->userdata('email');
		$this->db->select(' data_folder.id, data_folder.folder, data_folder.time, data_folder.date,  status, id_folder, id_user, file, nama_folder, COUNT(nama_folder) AS jumlah');
		$this->db->where('id_user', $session);
		$this->db->where('id_folder', 2);
		$this->db->group_by('folder');
		$this->db->from('data_folder');
		$this->db->join('data_hosting','data_hosting.nama_folder=data_folder.folder', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getUserAbsen()
	{
		$this->db->select('*');
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->from('data_absen');
		$this->db->join('user', 'data_absen.user_id=user.user_id');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function getAbsenToDay()
	{
		$tgl = date('d-F-Y');
        $this->db->where('time', $tgl);
        return $this->db->get_where('data_absen', ['user_id' => $this->session->userdata('user_id')])->row_array();
	}

	public function getUserKas()
	{
		$sesi = $this->session->userdata('user_id');
		$this->db->where('user_id', $sesi);
		$this->db->where('jenis_kas', 1);
		$this->db->select_sum('nominal');
		return $this->db->get('data_kas')->row_array();
	}

	public function getUserKasAll()
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		$this->db->where('jenis_kas', 1);
		return $this->db->get('data_kas')->result_array();
	}

	public function getKasIt()
	{
		$this->db->select_sum('kas');
		return $this->db->get('tb_kas')->row_array();
	}

	public function getWebVisit()
	{
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->select_sum('lihat');
		return $this->db->get('data_blog')->row_array();

	}

	public function getDataWeb()
	{
		$this->db->where('email', $this->session->userdata('email'));
		return $this->db->get('data_blog')->result_array();

	}

	public function getDataLogHistory()
	{
		// $this->db->group_by('method');
		$this->db->where('status', 1);
		$this->db->order_by('time', 'DESC');
		return $this->db->get_where('log', ['user' => $this->session->userdata('email')])->result_array();
	}


}