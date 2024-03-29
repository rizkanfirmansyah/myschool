<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Materi extends CI_Controller
{

      public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('auth');
        }
         maintanance_check();
        log_history();
    }

    public function aksi()
    {
        $cek = $_GET['action'];
        if($cek == 'hapus'){
            $this->_hapusMateri();
        }elseif($cek == 'hapustugas'){
            $this->_hapusTugas();
        }elseif($cek == 'simpanMateri'){
            $this->_simpanMateri();
        }elseif($cek == 'simpanTugas'){
            $this->_simpanTugas();
        }
    }

    public function _simpanMateri()
    {
        $data = [
            'nama_materi' => $_GET['nama_materi'],
            'deskripsi' => $_GET['deskripsi'],
        ];
        $this->db->where('id', $_GET['id'])->set($data)->update('data_materi');
        $swal = [
            'tipe' => 'success',
            'pesan' => 'Data materi berhasil diperbaharui',
        ];
        $this->session->set_flashdata($swal);
        redirect('guru');
    }

    public function _simpanTugas()
    {
        $data = [
            'nama_tugas' => $_GET['nama_tugas'],
            'deskripsi' => $_GET['deskripsi'],
        ];
        $this->db->where('id', $_GET['id'])->set($data)->update('data_tugas');
        $swal = [
            'tipe' => 'success',
            'pesan' => 'Data tugas berhasil diperbaharui',
        ];
        $this->session->set_flashdata($swal);
        redirect('guru');
    }

    private function _hapusMateri()
    {
        $id = $_GET['id'];
        $materi = $this->db->get_where('data_file', ['id_materi' => $id])->result();

        foreach ($materi as $file ) {
            unlink($file->lokasi_file.$file->nama_file);
        }

        $this->db->where('id_materi', $id)->delete('data_file');
        $this->db->where('id', $id)->delete('data_materi');
        $swal = [
            'tipe' => 'success',
            'pesan' => 'Data materi berhasil dihapus',
        ];
        $this->session->set_flashdata($swal);
        redirect('guru');
    }

    private function _hapusTugas()
    {
        $id = $_GET['id'];
        $materi = $this->db->get_where('data_file', ['id_materi' => $id])->result();

        foreach ($materi as $file ) {
            unlink($file->lokasi_file.$file->nama_file);
        }

        $this->db->where('id_materi', $id)->delete('data_file');
        $this->db->where('id', $id)->delete('data_tugas');
        $swal = [
            'tipe' => 'success',
            'pesan' => 'Data tugas berhasil dihapus',
        ];
        $this->session->set_flashdata($swal);
        redirect('guru');
    }

    public function status($tipe, $status, $id)
    {
        if($tipe == 'materi'){
            $this->db->where('id', $id)->set('status', $status)->update('data_materi');
            if($status == 1){
                $tipe = 'success';
                $pesan = 'Materi berhasil diaktifkan';
            }else{
                $tipe = 'error';
                $pesan = 'Materi berhasil dinonaktifkan';
            }
            
            $swal = [
                'tipe' => $tipe,
                'pesan' => $pesan,
            ];
        }elseif($tipe == 'tugas'){
            $this->db->where('id', $id)->set('status', $status)->update('data_tugas');
            if($status == 1){
                $tipe = 'success';
                $pesan = 'Tugas berhasil diaktifkan';
            }else{
                $tipe = 'error';
                $pesan = 'Tugas berhasil dinonaktifkan';
            }
            
            $swal = [
                'tipe' => $tipe,
                'pesan' => $pesan,
            ];
        }
        $this->session->set_flashdata($swal);
        redirect('guru');
    }

    public function siswa($materi, $id)
    {
        $idsiswa = $this->session->userdata('nama');
        $this->db->where('id_materi', $materi)->where('id_siswa', $idsiswa)->set('selesai', $id)->update('materi_siswa');

        if($id == 1){
            $swal = [
                'tipe' => 'success',
                'pesan' => 'Materi sudah selesai anda pelajari, Selamat!'
            ];
        }else{
            $swal = [
                'tipe' => 'warning',
                'pesan' => 'Materi belum selesai anda pelajari, Silahkan Belajar lagi!'
            ];
        }
        $this->session->set_flashdata($swal);
        redirect('siswa');
    }

}