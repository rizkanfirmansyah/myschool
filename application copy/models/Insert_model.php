<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{

	public function insertRole()
	{
		$this->db->insert('user_role', ['role' => $this->input->post('role')]);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                Role berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                 </div>');
        redirect('root/role');
	}


    public function dataHomePageSlider()
    {
         $data = [
                'jenis' => 'slider',
                'judul' => htmlspecialchars($this->input->post('judulslider'),true),
                'deskripsi' => htmlspecialchars($this->input->post('deskslider'),true),
                'keterangan' => htmlspecialchars($this->input->post('ketslider'),true)
            ];

            $upload_file = $_FILES['gambar']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/images/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_file = $this->upload->data('file_name');  
                    $this->db->set('gambar', $new_file);  
                }else{
                     $this->session->set_flashdata('flash', 'error_image');
                    redirect('profile/homepage');
                }

            $this->db->insert('data_homepage', $data);
            $swal = [
                'tipe' => 'success',
                'pesan' => 'Slider Berhasil Ditambahkan'
            ];
            $this->session->set_flashdata($swal);
            redirect('profile/homepage');
           }
        }

    public function dataHomePageSponsor()
    {
         $data = [
                'jenis' => 'sponsor',
                'judul' => htmlspecialchars($this->input->post('judulsponsor'),true),
                'deskripsi' => htmlspecialchars($this->input->post('desksponsor'),true),
                'keterangan' => htmlspecialchars($this->input->post('ketsponsor'),true)
            ];

            $upload_file = $_FILES['imagesponsor']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/images/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('imagesponsor')) {
                    $new_file = $this->upload->data('file_name');  
                    $this->db->set('gambar', $new_file);  
                }else{
                     $this->session->set_flashdata('flash', 'error_image');
                    redirect('profile/homepage');
                }

            $this->db->insert('data_homepage', $data);
            $swal = [
                'tipe' => 'success',
                'pesan' => 'Sponsor Berhasil Ditambahkan'
            ];
            $this->session->set_flashdata($swal);
            redirect('profile/homepage');
           }
        }

    public function dataHomePageTestimonial()
    {
         $data = [
                'jenis' => 'testimonial',
                'judul' => htmlspecialchars($this->input->post('nama'),true),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsitest'),true)
            ];

            $upload_file = $_FILES['imagetest']['name'];

            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/testimonial/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('imagetest')) {
                    $new_file = $this->upload->data('file_name');  
                    $this->db->set('gambar', $new_file);  
                }else{
                     $this->session->set_flashdata('flash', 'error_image');
                    redirect('profile/homepage');
                }

            $this->db->insert('data_homepage', $data);
            $swal = [
                'tipe' => 'success',
                'pesan' => 'Testimonial Berhasil Ditambahkan'
            ];
            $this->session->set_flashdata($swal);
            redirect('profile/homepage');
           }
        }

    public function dataHomePageServices()
    {
         $data = [
                'jenis' => 'services',
                'judul' => htmlspecialchars($this->input->post('judulservices'),true),
                'deskripsi' => htmlspecialchars($this->input->post('deskservices'),true),
                'gambar' => htmlspecialchars($this->input->post('iconservices'),true)
            ];
            $this->db->insert('data_homepage', $data);
            $this->session->set_flashdata('flash', 'slider_insert');
            redirect('profile/homepage');

    }

    public function insertDataSiswa()
    {
        $this->db->where('nis', $this->input->post('nis'));
        $this->db->or_where('nama', $this->input->post('nama'));
        $siswa = $this->db->get('siswa')->row_array();

        if(empty($this->input->post('password') )){
            $pass = password_hash($this->input->post('nis'), PASSWORD_DEFAULT);
        }else{
            $pass =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }
        $data = [
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'jurusan' => $this->input->post('jurusan'),
            'angkatan' => $this->input->post('angkatan'),
            'tahun_ajaran' => $this->input->post('ajaran1').'/'.$this->input->post('ajaran2'),
            'email' => '-',
            'password' => $pass,
            'gambar' => 'default.jpg',
            'role_id' => 4,
            'status' => $this->input->post('is_active'),
            'telepon' => 0 
        ];
            if($siswa){
                $this->session->set_flashdata('flash', 'data_coulision');
                redirect('data/siswa');
            }
            $this->db->insert('siswa', $data);
            $this->session->set_flashdata('flash', 'data_success');
            redirect('data/siswa');
    }


}