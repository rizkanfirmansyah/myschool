<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Update extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
         maintanance_check();
        log_history();
    }

    public function blog($id, $judul)
    {
    	 $ada = $this->db->get_where('data_blog', ['id' => $id])->row_array();
        
        if ($ada['is_active'] == 0) {
            $data = ['is_active' => 1 ];
            $this->db->set('is_active', $data);
            $this->db->where('id', $id);
            $this->db->update('data_blog', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                Blog '. urldecode($judul) .' sudah aktif sekarang
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('hosting/blog');
        } else {
            $data = ['is_active' => 0];
            $this->db->set('is_active', $data);
            $this->db->where('id', $id);
            $this->db->update('data_blog', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                Blog '. urldecode($judul) .' sudah tidak aktif sekarang
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('hosting/blog');
        }
    }


    public function slider()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $keterangan = $this->input->post('keterangan'); 
        $icon = $this->input->post('icon'); 
        $gambar = $this->input->post('gambar'); 
        $check = $this->db->get_where('data_homepage', ['id' => $id])->row_array();

        if($check['jenis'] == 'slider'){
             $data = [
                    'judul' => $judul,
                    'deskripsi' => $deskripsi,
                    'keterangan' => $keterangan
                ];

        }elseif($check['jenis'] == 'services'){
            $data = [
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'gambar' => $icon
            ];
        }elseif($check['jenis'] == 'profile'){
            $data = [
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'keterangan' => $keterangan
            ];
        }elseif($check['jenis'] == 'testimonial'){
            $data = [
                'judul' => $judul,
                'deskripsi' => $deskripsi
            ];
        }elseif($check['jenis'] == 'footer'){
            $data = [
                'judul' => $judul,
                'deskripsi' => $deskripsi
            ];
        }elseif($check['jenis'] == 'sosmed'){
            $data = [
                'judul' => $judul,
                'deskripsi' => $deskripsi
            ];
        }elseif($check['jenis'] == 'contact'){
            $data = [
                'judul' => $judul,
                'deskripsi' => $deskripsi,
                'keterangan' => $keterangan,
                'gambar' => $gambar
            ];
        }elseif($check['jenis'] == 'sponsor'){
            $data = [
                'judul' => $judul,
                'deskripsi' => $deskripsi
            ];
        }
       
        $this->db->where('id', $id);
        $this->db->update('data_homepage', $data);
        $this->session->set_flashdata('flash', 'slider_update');
    }

    public function sosmed()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $keterangan = $this->input->post('keterangan'); 
        if($keterangan == 'aktif'){
            $status = 'tidak aktif';
        }else{
            $status = 'aktif';
        }

        $this->db->where('id', $id);
        $this->db->update('data_homepage', ['keterangan' => $status]);
        $this->session->set_flashdata('flash', 'slider_update');
    }

    public function gambarslider()
    {
        $id = $this->input->post('id');
        $check = $this->db->get_where('data_homepage', ['id' => $id])->row_array();
        $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/images/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $check['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/images/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');  
                    $this->db->set('gambar', $new_image);  
                }else{
                    $this->session->set_flashdata('flash', 'error_image');
                    redirect('profile/homepage');
                }
            }

            $this->db->where('id', $id);
            $this->db->update('data_homepage');
            $this->session->set_flashdata('flash', 'slider_update');
            redirect('profile/homepage');
        }

    public function gambartestimonial()
    {
        $id = $this->input->post('id');
        $check = $this->db->get_where('data_homepage', ['id' => $id])->row_array();
        $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/testimonial/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $check['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/testimonial/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');  
                    $this->db->set('gambar', $new_image);  
                }else{
                    $this->session->set_flashdata('flash', 'error_image');
                    redirect('profile/homepage');
                }
            }

            $this->db->where('id', $id);
            $this->db->update('data_homepage');
            $this->session->set_flashdata('flash', 'slider_update');
            redirect('profile/homepage');
        }

    public function gambarfooter()
    {
        $id = $this->input->post('id');
        $check = $this->db->get_where('data_homepage', ['id' => $id])->row_array();
        $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/images/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $check['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/images/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');  
                    $this->db->set('gambar', $new_image);  
                }else{
                    $this->session->set_flashdata('flash', 'error_image');
                    redirect('profile/homepage');
                }
            }

            $this->db->where('id', $id);
            $this->db->update('data_homepage');
            $this->session->set_flashdata('flash', 'slider_update');
            redirect('profile/homepage');
        }


}