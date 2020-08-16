<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         maintanance_check();
        log_history();
        $this->load->model('User_model', 'user');
        $this->load->model('Member_model', 'member');
        $this->load->model('Artikel_model', 'artikel');
    }


    public function index()
    {
    	$data['title'] = 'IT Club';
        $data['user'] = $this->user->getUserSession();
        $data['member'] = $this->member->getEmailmember();
        $data['status'] = $this->db->get_where('data_status', ['email' => $this->session->userdata('email')])->row_array();
        $data['jurusan'] = $this->db->get_where('data_jurusan', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->order_by('user_id', 'asc');
        $data['anggota'] = $this->db->get_where('data_member')->result_array();
        $data['postingan'] = $this->artikel->dataPostingan();
        $this->db->select('id, tag, COUNT(tag) as total');
        $this->db->group_by('tag');
        $this->db->where('is_active !=', 0);
        $data['tags'] = $this->db->get('data_blog')->result_array();


        $config['base_url'] = 'http://192.168.43.175/itclub/artikel/index';
        $config['total_rows'] = $this->artikel->countAllArtikel();
        $config['per_page'] = 3;

        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li class="waves-effect">';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['next_link']        = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['prev_link']        = '<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="active">  <a class="page-link" href="#">';
        $config['cur_tag_close']    = '</a></li>'; 
        $config['num_tag_open']     = '<li class="waves-effect">';
        $config['num_tag_close']    = '</li>';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['artikel'] = $this->artikel->countArtikel($config['per_page'], $data['start']);

        $this->load->view('member/artikel/templates/header', $data);
        $this->load->view('member/artikel/main_artikel', $data);
        $this->load->view('member/artikel/aside_artikel', $data);
        $this->load->view('member/artikel/templates/footer', $data);
    }

    public function open($id, $judul)
    {
        lihatpost($id);
    	$data['title'] = 'IT Club';
        $data['user'] = $this->user->getUserSession();
        $data['member'] = $this->member->getEmailmember();
        $data['status'] = $this->db->get_where('data_status', ['email' => $this->session->userdata('email')])->row_array();
        $data['jurusan'] = $this->db->get_where('data_jurusan', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->order_by('user_id', 'asc');
        $data['anggota'] = $this->db->get_where('data_member')->result_array();
        $data['artikel'] = $this->artikel->getArticleRead($id);
        $tags = $data['artikel'];
        $tag = $tags['tag'];
        $data['postingan'] = $this->artikel->dataPostinganRead($tag, $id);
        $data['jumlahKomen'] = $this->artikel->hitungJumlahKomen($id);
        if ($data['jumlahKomen'] == NULL) {
            $data['komen'] = 0;
        } else {
            $data['komen'] = $data['jumlahKomen'];
        }

        $config['base_url'] = 'http://192.168.43.175/itclub/artikel/open/' . $id . '/' . $judul;
        $config['total_rows'] = $this->artikel->countAllKomen($id);
        $config['per_page'] = 2;

        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li class="waves-effect">';
        $config['first_tag_close']  = '</li>';
        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';
        $config['next_link']        = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';
        $config['prev_link']        = '<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';
        $config['cur_tag_open']     = '<li class="active">  <a class="page-link" href="#">';
        $config['cur_tag_close']    = '</a></li>'; 
        $config['num_tag_open']     = '<li class="waves-effect">';
        $config['num_tag_close']    = '</li>';

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(5);
        $data['komentar'] = $this->artikel->countKomen($id, $config['per_page'], $data['start']);

        $this->load->view('member/artikel/templates/header', $data);
        $this->load->view('member/artikel/main', $data);
        $this->load->view('member/artikel/aside', $data);
        $this->load->view('member/artikel/templates/footer', $data);
    }


    public function komentar($id, $email, $judul)
    {
        if (empty($this->input->post('komentar'))) {
            redirect('artikel/open/' . $id . '/' . $judul);
        }
        $data = [
            'id_post' => $id,
            'email' => urldecode($email),
            'date' => date('Y-m-d H:i:s'),
            'komentar' => htmlspecialchars($this->input->post('komentar'),true),
            'time' => time()
        ];

        $this->db->insert('data_komentar', $data);
        redirect('artikel/open/' . $id . '/' . $judul);
    }

}