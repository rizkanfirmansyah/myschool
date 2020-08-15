<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'user');
    }

    public function input()
    {
    	$user = $this->user->getUserSession();
    	
    	$data = [
    		'judul' => $this->input->post('judul', true),
            'deskripsi' => $this->input->post('deskripsi', true),
    		'tag' => $this->input->post('tag', true),
    		'penulis' => $user['name'],
    		'user_id' => $user['user_id'],
    		'email' => $user['email'],
    		'tanggal' => time(),
    		'is_active' => $this->input->post('is_active', true)

    	];
           
            // cek jika gambar diperbarui
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '256';
                $config['upload_path'] = './assets/img/artikel/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');  
                    $this->db->set('image', $new_image);  
                }else{
                      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Ukuran gambar terlalu besar atau ekstensi gambar tidak diperbolehkan <br><i> Catatan :<b>' 
                        . $this->upload->display_errors() .
                        '</b></i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect('hosting/blog');
                }
            }
            $this->db->insert('data_blog', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Artikel berhasil dibuat! silahkan isi konten artikel.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('hosting/blog');
    }


    public function artikel($id)
    {

    	$data['title'] = 'Blog';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tag'] = $this->db->get('data_tag')->result_array();
        $data['artikel'] = $this->db->get_where('data_blog', ['id' => $id])->row_array();

        $this->form_validation->set_rules('artikel', 'Artikel', 'required');
        if ($this->form_validation->run() == false) {
        	$this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('input/blog/artikel', $data);
            $this->load->view('templates/footer');
        }else{

    	$data = [
    		'artikel' => $this->input->post('artikel'),
    		'tanggal' => time()
    	];

    	$this->db->where('id', $id);
    	$this->db->update('data_blog', $data);
    	 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Artikel berhasil dibuat!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('hosting/blog');
 	   }
	}


}