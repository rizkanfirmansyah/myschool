<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Postingan extends CI_Controller
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
        $this->load->model('Postingan_model', 'member');
        $this->load->model('User_model', 'user');
    }

    public function upload()
    {
    	$user = $this->user->getUserSession();
    	$datapost = $this->db->get('data_postingan')->num_rows();
    	
    	$data = [
    		'id_post' => 'itpost-'. ++$datapost,
            'email' => $user['email'],
    		'nama' => $user['name'],
    		'profil' => $user['image'],
    		'text' => $this->input->post('text'),
    		'time' => time(),
            'tgl' => date('Y-m-d')
    	];
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '1024';
                $config['upload_path'] = './assets/img/data_post/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');  
                    $this->db->set('gambar', $new_image);  
                }else{
                      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Ukuran gambar terlalu besar atau ekstensi gambar tidak diperbolehkan <br><i> Catatan :<b>' 
                        . $this->upload->display_errors() .
                        '</b></i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                redirect('member');
                }
            }else{
                $this->db->set('gambar', 0);  
            }
            $this->db->insert('data_postingan', $data);
            echo "
				<script>
					alert('Data berhasil diinput!');
					document.location.href = 'http://192.168.43.175/itclub/member';
				</script>
				";
   		 }

    }
