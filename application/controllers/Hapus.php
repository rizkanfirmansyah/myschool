<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Hapus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
         maintanance_check();
        log_history();
    }

    public function member($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_member');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        					Member telah berhasil dihapus
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        
            if ($this->session->userdata('role_id') == 1) {
                redirect('root/member');
            } else {
                redirect('admin/member');
            }
    }  

    public function setrule($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_developer');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data have been delete!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect('developer/developer');
    }  

    public function absen($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_absen');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Absen have been delete!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect('data/absen');
    }  


    public function materi($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('data_materi');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Data pengajar telah berhasil dihapus
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect('input/materi');
    }

    public function list($id, $user_id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_materi');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Materi telah berhasil dihapus
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect('input/list/' . $user_id);
    }

    public function tugas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_tugas');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Tugas telah berhasil dihapus!!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect('input/tugas');
    }


    public function submenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Sub Menu telah berhasil dihapus!!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect('menu/submenu');
    }


    public function blog($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_blog');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Artikel telah berhasil dihapus!!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect('hosting/blog');
    }

    public function sistemkas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_kas');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Sistem kas berhasil dihapus
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect('admin/kas');
    }

    public function soal($id, $soal)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_jawaban');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Soal & Jawaban telah berhasil dihapus!!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect('soal/manage/'.$soal);
    }

    public function gallery($id, $gambar, $judul)
    {
        $target = 'assets/img/gallery/'.$gambar;
        $this->db->where('id', $id);
        $this->db->delete('gallery');
        if (file_exists($target)) {
            unlink($target);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Gambar <b>'. base64_decode(urldecode($judul)) .'</b> berhasil dihapus!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>');
        redirect('setup/gallery');
    }

    public function gambar($id, $parm)
    {
         if ($id == 'gallery') {
                    $this->db->where('id', $parm);
                    $this->db->update('gallery', ['gambar' => '']);
                    redirect('edit/gallery/'. $parm);
            }
    }

    public function slider($id)
    {
        $check = $this->db->get_where('data_homepage', ['id' => $id])->row();
        unlink('./assets/img/images/' . $check->gambar);
        $this->db->where('id', $id);
        $this->db->delete('data_homepage');
        $swal = [
            'tipe' => 'success',
            'pesan' => $check->jenis.' Berhasil Dihapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('profile/homepage');
    }

    public function siswa($id)
    {
        $idpost = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->or_where('id', $idpost);
        $this->db->delete('siswa');

        $swal = [
            'tipe' => 'success',
            'pesan' => 'Siswa Berhasil Dihapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/siswa');
    }

    public function guru($id)
    {
        $users = $this->db->get_where('guru', ['id' => $id])->row();
        
        $this->db->where('nama', $users->nip);
        $this->db->delete('users');
        $this->db->where('id', $id);
        $this->db->delete('guru');

        $swal = [
            'tipe' => 'success',
            'pesan' => 'Guru Berhasil Dihapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/guru');
    }

    public function ruangan($id)
    {
        $this->db->where('ruangan_id', $id);
        $this->db->delete('ruangan');

        $swal = [
            'tipe' => 'success',
            'pesan' => 'Ruangan Berhasil Dihapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/ruangan');
    }

    public function mapel($id)
    {
        $this->db->where('mapel_id', $id);
        $this->db->delete('mapel');

        $swal = [
            'tipe' => 'success',
            'pesan' => 'Mapel Berhasil Dihapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('data/mapel');
    }

    public function user($id)
    {
        $this->db->where('id', $id)->delete('users');
        $swal = [
            'tipe' => 'success',
            'pesan' => 'User Berhasil Dihapus'
        ];
        $this->session->set_flashdata($swal);
        redirect('admin/user');
    }

    public function jurusan($idd)
    {
        $id = $this->input->post('hapus');
        $this->db->where('jurusan_id', $id);
        $this->db->or_where('jurusan_id', $idd);
        $this->db->delete('jurusan');

        $swal = [
            'tipe' => 'success',
            'pesan' => 'Data Berhasil dihapus',
        ];
        $this->session->set_flashdata($swal);
        redirect('data/jurusan');
    }

    public function kelas()
    {
        $id = $this->input->post('hapus');
        $this->db->where('kelas_id', $id);
        $this->db->delete('kelas');
    }

    public function jadwal()
    {
        $id = $this->input->post('hapus');
        $this->db->where('jadwal_id', $id);
        $this->db->delete('jadwal');
    }

    public function jadwalujian()
    {
        $id = $this->input->post('hapus');
        $this->db->where('id', $id);
        $this->db->delete('jadwal_ujian');
    }

    public function inventaris($table, $id, $parm)
    {
        $kata = substr($parm, 3);
        $this->db->where($parm, $id)->delete($table);
        $swal=['tipe'=>'success', 'pesan' => 'Data '.$kata.' berhasil dihapus'];
        $this->session->set_flashdata($swal);
        redirect('inventaris/barang/'.$kata.'/'.$table);
    }

    public function barang($id, $name)
    {
        $this->db->where('id_barang', $id)->delete('barang');
        $swal=['tipe'=>'success', 'pesan' => 'Data '.$name.' berhasil dihapus'];
        $this->session->set_flashdata($swal);
        redirect('inventaris/daftar');
    }

    public function jabatan($id)
    {
        $this->db->where('id_jabatan', $id)->delete('jabatan');
        $swal=['tipe'=>'success', 'pesan' => 'Data Jabatan berhasil dihapus'];
        $this->session->set_flashdata($swal);
        redirect('admin/staff');
    }

    public function staffjabatan($id)
    {
        $this->db->where('staff_jabatan_id', $id)->delete('staff_jabatan');
        $swal=['tipe'=>'success', 'pesan' => 'Data Staff Jabatan berhasil dihapus'];
        $this->session->set_flashdata($swal);
        redirect('admin/staff');
    }

}