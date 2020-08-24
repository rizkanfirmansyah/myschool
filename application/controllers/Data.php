<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        maintanance_check();
        log_history();
        $this->load->model('Data_model', 'data');
        $this->load->model('User_model', 'user');
        $this->load->model('Insert_model', 'insert');
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Jurusan_model', 'jurusan');
        $this->load->model('Kelas_model', 'kelas');
    }


    public function siswa()
    {
        $data = [
            'title' => 'Data Siswa',
            'siswa' => $this->siswa->all(),
            'jml_siswa' => $this->siswa->siswa()->num_rows(),
            'user' => $this->user->getUserSession(),
            'angkatan' => $this->siswa->angkatan()->num_rows(),
            'kelas' => $this->siswa->kelas()->num_rows(),
            'allangkatan' => $this->siswa->angkatan()->result_array(),
            'allkelas' => $this->siswa->kelas()->result_array(),
            'jurusan' => $this->siswa->jurusan(),
            'sAngkatan' => $this->siswa->siswaAngkatan()
        ];


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/siswa', $data);
            $this->load->view('templates/footer');
    }

    public function insert($id)
    {
        if($id == 'siswa'){
            $this->insert->insertDataSiswa();
        }
    }

    public function alumni()
    {
        $data = [
            'title' => 'Data Alumni',
            'jml' => $this->guru->jml(),
            'alumni' => $this->user->alumni(),
            'user' => $this->user->getUserSession(),
            'kepsek' => $this->guru->kepalasekolah(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/alumni', $data);
        $this->load->view('templates/footer');
    }

    public function guru()
    {
        $data = [
            'title' => 'Data Guru',
            'jml' => $this->guru->jml(),
            'guru' => $this->guru->all(),
            'jurusan' => $this->db->get_where('jurusan', ['jurusan_id !=' => 1])->result_array(),
            'user' => $this->user->getUserSession(),
            'kepsek' => $this->guru->kepalasekolah(),
        ];

        // echo "<pre>";
        // var_dump($data['guru']);
        // echo "</pre>";
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/guru', $data);
        $this->load->view('templates/footer');
    }

    public function ruangan()
    {
        $data = [
            'title' => 'Data Ruangan',
            'ruangan' => $this->data->ruangan()->result_array(),
            'jml' => $this->data->ruangan()->num_rows(),
            'avg' => $this->data->avgruangan(),
            'sum' => $this->data->jmlruangan(),
            'kepsek' => $this->guru->kepalasekolah(),
            'user' => $this->user->getUserSession()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/ruangan', $data);
        $this->load->view('templates/footer');
    }

    public function mapel()
    {
        $data = [
            'title' => 'Data Mapel',
            'mapel' => $this->data->mapel()->result_array(),
            'jml' => $this->data->mapel()->num_rows(),
            'jenjang' => $this->data->jenjang()->result_array(),
            'angkatan' => $this->siswa->angkatan()->result_array(),
            'kepsek' => $this->guru->kepalasekolah(),
            'user' => $this->user->getUserSession()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/mapel', $data);
        $this->load->view('templates/footer');
    }

    public function jurusan()
    {
        $data = [
            'title' => 'Data Jurusan',
            'jml' => $this->jurusan->jml(),
            'payload' => $this->jurusan->payload(),
            'totalpayload' => $this->jurusan->totalpayload(),
            'jurusan' => $this->jurusan->all(),
            'angkatan' => $this->siswa->angkatan()->result_array(),
            'kepsek' => $this->guru->kepalasekolah(),
            'kelas' => $this->siswa->kelas()->result_array(),
            'user' => $this->user->getUserSession()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/jurusan', $data);
        $this->load->view('templates/footer');
    }

    public function kelas()
    {
        $data = [
            'title' => 'Data Kelas',
            'jml' => $this->siswa->kelas()->num_rows(),
            'totalpayload' => $this->jurusan->totalpayload(),
            'payload' => $this->jurusan->payload(),
            'jurusan' => $this->jurusan->all(),
            'guru' => $this->guru->guru(),
            'ruangan' => $this->jurusan->ruangan(),
            'kepsek' => $this->guru->kepalasekolah(),
            'angkatan' => $this->siswa->angkatan()->result_array(),
            'kelas' => $this->kelas->all()->result_array(),
            'user' => $this->user->getUserSession()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/kelas', $data);
        $this->load->view('templates/footer');
    }


    public function absen()
    {
        $data['title'] = 'Data Absen';
        $data['user'] = $this->data->getUserSession();
        $data['absen'] = $this->data->getUserAbsen();

        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required', [
            'required' => 'User ID dibutuhkan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/absen', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'user_id' => htmlspecialchars($this->input->post('user_id'), true),
                'keterangan' => $this->input->post('keterangan'),
                'date' => date('Y-m-d H:i:s'),
                'time' => time()
            ];

            $user_id = $this->input->post('user_id');
            $cek_aktif = $this->db->get_where('user', ['user_id' => $user_id])->row_array();

            if ($cek_aktif['is_active'] == 0) {
                 $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                    User ID '. '<b>' .$user_id. '</b>' .' belum aktif.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect('data/absen');
            }
            
            $set_id = $this->input->post('user_id');
            $query = $this->db->get_where('user', ['user_id' => $set_id]);
            $cek_id = $query->num_rows();
            if ($cek_id < 1) {
                   $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                    User ID '. '<b>' .$set_id. '</b>' .' belum terdaftar.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect('data/absen');
            }

           $this->db->where('DAY(date)', date('d'));
           $this->db->where('MONTH(date)', date('m'));
           $this->db->where('YEAR(date)', date('Y'));
            $this->db->where('user_id', $set_id);
            $query_tgl = $this->db->get("data_absen");
            $cek_absen = $query_tgl->num_rows();
            if ($cek_absen > 0) {
                 $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show"role="alert"> User ID '. '<b>' .$set_id. '</b>' .' sudah absen.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect('data/absen');
            }

            $this->db->insert('data_absen', $data);
             $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">User ID '. '<b>' .$set_id. '</b>' .' telah berhasil absen.<br>'. '<small>Keterangan : ' . $this->input->post('keterangan') . '</small>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
            redirect('data/absen');
        }

    }

    public function tambahmember()
    {
        $email = $this->input->post('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $data = [
            'nama' => htmlspecialchars($this->input->post('name'),true),
            'email' => htmlspecialchars($email,true),
            'image' => 'default.jpg',
            'kelas' => htmlspecialchars($this->input->post('kelas'),true),
            'ttl' => htmlspecialchars($this->input->post('date'),true),
            'is_active' => 0,
            'time' => time(),
            'date' => date('Y-m-d H:i:s'),
            'user_id'=> 40125 . $user['id']
        ];

        $this->db->insert('data_member', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Member berhasil ditambahkan dengan nama <b>'. $this->input->post('name') .'</b><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
            redirect('root/member');
    }

    public function kas()
    {
        $data['title'] = 'Data Kas';
        $data['user'] = $this->data->getUserSession();
        $data['nama'] = $this->user->getUserAllKas();
        $data['totalLaba'] = $this->data->getDataTotalLaba();
        $data['totalRugi'] = $this->data->getDataTotalRugi();
        $data['jumlahLaba'] = $this->data->getDataJumlahLaba();
        $data['kasToday'] = $this->data->getKasDataSistemToday();
        $data['jumlahBulan'] = $this->data->getDataJumlahBulan();
        $data['kas'] = $this->data->getDataKas();
        $data['kasPemasukan'] = $this->data->getDataLabaKas();
        $data['kasPengeluaran'] = $this->data->getDataRugiKas();
        $data['kasLabaToday'] = $this->data->getLabaKasToday();
        $data['kasRugiToday'] = $this->data->getRugiKasToday();
        $data['kasLaba'] = $this->data->getLabaKas();
        $data['kasRugi'] = $this->data->getRugiKas();
        $this->db->select_sum('kas');
        $data['kalkulasi'] = $this->db->get('tb_kas')->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/kas/index', $data);
        $this->load->view('templates/footer');
    }

}