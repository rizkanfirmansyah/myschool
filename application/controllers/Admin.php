<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        maintanance_check();
        log_history();
        $this->load->model('User_model', 'user');
        $this->load->model('Insert_model', 'insert');
        $this->load->model('Data_model', 'data');
        $this->load->model('Update_model', 'update');
        $this->load->model('Delete_model', 'delete');
        $this->load->model('Member_model', 'member');
        $this->load->model('Backend_model', 'backend');
        $this->load->model('Staff_model', 'staff');
         if ($this->session->userdata('role_id') != 1) {
                redirect('data/user/');
        }
    }


//============================================================================================================================//
//============================================================================================================================//
                                                    // admin AKSES DASHBOARD //
//============================================================================================================================//
//============================================================================================================================//

    private function _templates($data){

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/index', $data);
        $this->load->view('templates/footer');
        // $this->load->view('admin/data/chart/tag', $data);
        // $this->load->view('admin/data/chart/postingan', $data);
        // $this->load->view('admin/data/chart/absen', $data);
        // $this->load->view('admin/data/chart/artikel', $data);
        // $this->load->view('admin/data/chart/jurusan', $data);
        // $this->load->view('admin/data/chart/keterangan_absen', $data);
        // $this->load->view('admin/data/chart/kas', $data);
        // $this->load->view('admin/data/chart/log', $data);
        // $this->load->view('admin/data/chart/kas_total', $data);
        // $this->load->view('admin/data/end', $data);
    }

    private function _data($data){
        $data['user'] = $this->user->getUserSession();
        $data['userAktif'] = $this->user->getAllUserActive();
        $data['userNotAktif'] = $this->user->getAllUserNotActive();
        $data['userAll'] = $data['userAktif'] + $data['userNotAktif'];

    // http://stackoverflow.com/a/21409562/1163000
        function get_directory_size($path) {
            $size = 0;
            $path = realpath($path);
            if($path !== false) {
                foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
                    $size += $object->getSize();
                }
            }
            return $size; // in bytes
        }

        $data['size'] = number_format((get_directory_size('') / 1024 / 1024),2);

        $this->_templates($data);  
    }

    public function index()
    {
        $id = base64_encode(urlencode("minggu"));
        $data_id = 5; 
        $limit = 10;
        $status = "hari";
        $param = base64_encode(urlencode("minggu"));
        $param_id = base64_encode(urlencode("minggu"));
        $data['title'] = 'Dashboard';

        $this->_data($data, $data_id, $param_id, $id, $status, $limit, $param);       
    }

  


//===================================================================================================================//
//===================================================================================================================//
                                                    // admin AKSES DASHBOARD //
//===================================================================================================================//
//===================================================================================================================//


    public function staff()
    {
        $data = [
            'title' =>'Data Staff',
            'user' => $this->user->getUserSession(),
            'staffjabatan' => $this->staff->staffjabatan(),
            'bagkesiswaan' => $this->staff->kabag('kesiswaan'),
            'bagkurikulum' => $this->staff->kabag('kurikulum'),
            'bagtatausaha' => $this->staff->kabag('tata usaha'),
            'bagsarana' => $this->staff->kabag('sarana & prasarana'),
            'kesiswaan' => $this->staff->staff('kesiswaan'),
            'kurikulum' => $this->staff->staff('kurikulum'),
            'tatausaha' => $this->staff->staff('tata usaha'),
            'sarana' => $this->staff->staff('sarana & prasarana'),
            'staff' => $this->staff->all(),
            'staffbag' => $this->staff->staffbag(),
            'guru' => $this->staff->guru(),
        ];
        // var_dump($data['sarana']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/staff', $data);
        $this->load->view('templates/footer');

    }

    public function user()
    {
        $data = [
            'title' =>'Data User',
            'user' => $this->user->getUserSession(),
            'siswa' => $this->user->siswa(),
            'guru' => $this->user->guru(),
            'segmentuser' => $this->user->segmentuser()
        ];
        // var_dump($data['segmentuser']);
        // die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
       $data['title'] = 'Role';
        $data['user'] = $this->user->getUserSession();
        $data['role'] = $this->user->getRole();
        $data['jml'] = $this->db->get('user_role')->num_rows();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');

        } else {
           $this->insert->insertRole();
        }

    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->user->getUserSession();
        $data['role'] = $this->user->getRoleId($role_id);
        $data['menu'] = $this->user->getMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/footer');
    }

    public function editRole($id)
    {
        $data['title'] = 'Role Edit';
        $data['user'] = $this->user->getUserSession();
        $data['role'] = $this->user->getRole();
        $data['Role'] = $this->user->getUserRole($id);

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editrole', $data);
            $this->load->view('templates/footer');

        } else {
         $data = [
                'id' => $this->input->post('id'),
                'role' => $this->input->post('role')
            ];
            $this->update->updateRole($data, $id, $role);
        }
    }

     public function deleterole($id)
    {
        $this->delete->deleteRole($id);
    }

    public function changeaccess()
    {
        $this->load->model('Access_model');
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $this->Access_model->changeAccess($menu_id, $role_id);
    }

// database user

    public function databaseuser()
    {
        $data['title'] = 'Database User';
        $data['user'] = $this->user->getUserSession();
        $data['User'] = $this->user->getUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/databaseuser', $data);
        $this->load->view('templates/footer');

    }

     public function datauser($id)
    {
        $data['title'] = 'List Data User';
        $data['user'] = $this->user->getUserSession();
        $data['id'] = $id;
        $data['judul'] = $this->user->getJudul($id);
        $data['role'] = $this->data->getUserRoleAdmin();
        $data['users'] = $this->user->getUsers($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datauser', $data);
        $this->load->view('templates/footer');
    }


    public function member()
    {
        $data['title'] = 'Database Member';
        $data['user'] = $this->user->getUserSession();
        $data['users'] = $this->data->getUserAll();
        $data['member'] = $this->member->databaseMember();
        $data['total'] = $this->member->totalMember();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/member', $data);
        $this->load->view('templates/footer', $data);
    }



    // ++++++++++++++++++++++++++++++++++++++++++++++ BACK END ++++++++++++++++++++++++++++++++++++++++++++++

    public function backend()
    {
        $data['title'] = 'Data Backend';
        $data['user'] = $this->user->getUserSession();
        $data['code'] = $this->backend->getDataBackend();
        $data['komponen'] = $this->backend->getDataKomponen();
        $data['kalkulasi'] = $this->backend->getDataCode();
        $data['tb_code'] = $this->backend->getDataKomponenAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('code/backend', $data);
        $this->load->view('templates/footer', $data);
    }


    // public function user($id, $role_id)
    // {
    //     $data['title'] = 'Edit Data Member';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['edit'] = $this->db->get_where('user', ['id' => $id])->row_array();
    //     $this->db->where('role !=', 'admin');
    //     $data['Edit'] = $this->db->get('user_role')->result_array();
    //     $data['member'] = $this->db->get_where('data_member', ['id' => $id])->row_array();

    //     $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

    //     if ($this->form_validation->run() == false) {
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('edit/user', $data);
    //     $this->load->view('templates/footer');
    //     }else{
    //         $data = [
    //             'email' => htmlspecialchars($this->input->post('email')),
    //             'name' => htmlspecialchars($this->input->post('name')),
    //             'role_id' => htmlspecialchars($this->input->post('role')),
    //             'is_active' => $this->input->post('is_active')
    //         ];

    //         // var_dump($data);
    //         // die;
            
    //         // cek jika gambar diperbarui
    //         $upload_image = $_FILES['image']['name'];

    //         if ($upload_image) {
    //             $config['allowed_types'] = 'gif|jpg|png';
    //             $config['max_size'] = '256';
    //             $config['upload_path'] = './assets/img/member/';

    //             $this->load->library('upload', $config);

    //             if ($this->upload->do_upload('image')) {
    //                 $old_image = $data['user']['image'];
    //                 if ($old_image != 'default.jpg') {
    //                     unlink(FCPATH . 'assets/img/member/' . $old_image);
    //                 }

    //                 $new_image = $this->upload->data('file_name');  
    //                 $this->db->set('image', $new_image);  
    //             }else{
    //                   $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"> Ukuran gambar terlalu besar atau ekstensi gambar tidak diperbolehkan <br><i> Catatan :<b>' 
    //                         . $this->upload->display_errors() .
    //                         '</b></i><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                             <span aria-hidden="true">&times;</span>
    //                         </button>
    //                         </div>');
    //             redirect('admin/datauser/' . $role_id);
    //             }
    //           }

    //         $this->db->set('name', $name);
    //         $this->db->where('id', $id);
    //         $this->db->update('user', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"> 
    //         Data User sudah berhasil diperbarui!
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //         </button>
    //         </div>');
          
    //             redirect('admin/datauser/' . $role_id);

    //         }

    //     }
        


}
