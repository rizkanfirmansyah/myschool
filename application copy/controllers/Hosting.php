<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Hosting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        maintanance_check();
        memory();
        log_history();

        $this->load->model('Data_model', 'data');
        $this->load->model('User_model', 'user');
        $this->load->model('Kas_model', 'kas');
        
    }

    
    public function blog()
    {
        $data['title'] = 'Blog';
        $data['user'] = $this->user->getUserSession();
        $data['tag'] = $this->db->get('data_tag')->result_array();
        $data['artikel'] = $this->data->getDataBlog();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('input/blog/index', $data);
            $this->load->view('templates/footer');
    }

    public function web()
    {
    	$path = 'application/views/hosting/user/';
    	$data['title'] = 'File Website';
    	$data['user'] = $this->user->getUserSession();
    	$data['ufolder'] = $this->data->getDataUserFolder();
    	$data['folder'] = $this->data->getDataFolder();
    	$data['folder_name'] = $data['ufolder']['folder'];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('hosting/web/index', $data);
            $this->load->view('templates/footer');

    
    }

    public function ufolder()
    {
    	$user = $this->input->post('folder');
    	$path = 'application/views/hosting/user/';
    	$path_assets = 'assets/hosting/';
    	$up = $this->input->post('nilai');
    	$id_user = $this->session->userdata('email');
    	$this->db->where('id_folder', 1);
    	$cek_folder = $this->db->get_where('data_folder', ['id_user' => $id_user])->row_array();
    	$folder_name = $cek_folder['folder'];

    	$data = [
    		'folder' => $user,
    		'time' => time(),
    		'date' => date('Y-m-d H:i:s'),
    		'is_active' => 1,
    		'id_folder' => $up,
    		'id_user' => $id_user
    	];

    	$this->db->insert('data_folder', $data);
    	if ($up == 1) {
	    	mkdir($path . $user);
    		chmod($path . $user, 0777);
    		mkdir($path_assets . $user);
    		chmod($path_assets . $user, 0777);
    		redirect('hosting/web');
    	}else{
	    	mkdir($path . '/' . $folder_name . '/' . $user);
    		chmod($path . '/' . $folder_name . '/' . $user, 0777);
    		mkdir($path_assets . '/' . $folder_name . '/' . $user);
    		chmod($path_assets . '/' . $folder_name . '/' . $user, 0777);
    		redirect('hosting/web');
    	}

    }

    public function hapusfolder($folder)
    {
    	$id_user = $this->session->userdata('email');
    	$this->db->where('id_folder', 1);
    	$cek_folder = $this->db->get_where('data_folder', ['id_user' => $id_user])->row_array();
    	$folder_name = $cek_folder['folder'];
    	$path = 'application/views/hosting/user/'.$folder_name.'/';
    	if (is_dir($path.$folder)) {
    		$files = glob($path.$folder . '*', GLOB_MARK); //GLOB_MARK
    		foreach ($files as $file) {
    			delete_files($file);
    		}
    		rmdir($path.$folder);
    	} elseif(is_file($path.$folder)) {
    		@unlink($path.$folder);
    	}
    	$path_assets = 'assets/hosting/'.$folder_name.'/';
    	if (is_dir($path_assets.$folder)) {
    		$files = glob($path_assets.$folder . '*', GLOB_MARK); //GLOB_MARK
    		foreach ($files as $file) {
    			delete_files($file);
    		}
    		rmdir($path_assets.$folder);
    	} elseif(is_file($path_assets.$folder)) {
    		@unlink($path_assets.$folder);
    	}
    	$this->db->where('folder', $folder);
    	$this->db->where('id_folder', 2);
    	$this->db->delete('data_folder'); 
    	$this->db->where('nama_folder', $folder);
    	$this->db->delete('data_hosting');

    	redirect('hosting/web');

    }

    public function hapusfile($id)
    {
    	$id_user = $this->session->userdata('email');
    	$folder = $this->db->get_where('data_hosting', ['id' => $id])->row_array();
    	$file = $folder['file'];
    	$this->db->where('id_folder', 1);
    	$cek_folder = $this->db->get_where('data_folder', ['id_user' => $id_user])->row_array();
    	$folder_name = $cek_folder['folder'];
    	$path = 'application/views/hosting/user/'.$folder_name.'/'.$folder['nama_folder']. '/' ;
    	unlink($path.$file);
    	$pathcss = 'assets/hosting/' . $folder_name . '/' .$folder['nama_folder']. '/';
    	unlink($pathcss.$file);
    	$this->db->where('file', $file);
    	$this->db->delete('data_hosting');

    	redirect('hosting/open/'. $folder['nama_folder']);

    }

    public function open($folder)
    {
    	$data['title'] = 'File Website';
    	$path = 'application/views/hosting/user/';
    	$data['user'] = $this->user->getUserSession();
    	$data['folder'] = $this->data->getDataFile($folder);
    	$data['ufolder'] = $this->data->getDataUserFolder();
    	$data['folder_name'] = $data['ufolder']['folder'];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('hosting/file/index', $data);
            $this->load->view('templates/footer');
    }


    public function upload($folder)
    {
    	$id_user = $this->session->userdata('email');
            $upload_file = $_FILES['files']['name'];
	    	$this->db->where('id_folder', 1);
	    	$cek_folder = $this->db->get_where('data_folder', ['id_user' => $id_user])->row_array();
	    	$folder_name = $cek_folder['folder'];

            if ($upload_file) {
                $config['allowed_types'] = 'html|css|js|jpg|png|gif|svg|php|txt';
                $config['max_size'] = '2048';
                if (substr($upload_file, -4) == 'html') {
               		 $config['upload_path'] = './application/views/hosting/user/'. $folder_name . '/' .$folder;
                }else{
               		 $config['upload_path'] = './assets/hosting/'. $folder_name . '/' .$folder;
               		}

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('files')) {
                    $new_files = $this->upload->data('file_name');  
                }else{
                      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i> Catatan :<b>' 
                            . $this->upload->display_errors() .
                            '</b></i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
            redirect('hosting/open/'.$folder);
            }

            $data = [
            	'nama_folder' => $folder,
            	'file' => $new_files,
            	'time' => time(),
            	'date' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('data_hosting', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
            done!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('hosting/open/'.$folder);
    	}
    }

    public function editfolder($id)
    {
    	$id_user = $this->session->userdata('email');
    	$data['user'] = $this->user->getUserSession();
    	$data['folder'] = $this->db->get_where('data_folder', ['id' => $id])->row_array();
    	$data['title'] = 'Edit Folder '.$data['folder']['folder'];
    	$this->db->where('id_folder', 1);
    	$cek_folder = $this->db->get_where('data_folder', ['id_user' => $id_user])->row_array();
    	$folder_name = $cek_folder['folder'];
        $path = 'application/views/hosting/user/'. $folder_name . '/';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('hosting/web/edit', $data);
            $this->load->view('templates/footer');
    }

    public function efolder()
    {
    	$id_user = $this->session->userdata('email');
    	$id = $this->input->post('id');
    	$old_folder = $this->db->get_where('data_folder', ['id' => $id])->row_array();
    	$folder = $this->input->post('folder');
    	$this->db->where('id_folder', 1);
    	$cek_folder = $this->db->get_where('data_folder', ['id_user' => $id_user])->row_array();
    	$folder_name = $cek_folder['folder'];
    	$path = 'application/views/hosting/user/'. $folder_name . '/';
    	$pathcss = 'assets/hosting/'. $folder_name . '/';

    	rename($path.$old_folder['folder'], $path.$folder);
    	rename($pathcss.$old_folder['folder'], $pathcss.$folder);


    	$this->db->where('nama_folder', $old_folder['folder']);
    	$this->db->update('data_hosting',['nama_folder' => $folder]);
    	$this->db->where('id', $id);
    	$this->db->update('data_folder',['folder' => $folder]);

    	 $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
            Folder name have been changes!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
    	redirect('hosting/web');
    }

    public function editfile($file)
    {
    	$id_user = $this->session->userdata('email');
    	$data['title'] = 'Edit Folder ';
    	$data['user'] = $this->user->getUserSession();
    	$this->db->where('id_folder', 1);
    	$cek_folder = $this->db->get_where('data_folder', ['id_user' => $id_user])->row_array();
    	$folder_name = $cek_folder['folder'];
    	$folder = $this->db->get_where('data_hosting', ['file' => $file])->row_array();
    	$data['folder'] = $folder;
    	$path = 'application/views/hosting/user/'. $folder_name . '/' . $folder['nama_folder'] .'/';
		$pathcss = 'assets/hosting/'. $folder_name . '/' . $folder['nama_folder'] .'/';
    	if (file_exists($path.$file)) {
	    	$data['open'] = file_get_contents($path.$file);
	    	$data['compile'] = file_get_contents($path.$file);
    	} else {
	    	$data['open'] = file_get_contents($pathcss.$file);
	    	$data['compile'] = file_get_contents($path.'index.html');
    	}

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('hosting/web/editfile', $data);
            $this->load->view('templates/footer');
    }

    public function efile($id)
    {
    	$id_user = $this->session->userdata('email');
    	$this->db->where('id_folder', 1);
    	$cek_folder = $this->db->get_where('data_folder', ['id_user' => $id_user])->row_array();
    	$folder_name = $cek_folder['folder'];
    	$folder = $this->db->get_where('data_hosting', ['id' => $id])->row_array();
    	$file = $folder['file'];
    	$path = 'application/views/hosting/user/'. $folder_name . '/' . $folder['nama_folder'] .'/';
    	$pathcss = 'assets/hosting/'. $folder_name .'/' . $folder['nama_folder'] .'/';
    	$nama = $this->input->post('nama');
    	$file_new = $this->input->post('file');
    	$this->db->where('id', $folder['id']);
    	$this->db->update('data_hosting', ['file' => $nama]);

    	if (file_exists($path.$file)) {
    		rename($path.$file, $path.$nama);
    		file_put_contents($path.$nama, $file_new);
    	} else {
    		rename($pathcss.$file, $pathcss.$nama);
    		file_put_contents($pathcss.$nama, $file_new);
    	}
    		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
            File has been changes!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
    	redirect('hosting/open/'.$folder['nama_folder']);
    }

    public function ufile($folder)
    {
    	$id_user = $this->session->userdata('email');
    	$this->db->where('id_folder', 1);
    	$cek_folder = $this->db->get_where('data_folder', ['id_user' => $id_user])->row_array();
    	$folder_name = $cek_folder['folder'];
    	$file = $this->input->post('file');
    	$content = $this->input->post('text');
    	$path = 'application/views/hosting/user/'. $folder_name .'/'.$folder.'/';
    	$pathorder = 'assets/hosting/'. $folder_name . '/' .$folder.'/';

    	if (substr($file, -4) == 'html') {
    		$data = [
    			'nama_folder' => $folder,
    			'file' => $file,
    			'time' => time(),
    			'date' => date('Y-m-d H:i:s')
    		];
    		$this->db->insert('data_hosting', $data);
    		$upload_file = fopen($path.$file, 'w');
    		fwrite($upload_file, $content);
    		fclose($upload_file);
    		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
            File has been created!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
    		redirect('hosting/open/'. $folder);
    	} else {
    		$data = [
    			'nama_folder' => $folder,
    			'file' => $file,
    			'time' => time(),
    			'date' => date('Y-m-d H:i:s')
    		];
    		$this->db->insert('data_hosting', $data);
    		$upload_file = fopen($pathorder.$file, 'w');
    		fwrite($upload_file, $content);
    		fclose($upload_file);
    		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
            File has been created!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
    		redirect('hosting/open/'. $folder);
    	}
    	
    }

    public function status($id, $param)
    {
    	if ($param == 1) {
    		$is_active = 2;
    	} else {
    		$is_active = 1;
    	}

    	$this->db->where('id', $id);
    	$this->db->update('data_folder', ['is_active' => $is_active]);
    	$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
            Folder has been updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
    		redirect('hosting/web');
    	
    }

}