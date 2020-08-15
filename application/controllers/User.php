<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('auth');
        // is_logged_in();
        }
        $this->load->model('User_model', 'user');
        $this->load->model('Data_model', 'data');
        $this->load->model('Backend_model', 'setting');
         maintanance_check();
        log_history();
        memory();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->user->getUserSession();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function setting()
    {
        $data['title'] = 'Setting web';
        $data['user'] = $this->user->getUserSession();
        $data['setting'] = $this->setting->getSetting();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/setting', $data);
        $this->load->view('templates/footer');
    }

     public function edit()
    {
        $data['user'] = $this->user->getUserSession();
        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
        }else{
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika gambar diperbarui
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '256';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');  
                    $this->db->set('image', $new_image);  
                }else{
                      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Ukuran gambar terlalu besar atau ekstensi gambar tidak diperbolehkan <br><i> Catatan :<b>' 
                            . $this->upload->display_errors() .
                            '</b></i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
                redirect('user');
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
            Profil kamu sudah berhasil diperbarui!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('user');
        }
    }


    public function changepassword()
    {
        $data['user'] = $this->user->getUserSession();
        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('currentPassword', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('newPassword1', 'Password Baru', 'required|trim|min_length[5]|matches[newPassword2]');
        $this->form_validation->set_rules('newPassword2', 'Konfirmasi Password Baru', 'required|trim|min_length[5]|matches[newPassword1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
                
        }else{
            $currentPassword = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword1');
            if (!password_verify($currentPassword, $data['user']['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
            Password lama salah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('user/changepassword');
            }else{
                if ($currentPassword == $newPassword) {
                     $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                        Password baru tidak boleh sama dengan password lama!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                        redirect('user/changepassword');
                }else{
                    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $this->db->set('password', $passwordHash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                     $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                    Password berhasil diubah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('user/changepassword');
                }
            }
        }

    }

    public function log()
    {
         $data['title'] = 'Log History';
        $data['user'] = $this->user->getUserSession();
        $data['log'] = $this->user->getDataLogHistory();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/history', $data);
        $this->load->view('templates/footer');
    }


    public function clearlog()
    {
        $this->db->set('status', 0);
        $this->db->where('user', $this->session->userdata('email'));
        $this->db->where('status', 1);
        $this->db->update('log');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
        Log dibersihkan!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('user/log');
    }


}
