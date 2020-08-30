<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Edit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         maintanance_check();
         log_history();
          if (!$this->session->userdata('nama')) {
            redirect('auth/login');
            if (!$this->session->userdata('role_id') == 1) {
            	redirect('auth/blocked');
            }

        }
        $this->load->model('User_model', 'user');
        $this->load->model('Data_model', 'data');
        $this->load->model('Kurikulum_model', 'Kurikulum');
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Kelas_model', 'Kelas');
        $this->load->model('Jurusan_model', 'jurusan');
        $this->load->model('Guru_model', 'guru');
    }

    public function wakasek()
    {
        $id = $this->input->post('id');
        $jabatan = $this->input->post('jabatan');
        $cek = $this->db->get_where('staff_jabatan', ['jabatan_id' => $jabatan, 'kepala_jabatan' => 'ya'])->row_array();

        if($cek['guru_id'] == $id){
            $this->db->set('kepala_jabatan', 'tidak')->where('guru_id', $id)->update('staff_jabatan');
            $swal =[
                'tipe' => 'success',
                'pesan' => 'Posisi Wakasek telah dikosongkan'
            ];
            $this->session->set_flashdata($swal);
        }elseif($cek['guru_id'] != $id && $cek['kepala_jabatan'] == 'ya'){
            $swal =[
                'tipe' => 'warning',
                'pesan' => 'Posisi Wakasek telah ada, mohon periksa kembali data staff'
            ];
            $this->session->set_flashdata($swal);
        }else{
            $this->db->set('kepala_jabatan', 'ya')->where('guru_id', $id)->update('staff_jabatan');
            $swal = [
                'tipe' => 'success',
                'pesan' => 'Posisi Wakasek telah ditetapkan'
            ];
            $this->session->set_flashdata($swal);
        }

    }

    public function kelas($id)
    {
        $data= [
            'title' => 'Edit Data Kelas',
            'user' => $this->user->getUserSession(),
            'kelas' => $this->Kelas->Kelas($id)->row_array(),
            'jurusan' => $this->jurusan->all(),
            'guru' => $this->guru->guru(),
            'ruangan' => $this->jurusan->ruangan(),
        ];

        $this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('data/kelas/edit/index');
    	$this->load->view('templates/footer', $data);
    }

    public function class($id)
    {
        $data = [
            'guru_id' => $this->input->post('wakel'),
            'jurusan_id' => $this->input->post('jurusan'),
            'ruangan_id' => $this->input->post('ruangan'),
            'nama_kelas' => htmlspecialchars($this->input->post('nama_kelas')),
        ];

        $this->db->where('kelas_id', $id)->set($data)->update('kelas');
        $swal = [
            'tipe' => 'success',
            'pesan' => 'Kelas berhasil dirubah'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/kelas');
    }

    public function jadwalujian($id)
    {
        $this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('data/kelas/edit/index');
    	$this->load->view('templates/footer', $data);    }

    public function statususer($status, $user)
    {
        if($status == 1){
            $this->db->where('id', $user)->set('status', 0)->update('users');
            $swal = [
                'tipe' => 'error',
                'pesan' => 'User tidak aktif sekarang'
            ];
            $this->session->set_flashdata($swal);
            redirect('admin/user');
        }else{
            $this->db->where('id', $user)->set('status', 1)->update('users');
            $swal = [
                'tipe' => 'success',
                'pesan' => 'User aktif sekarang'
            ];
            $this->session->set_flashdata($swal);
            redirect('admin/user');
        }
    }

    public function staff()
    {
        $guru = $this->input->post('guru_id');
        $jabatan = $this->input->post('jabatan_id');
        if($jabatan == null){
            $swal = [
                'tipe' => 'success',
                'pesan' => 'Staff berhasil diubah'
            ];
            $this->session->set_flashdata($swal);
            die;
        }
        $this->db->where('guru_id', $guru)->set('jabatan_id', $jabatan)->update('staff_jabatan');
            $swal = [
                'tipe' => 'success',
                'pesan' => 'Staff berhasil diubah'
            ];
            $this->session->set_flashdata($swal);
    }

    public function jadwal($id)
    {
        $data= [
            'title' => 'Edit Data Jadwal',
            'user' => $this->user->getUserSession(),
            'edit' => $this->Kurikulum->getEditJadwal($id)->row_array(),
            'kelas' => $this->siswa->kelas()->result_array(),
            'ruangan' => $this->data->ruangan()->result_array(),
        ];

        // var_dump($data['edit']);
        // die;
        $this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('kurikulum/jadwal/edit/index');
    	$this->load->view('templates/footer', $data);
    }

    public function schedule($id)
    {
        $data = [
            'hari' => $this->input->post('hari'),
            'id_kelas' => $this->input->post('kelas'),
            'id_ruangan' => $this->input->post('ruangan'),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'jam_keluar' => $this->input->post('jam_keluar'),
        ];

        $this->db->where('jadwal_id', $id)->set($data)->update('jadwal');
        $swal =[
            'tipe' => 'success',
            'pesan' => 'Jadwal berhasil diubah',
        ];
        $this->session->set_flashdata($swal);
        redirect('kurikulum/jadwal');
    }

    public function e_siswa()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama'), true),
            'kelas_id' => htmlspecialchars($this->input->post('kelas'), true),
            'alamat' => htmlspecialchars($this->input->post('alamat'), true),
            'agama' => htmlspecialchars($this->input->post('agama'), true),
            'nama_ayah' => htmlspecialchars($this->input->post('ayah'), true),
            'nama_ibu' => htmlspecialchars($this->input->post('ibu'), true),
            'ttl' => htmlspecialchars($this->input->post('ttl'), true)
        ];

        $this->db->where('id', $this->input->post('id'))->update('siswa', $data);
    }


    public function siswa($id)
    {
        $data['title'] = 'Edit Data Siswa';
    	$data['user'] = $this->user->getUserSession();
    	$data['siswa'] = $this->data->getSiswa($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('edit/siswa', $data);
        $this->load->view('templates/footer');
        
    }

    public function guru($id)
    {
        $data['title'] = 'Edit Data Guru';
    	$data['user'] = $this->user->getUserSession();
        $data['guru'] = $this->data->getGuru($id);
        $data['idguru'] = $id;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('edit/guru', $data);
        $this->load->view('templates/footer');
        
    }

    public function dataguru($id)
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'lulusan' => htmlspecialchars($this->input->post('lulusan')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'tanggal_lahir' => htmlspecialchars($this->input->post('ttl')),
            'tahun_ajar_awal' => htmlspecialchars($this->input->post('taa')),
            'status' => htmlspecialchars($this->input->post('status')),
            'agama' => htmlspecialchars($this->input->post('agama')),
            'sertifikasi' => htmlspecialchars($this->input->post('sertifikasi')),
        ];
        
        $this->db->where('id', $id)->set($data)->update('guru');
        $swal =[
            'tipe' => 'success',
            'pesan' => 'Guru '. $data['nama'] . ' berhasil diubah',
        ];
        $this->session->set_flashdata($swal);
        redirect('data/guru');
    }

    public function user($id, $role_id)
    {
        $data['title'] = 'Edit Data Member';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('user', ['id' => $id])->row_array();
        $this->db->where('role !=', 'Root');
        $data['Edit'] = $this->db->get('user_role')->result_array();
        $data['member'] = $this->db->get_where('data_member', ['id' => $id])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('edit/user', $data);
        $this->load->view('templates/footer');
        }else{
            $data = [
                'email' => htmlspecialchars($this->input->post('email')),
                'name' => htmlspecialchars($this->input->post('name')),
                'role_id' => htmlspecialchars($this->input->post('role')),
                'is_active' => $this->input->post('is_active')
            ];

            // var_dump($data);
            // die;
            
            // cek jika gambar diperbarui
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '256';
                $config['upload_path'] = './assets/img/member/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/member/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');  
                    $this->db->set('image', $new_image);  
                }else{
                      $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"> Ukuran gambar terlalu besar atau ekstensi gambar tidak diperbolehkan <br><i> Catatan :<b>' 
                            . $this->upload->display_errors() .
                            '</b></i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                redirect('root/datauser/' . $role_id);
                }
              }

            $this->db->set('name', $name);
            $this->db->where('id', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            Data User sudah berhasil diperbarui!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            if ($this->session->userdata('role_id') == 2) {
                redirect('admin/user/');
            } else {
                redirect('data/user/');
            }
        }
    }
   

    public function materi($user_id)
    {
        $data['title'] = 'Edit Data Pengajar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->db->get_where('data_materi', ['user_id' => $user_id])->row_array();
        $data['jurusan'] = $this->db->get('bidang_keahlian')->result_array();
        $data['tingkatan'] = $this->db->get('bidang_keahlian')->result_array();
 
        $this->form_validation->set_rules('jurusan', 'Bidang keahlian', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('edit/materi', $data);
            $this->load->view('templates/footer');
        }else {

            $data = [
                'pengajar' => $this->input->post('pengajar'),
                'user_id' => $this->input->post('user_id'),
                'jurusan' => $this->input->post('jurusan'),
                'tingkatan' => $this->input->post('tingkatan')
            ];

            $this->db->where('user_id', $user_id);
            $this->db->update('data_materi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            Data pengajar sudah berhasil diperbarui!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('input/materi');

        }
    }


    public function list($id, $user_id)
    {
        $data['title'] = 'Edit Data Pengajar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->db->get_where('data_materi', ['id' => $id])->row_array();
        $data['jurusan'] = $this->db->get('bidang_keahlian')->result_array();
        $data['tingkatan'] = $this->db->get('bidang_keahlian')->result_array();
 
        $this->form_validation->set_rules('jurusan', 'Bidang keahlian', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('edit/list', $data);
            $this->load->view('templates/footer');
        }else {

            $data = [
                'pengajar' => $this->input->post('pengajar'),
                'materi' => $this->input->post('materi'),
                'waktu' => $this->input->post('waktu'),
                'user_id' => $this->input->post('user_id'),
                'jurusan' => $this->input->post('jurusan'),
                'tingkatan' => $this->input->post('tingkatan')
            ];

            $this->db->where('id', $id);
            $this->db->update('data_materi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
            Data materi sudah berhasil diperbarui!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('input/list/' . $user_id );

         }

    }

    public function tugas($id)
    {
        $data['title'] = 'Edit Data Tugas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['materi'] = $this->db->get_where('data_materi', ['user_id' => 'ITP-' . $this->session->userdata('id')])->result_array();
        $data['tugas'] = $this->db->get_where('data_tugas', ['id' => $id])->row_array();
        $this->form_validation->set_rules('materi', 'Materi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('edit/tugas', $data);
            $this->load->view('templates/footer');
            }else{
                $data = [
                    'materi' => htmlspecialchars($this->input->post('materi'), true),
                    'jenis_file' => $this->input->post('jenis_file'),
                    'file' => htmlspecialchars($this->input->post('file'), true),
                    'batas_waktu' => $this->input->post('waktu'),
                    'time' => $this->input->post('time')
                ];

                $this->db->set('materi', $materi);
                $this->db->where('id', $id);
                $this->db->update('data_tugas', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
                Data Tugas sudah berhasil diperbarui!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('input/tugas' );
            }

        }


        public function gallery($id)
        {
            $data['title'] = "Edit gambar gallery";
            $data['user'] = $this->user->getUserSession();
             $this->db->select('email, name, user_post, gallery.id, waktu, gallery.status, gambar, keterangan, judul');
             $this->db->from('gallery');
             $this->db->join('user','user.email=gallery.user_post');
             $this->db->where('gallery.id', $id);
             $query = $this->db->get();
             $data['gallery'] = $query->row_array();

             // echo "<pre>";
             // var_dump($data['gallery']);
             // echo "</pre>";
             // die;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('setup/gallery/edit');
            $this->load->view('templates/footer', $data);
        }


        public function status($rules, $id, $parm)
        {
            if ($rules == 'siswa') {
                if ($parm == 1) {
                    $this->db->where('id', $id);
                    $this->db->update('siswa', ['status' => 0]);
                    $this->session->set_flashdata('flash', 'status_inactive');
                    redirect('data/siswa/');
                }else{
                    $this->db->where('id', $id);
                    $this->db->update('siswa', ['status' => 1]);
                    $this->session->set_flashdata('flash', 'status_active');
                    redirect('data/siswa/');
                }
            }
        }

}

