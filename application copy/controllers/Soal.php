<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         maintanance_check();
        log_history();
    }

    public function input()
    {
        $id_pengajar = $this->input->post('user_id');
        $pengajar = $this->db->get_where('data_materi', ['user_id' => $id_pengajar])->row_array();

        $data = [
            'id_soal' => $pengajar['tingkatan']. '-' . $pengajar['jurusan']. '-' .$this->input->post('bab'),
            'id_pengajar' => $id_pengajar,
            'soal' => $this->input->post('soal', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'bab' => $this->input->post('bab', true),
            'jurusan' => $pengajar['jurusan'],
            'is_active' => 0,
            'time' => time()

        ];

            $this->db->insert('data_soal', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Soal berhasil dibuat! silahkan lengkapi soal dan jawaban.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('input/soal');
    }

    public function status($id, $is)
    {
      
        if ($id == 1) {
             $this->db->where('id', $is);
           $this->db->update('data_soal', ['is_active' => 1]);
           $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Soal sudah aktif!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('input/soal');
        }else {
        $this->db->where('id', $is);
        $this->db->update('data_soal', ['is_active' => 0]);
           $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Soal sudah tidak aktif!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('input/soal');
        }
    }

    public function soal()
    {
        $cek = $this->db->get_where('data_soal', ['id_soal' => $this->input->post('id_soal')])->row_array();
        $ceksoal = $this->db->get_where('data_jawaban', ['id_soal' => $this->input->post('id_soal')])->num_rows();
        if ($cek['jurusan'] == 'Networking') {
              $kode = 'network';
          }elseif ($cek['jurusan'] == 'Programming') {
              $kode = 'program';
          }elseif ($cek['jurusan' == 'Multimedia']) {
              $kode = 'mulmed';
          }
        $data = [
            'id_soal' => $this->input->post('id_soal'),
            'id_pg' => $cek['bab'].'-'.$kode.++$ceksoal,
            'soal' => $this->input->post('soal', true),
            'a' => $this->input->post('a', true),
            'b' => $this->input->post('b', true),
            'c' => $this->input->post('c', true),
            'd' => $this->input->post('d', true),
            'jawaban' => $this->input->post('jawaban', true)
        ];
        var_dump($data);
        die;

            $this->db->insert('data_jawaban', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Soal dan jawaban berhasil dibuat!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></div>');
            redirect('soal/manage/'. $this->input->post('id_soal'));
    }

    public function manage($id_soal)
    {
        $data['title'] = 'Soal & Jawaban';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['cek'] = $this->db->get_where('data_materi', ['user_id' => 'ITP-'.$data['user']['id']])->row_array();
        $data['soal'] = $this->db->get_where('data_jawaban', ['id_soal' => $id_soal])->result_array();
        $data['id_soal'] = $id_soal;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('input/soal/manage', $data);
            $this->load->view('templates/footer');
    }

}