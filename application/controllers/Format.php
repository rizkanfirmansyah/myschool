<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Format extends CI_Controller
{

    public function siswa()
    {
        $this->db->where('role_id', 4);
        $this->db->empty_table('users');
        // $this->db->empty_table('staff');
        $this->db->empty_table('siswa');
        $swal = [
            'tipe' => 'icon',
            'pesan' => 'Data Siswa Berhasil di Hapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/siswa');

    }

    public function guru()
    {
        $this->db->where('role_id', 3);
        $this->db->empty_table('user');
        $this->db->empty_table('guru');
        // $this->db->empty_table('siswa');
        $swal = [
            'tipe' => 'icon',
            'pesan' => 'Data Guru Berhasil di Hapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/guru');
    }

}

