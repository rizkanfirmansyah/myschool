<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Upload extends CI_Controller
{

      public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
         maintanance_check();
        log_history();

        $this->load->model('Member_model', 'member');
        $this->load->model('User_model', 'user');
    }


    public function tugas()
    {
    	$cocok = $this->input->post('tugas');
    	$nilai = $this->db->get_where('data_nilai', ['tugas' => $cocok])->row_array();
    	if (!empty($nilai['file'])) {
    		echo "sudah ada tugas COk";
    	}else{

            $upload_file = $_FILES['file']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'docx|txt|pkt|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/member/file-nilai/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $new_file = $this->upload->data('file_name');  
                    $this->db->set('file', $new_file);  
                }else{
                      $this->session->set_flashdata('message', '<div class="red-text" > Ukuran gambar terlalu besar atau ekstensi gambar tidak diperbolehkan <br><i> Catatan :<b>' 
                            . $this->upload->display_errors() .
                            '</b></i>
                            </div>');
                redirect('member/dashboard');
                }
        $this->db->set('waktu', date('Y-m-d'));
    	$this->db->where('tugas', $this->input->post('tugas'));
    	$this->db->update('data_nilai', $data);
    	redirect('member/dashboard');
            }
    	}
    }


    public function catatan()
    {
        $data = [
            'email' => $this->session->userdata('email'),
            'judul' => $this->input->post('judul'),
            'date' => date('Y-m-d H:i:s'),
            'time' => time()
        ];

        $upload_file = $_FILES['file']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'docx|txt|pkt|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/member/file-catatan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $new_file = $this->upload->data('file_name');  
                    $this->db->set('file', $new_file);  
                }else{
                      $this->session->set_flashdata('message', '<div class="red-text" > Ukuran gambar terlalu besar atau ekstensi gambar tidak diperbolehkan <br><i> Catatan :<b>' 
                            . $this->upload->display_errors() .
                            '</b></i>
                            </div>');
                redirect('member/dashboard');
                }
    	$this->db->insert('data_catatan', $data);
    	redirect('member/profile');
            }
    }

    public function kas($kas)
    {
        if ($kas == 'pemasukan') {
            $this->_pemasukan();
        }elseif ($kas == 'pengeluaran'){
            $this->_pengeluaran();
        }else{
            redirect('data/kas');
        }
    }

    private function _pemasukan()
    {
        $tgl = date('Y-m-d');
        $this->db->where('user_id', $this->input->post('user_id'));
        $check = $this->db->get_where('data_kas', ['tanggal' => $tgl])->row_array();   
        if ($check > 1) {
            $nominal =$this->input->post('nominal')+$check['nominal'];
             $data = [
                'nominal' => $nominal,
                'tanggal' => date('Y-m-d'),
                'keterangan' => 'Pemasukan sebesar '. $nominal . ' dengan kode ID '. $this->input->post('user_id'),
                'waktu' => time()
             ];
        $this->db->where('id', $check['id']);
        $this->db->update('data_kas', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                    Kas dengan nominal '. $data['nominal'] .' telah ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('data/kas');
        }
        $data = [
            'user_id' => $this->input->post('user_id'),
            'nominal' => $this->input->post('nominal'),
            'jenis_kas' => 1,
            'tanggal' => date('Y-m-d'),
            'keterangan' => 'Pemasukan sebesar '. $this->input->post('nominal') . ' dengan kode ID '. $this->input->post('user_id'),
            'waktu' => time()
        ];

        $this->db->insert('data_kas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                    Kas dengan nominal '. $data['nominal'] .' telah ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('data/kas');
    }

    private function _pengeluaran()
    {
        $data = [
            'user_id' => 'Admin IT Club',
            'nominal' => $this->input->post('nominal'),
            'jenis_kas' => 2,
            'tanggal' => date('Y-m-d'),
            'keterangan' => $this->input->post('keterangan',true),
            'waktu' => time()
        ];

        $this->db->insert('data_kas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                    Kas dengan nominal '. $data['nominal'] .' telah ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
            redirect('data/kas');
    }

    public function image()
    {   
            $this->db->order_by('id', 'desc');
            $gambar = $this->db->get('gallery', 1)->row_array();
            $id_gambar = $gambar['id']+1;
            $data = [
                'user_post' => htmlspecialchars($this->session->userdata('email')),
                'judul' => htmlspecialchars($this->input->post('judul')),
                'keterangan' => htmlspecialchars($this->input->post('deskripsi')),
                'tanggal' => date('Y-m-d'),
                'waktu' => time(),
                'status' => 1
            ];

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['file_name'] = 'ITC-'.date('dmYHi').$id_gambar;
                $config['overwrite'] = TRUE;
                $config['upload_path'] = './assets/img/gallery/';
                // $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');  
                    $this->db->set('gambar', $new_image);  
                }else{
                      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'. $this->upload->display_errors() .
                        '</b></i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect('setup/gallery');
                }
            }
            $this->db->insert('gallery', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Gambar berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('setup/gallery');
        }


        public function update($id)
        {
            $data = [
                'user_post' => htmlspecialchars($this->session->userdata('email')),
                'judul' => htmlspecialchars($this->input->post('judul')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan')),
                'waktu' => time(),
            ];

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['file_name'] = 'ITC-'.date('dmYHi').$id_gambar;
                $config['overwrite'] = TRUE;
                $config['upload_path'] = './assets/img/gallery/';
                // $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');  
                    $this->db->set('gambar', $new_image);  
                }else{
                      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">'. $this->upload->display_errors() .
                        '</b></i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect('setup/gallery');
                }
            }
            $this->db->where('id', $id);
            $this->db->update('gallery', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Gambar berhasil diperbarui!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('setup/gallery');
        }

}