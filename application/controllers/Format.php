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

    public function user()
    {
        $this->db->where('role_id !=', 1)->empty_table('users');
        $this->db->empty_table('siswa');
        $this->db->empty_table('guru');
        $this->db->empty_table('staff_jabatan');
        $this->db->empty_table('jadwal');
        $swal = [
            'tipe' => 'icon',
            'pesan' => 'Data Siswa Berhasil di Hapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('admin/user');
    }
    
    public function guru()
    {
        $this->db->where('role_id', 3);
        $this->db->empty_table('users');
        $this->db->where('role_id', 2);
        $this->db->empty_table('users');
        $this->db->empty_table('guru');
        $this->db->empty_table('staff_jabatan');
        $this->db->empty_table('jadwal');
        // $this->db->empty_table('siswa');
        $swal = [
            'tipe' => 'icon',
            'pesan' => 'Data Guru Berhasil di Hapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/guru');
    }

    public function jadwal()
    {
        $this->db->empty_table('jadwal');
        $swal = [
            'tipe' => 'icon',
            'pesan' => 'Data Jadwal Berhasil di Hapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('kurikulum/jadwal');
    }

    public function statususer()
    {
        $siswa = $this->db->get('siswa', ['user_id' => null])->result();
        
        foreach($siswa as $s){
            $users = $this->db->get('users', ['email' => $s->email])->row();
            $this->db->set('user_id', $users->id)->where('nis', $users->nama)->update('siswa');
        }
    }

    public function staff()
    {
        $this->db->empty_table('staff_jabatan');
        $swal = [
            'tipe' => 'icon',
            'pesan' => 'Data Staff Berhasil di Hapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('admin/staff');
    }

}

