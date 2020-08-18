<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Input extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        maintanance_check();
        log_history();

        $this->load->model('User_model', 'user');
        $this->load->model('Data_model', 'data');
        $this->load->model('Insert_model', 'insert');
    }

    public function jurusan()
    {
        $data = [
                'nama_jurusan' => htmlspecialchars(strtolower($this->input->post('nama')), true),
                'payload' => htmlspecialchars($this->input->post('payload'), true),
        ];
            $this->db->insert('jurusan', $data);
    }

    public function payload()
    {
        $payload = $this->input->post('nama');

        $this->db->set('payload', $payload)->where('jurusan_id', 1)->update('jurusan');
    }

    public function kelas()
    {
        $data = [
            'nama_kelas' => htmlspecialchars($this->input->post('namakelas'), true),
            'guru_id' => htmlspecialchars($this->input->post('guru'), true),
            'jurusan_id' => htmlspecialchars($this->input->post('jurusan'), true),
            'ruangan_id' => htmlspecialchars($this->input->post('ruangan'), true),
        ];

        $this->db->insert('kelas', $data);
        $swal = [
            'tipe' => 'success',
            'pesan' => 'Data kelas berhasil ditambahkan'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/kelas');
    }

    public function editjurusan()
    {
        $data =[
            'nama_jurusan' => htmlspecialchars($this->input->post('jurusan'), true),
            'payload' => htmlspecialchars($this->input->post('payload'), true),
        ];

        $this->db->where('jurusan_id', $this->input->post('id'))->update('jurusan', $data);
    }

    public function staff()
    {
        $data = [
            'jabatan_id' => $this->input->post('jabatan'),
            'guru_id' => $this->input->post('guru'),
            'kepala_jabatan' => 'tidak' 
        ];
        $swal = [
            'tipe' => 'success',
            'pesan' => 'Data staff berhasil ditambahkan'
        ];
        $this->session->set_flashdata($swal);
        $this->db->insert('staff_jabatan', $data);
    
    }

    public function jabatan()
    {
        $data = [
            'nama_jabatan' => htmlspecialchars(strtolower($this->input->post('jabatan')))
        ];
        $this->db->insert('jabatan', $data);

        $swal = [
            'tipe' => 'success',
            'pesan' => 'jabatan baru berhasil ditambahkan'
        ];
        $this->session->set_flashdata($swal);
        redirect('admin/staff');
    }

    public function siswa()
    {
        $now = date('Y')-3;
        $jurusan =$this->db->get('kelas', ['kelas_id' => $this->input->post('kelassiswa')])->row();
        $angkatan = $this->db->get_where('angkatan', ['angkatan_id' => $this->input->post('angkatansiswa')])->row();

        if($angkatan->angkatan_nama < $now){
            $status = 'alumni';
        }else{
            $status = 'pelajar';
        }
        
        $angkatan_next = $angkatan->angkatan_nama - 1;
        $tahun_ajaran = $angkatan_next .'/'.$angkatan->angkatan_nama;

        $siswa = [
            'nama' => htmlspecialchars($this->input->post('namasiswa'), true),
            'nis' => htmlspecialchars($this->input->post('nissiswa'), true),
            'nisn' => htmlspecialchars($this->input->post('nisnsiswa'), true),
            'angkatan_id' => $this->input->post('angkatansiswa'),
            'nama_ayah' => htmlspecialchars($this->input->post('ayahsiswa'), true),
            'nama_ibu' => htmlspecialchars($this->input->post('ibusiswa'), true),
            'alamat' => htmlspecialchars($this->input->post('alamatsiswa'), true),
            'agama' => htmlspecialchars($this->input->post('agamasiswa'), true),
            'kelas_id' => $this->input->post('kelassiswa'),
            'tahun_ajaran' => $this->input->post('kelassiswa'),
            'tempat_lahir' => htmlspecialchars($this->input->post('tempatlahir'), true),
            'asal_sekolah' => htmlspecialchars($this->input->post('sekolahsiswa'), true),
            'ttl' => $this->input->post('ttlsiswa'),
            'email' => $this->input->post('emailsiswa'),
            'jurusan' => $jurusan->jurusan_id,
            'status' => $status,
            'tahun_ajaran' => $tahun_ajaran,
        ];
    //   var_dump($siswa);
    //     die;

        if(empty($siswa['nama']) || empty($siswa['nis']) || empty($siswa['nisn']) || $siswa['angkatan_id'] == null || $siswa['kelas_id'] == null){
            $swal= [
                'tipe' => 'warning',
                'pesan' => 'Mohon lengkapi profil terlebih dahulu'
            ];
            $this->session->set_flashdata($swal);
        redirect('data/siswa');
        }

        if(empty($this->input->post('passwordsiswa'))){
            $password = $this->input->post('nissiswa');
        }else{
            $password = $this->input->post('passwordsiswa');
        }

        $user = [
            'nama' => $siswa['nis'],
            'email' => $this->input->post('emailsiswa'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'status' => 1,
            'role_id' => 4,
            'date_created' => date('Y-m-d')
        ];

        $this->db->insert('siswa', $siswa);
        $this->db->insert('users', $user);
        $swal= [
            'tipe' => 'success',
            'pesan' => 'User ' . $siswa['nama'] . ' berhasil ditambahkan'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/siswa');

    }


    public function materi()
    {
        $data['title'] = 'Materi';
        $data['user'] = $this->user->getUserSession();

        $this->db->group_by('pengajar');
        $this->db->order_by('tingkatan', 'asc');
        $data['materi'] = $this->db->get('data_materi')->result_array();

        $data['khusus'] = $this->db->get('data_materi')->row_array();

        $this->form_validation->set_rules('pengajar', 'Pengajar', 'required|is_unique[data_materi.pengajar]');
        $this->form_validation->set_rules('user_id', 'User_id', 'required|is_unique[data_materi.user_id]', [
		'is_unique' => 'Anda telah terdaftar di materi yang lain'
        	]);

        if ($this->form_validation->run() == false) {
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('input/materi', $data);
	        $this->load->view('templates/footer');
	    }else{
	    	$data = [
        		'user_id' => $this->input->post('user_id'),
        		'materi' => 'contoh',
                'bab' => 0,
        		'jurusan' => $this->input->post('jurusan'),
        		'tingkatan' => $this->input->post('tingkatan'),
        		'pengajar' => htmlspecialchars($this->input->post('pengajar')),
        		'waktu' => 1
        	];

        	$this->db->insert('data_materi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                Pengajar materi berhasil di tambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 </div>');
            redirect('input/materi');
	    }
    }

    public function guru()
    {
        $guru =[
            'nama' => htmlspecialchars($this->input->post('nama')),
            'email' => htmlspecialchars($this->input->post('email')),
            'telepon' => htmlspecialchars($this->input->post('telepon')),
            'agama' => htmlspecialchars($this->input->post('agama')),
            'nip' => htmlspecialchars($this->input->post('nip')),
            'tanggal_lahir' => htmlspecialchars($this->input->post('ttl')),
            'status' => htmlspecialchars($this->input->post('status')),
            'sertifikasi' => htmlspecialchars($this->input->post('sertifikasi')),
            'lulusan' => htmlspecialchars($this->input->post('lulusan')),
            'tahun_ajar_awal' => substr($this->input->post('tahun_ajar'), 0, 4),
            'sertifikasi' => htmlspecialchars($this->input->post('sertifikasi')),
            'alamat' => htmlspecialchars($this->input->post('alamat')),
            'date_created' => date('Y-m-d'),
        ];


        if(empty($this->input->post('password'))){
            $password = $this->input->post('nip');
        }else{
            $password = $this->input->post('password');
        }
        $user = [
            'nama' => htmlspecialchars($this->input->post('nip')),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => htmlspecialchars($this->input->post('email')),
            'role_id' => 3,
            'status' => 0,
            'date_created' => date('Y-m-d'),
        ];
        // var_dump($user);
        // die;

        $this->db->insert('guru', $guru);
        $this->db->insert('users', $user);
        $swal= [
            'tipe' => 'success',
            'pesan' => 'User ' . $guru['nama'] . ' berhasil ditambahkan'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/guru');
    }

    public function ruangan()
    {
        $data = [
            'nama_ruangan' => htmlspecialchars($this->input->post('ruangan'), true),
            'kategori_gedung' => htmlspecialchars($this->input->post('kategori'), true),
            'payload' => htmlspecialchars($this->input->post('payload'), true),
        ];

        $this->db->insert('ruangan', $data);
        $swal = [
            'tipe' => 'success',
            'pesan' => 'Data ruangan berhasil ditambahkan'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/ruangan');
    }

    public function mapel()
    {
        $data = [
            'id_angkatan' => $this->input->post('angkatan'),
            'id_guru' => $this->input->post('guru'),
            'nama_mapel' => $this->input->post('mapel'),
        ];

        $this->db->insert('mapel', $data);
        $swal = [
            'tipe' => 'success',
            'pesan' => 'Mapel baru ditambahkan'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/mapel');
    }


    public function list($user_id)
    {
        $id = $this->uri->segment(3);
        $userid = $this->user->getUserSession();
        $cekdata = $this->db->get_where('data_materi', ['user_id' => $id])->row_array();
        // Cek Authentication
        if ($userid['name'] != $cekdata['pengajar']) {
                                  redirect('auth/blocked');                
                           }  

        $data['title'] = 'List Materi';
        $data['user'] = $this->user->getUserSession();
        $this->db->where('materi !=', 'contoh');
        $data['materi'] = $this->db->get_where('data_materi', ['user_id' => $user_id])->result_array();
        $data['m'] = $this->db->get_where('data_materi', ['user_id' => $user_id])->row_array();
        $data['pengajar'] = $this->db->get_where('data_materi', ['user_id' => $user_id])->row_array();
        $data['hitung'] = $this->db->get_where('data_materi', ['user_id' => $user_id])->num_rows();

        $this->form_validation->set_rules('materi', 'Materi', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');

        if ($this->form_validation->run() == false) {
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('input/list-materi', $data);
	        $this->load->view('templates/footer');
        }else{
        	$data = [
        		'user_id' => $this->input->post('user_id'),
        		'materi' => htmlspecialchars($this->input->post('materi'), true),
                'bab' => htmlspecialchars($this->input->post('bab')),
        		'jurusan' => $this->input->post('jurusan'),
        		'tingkatan' => $this->input->post('tingkatan'),
        		'pengajar' => $this->input->post('pengajar'),
        		'waktu' => $this->input->post('waktu')
        	];

            $this->db->insert('data_materi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                Materi berhasil di tambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 </div>');
            redirect('input/list/' . $user_id);
        }
    }


    public function daftar($user_id)
    {
        $data['title'] = 'List Materi';
        $data['user'] = $this->user->getUserSession();
        $data['materi'] = $this->db->get_where('data_materi', ['user_id' => $user_id])->result_array();
        $data['pengajar'] = $this->db->get_where('data_materi', ['user_id' => $user_id])->row_array();

        $this->form_validation->set_rules('materi', 'Materi', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');

        if ($this->form_validation->run() == false) {
	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('input/daftar-materi', $data);
	        $this->load->view('templates/footer');
        }else{
        	$data = [
        		'user_id' => $this->input->post('user_id'),
        		'materi' => htmlspecialchars($this->input->post('materi')),
        		'jurusan' => $this->input->post('jurusan'),
        		'tingkatan' => $this->input->post('tingkatan'),
        		'pengajar' => $this->input->post('pengajar'),
        		'waktu' => $this->input->post('waktu')
        	];

            $this->db->insert('data_materi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                Materi berhasil di tambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 </div>');
            redirect('input/daftar/' . $user_id);
        }
    }

    public function tugas()
    {
        $data['title'] = 'Tugas';
        $data['user'] = $this->user->getUserSession();
        $data['tugas'] = $this->db->get_where('data_tugas', ['id_pengajar' => 'ITP-' . $this->session->userdata('id')])->result_array();
        $this->db->where('materi !=', 'contoh');
        $data['materi'] = $this->db->get_where('data_materi', ['user_id' => 'ITP-' . $this->session->userdata('id')])->result_array();
        $tugas = $this->db->get_where('data_materi', ['user_id' => 'ITP-' . $this->session->userdata('id')])->row_array();
        $this->form_validation->set_rules('tugas', 'Tugas', 'required|is_unique[data_tugas.tugas]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('input/tugas', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'tugas' => htmlspecialchars($this->input->post('tugas'),true),
                'bab' => $this->input->post('bab'),
                'time' => $this->input->post('waktu'),
                'batas_waktu' => $this->input->post('date'),
                'jenis_file' => $this->input->post('jenis_file'),
                'id_pengajar' => $tugas['user_id'],
                'nama_pengajar' => $tugas['pengajar']
            ];

            $upload_file = $_FILES['file']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'docx|txt|pkt|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/member/file-tugas/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $new_file = $this->upload->data('file_name');  
                    $this->db->set('file', $new_file);  
                }else{
                      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Ukuran gambar terlalu besar atau ekstensi gambar tidak diperbolehkan <br><i> Catatan :<b>' 
                            . $this->upload->display_errors() .
                            '</b></i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                redirect('input/tugas');
                }

            $this->db->insert('data_tugas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                Tugas berhasil di tambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 </div>');
            redirect('input/tugas');
           }
        }
    }

    public function nilai()
    {
        $data['title'] = 'Nilai';
        $data['user'] = $this->user->getUserSession();
        $data['tugas'] = $this->data->getDataNilaiTugas();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('input/nilai', $data);
            $this->load->view('templates/footer');
    }

    public function soal()
    {
        $data['title'] = 'Soal';
        $data['user'] = $this->user->getUserSession();
        $data['soal'] = $this->db->get_where('data_soal', ['id_pengajar' => 'ITP-'.$data['user']['id']])->result_array();
        $this->db->where('materi !=', 'contoh');
        $data['materi'] = $this->db->get_where('data_materi', ['user_id' => 'ITP-'.$data['user']['id']])->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('input/soal/index', $data);
            $this->load->view('templates/footer');
    }

    public function ujian()
    {
        $user = $this->db->get_where('data_materi', ['pengajar' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Hasil Ujian';
        $data['user'] = $this->user->getUserSession();
        $data['totalUjian'] = $this->data->getDataUjianJumlah($user);
        $data['presentase'] = $this->data->getDataPresentaseNilai($user);
        $data['peserta'] = $this->data->getDataNilaiPeserta($user);
        $data['soalujian'] = $this->data->getDataSoalUjian($user);

           $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('input/ujian', $data);
            $this->load->view('templates/footer');
    }

    public function hasilujian($id)
    {
        $user = $this->db->get_where('data_materi', ['pengajar' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->user->getUserSession();
        $data['totalUjian'] = $this->data->getDataUjianJumlahId($user, $id);
        $data['presentase'] = $this->data->getDataPresentaseNilaiId($user, $id);
        $data['peserta'] = $this->data->getDataNilaiPesertaId($user, $id);
        $data['databaseSoal'] = $this->data->getDataSoal($id);
        $data['title'] = 'Hasil Ujian ';

           $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('input/hasilujian', $data);
            $this->load->view('templates/footer');
    }


}