<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cbt_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

  public function store()
  {
    $idguru = $this->session->userdata('nama');
    return $this->db->select('*, cbt_ujian.id as idujian')->from('cbt_ujian')->join('mapel', 'cbt_ujian.id_mapel=mapel.mapel_id')->where('id_guru', $idguru)->get()->result_array();
  }

  public function storeActive()
  {
    $idguru = $this->session->userdata('nama');
    return $this->db->select('*, cbt_ujian.id as idujian')->from('cbt_ujian')->join('mapel', 'cbt_ujian.id_mapel=mapel.mapel_id')->where('id_guru', $idguru)->where('active', 1)->get()->result_array();
  }

  public function soal()
  {
    $idujian = $this->uri->segment(4);
    return $this->db->select('*, cbt_soal.id as id, cbt_jawaban.id as idjawaban')->where('id_ujian', $idujian)->from('cbt_soal')->join('cbt_jawaban', 'cbt_soal.id=cbt_jawaban.id_soal', 'left')->get();
  }

  function input_soal_ujian()
  {
    $idujian = $this->uri->segment(4);
    $result = $this->db->where('id_ujian', $idujian)->get('cbt_soal')->num_rows();
    if($result == 'null'){
      $urut = 0;
    }else{
      $urut = $result;
    }

    $urutan = $urut+1;
    $data = [
      'id_ujian' => $idujian,
      'no_urut' => $urutan,
      'soal' => $this->input->post('editordata', true),
      'create_at' => date('Y-m-d'),
    ];

    $image = $_FILES['imagefile']['name'];
    
    if ($image) {
        $config['allowed_types'] = '|jpeg|jpg|png';
        $config['max_size'] = '1024';
        $config['overwrite'] = TRUE;
        $config['upload_path'] = './assets/data/soal/';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('imagefile')) {
            $new_image = $this->upload->data('file_name');  
            $this->db->set('file_soal', $new_image);  
        }else{
            $swal = [
                'tipe' => 'error',
                'pesan' => 'File gagal di Upload'.$this->upload->display_errors()
            ];
            $this->session->set_flashdata($swal);
        redirect('cbt/input/pagesoal/'.$data['id_ujian']);
        }
    }
    $this->db->insert('cbt_soal', $data);
    $swal = [
        'tipe' => 'success',
        'pesan' => 'File berhasil di Upload'
    ];
    $this->session->set_flashdata($swal);
    redirect('cbt/input/pagesoal/'.$data['id_ujian']);
  }

  public function half($idujian)
  {
    $idguru = $this->session->userdata('nama');
    return $this->db->select('*, cbt_ujian.id as idujian')->from('cbt_ujian')->join('mapel', 'cbt_ujian.id_mapel=mapel.mapel_id')->where('cbt_ujian.id', $idujian)->get()->row_array();
  }

  public function _input_ujian()
  {
    $authkey = base64_encode(mt_rand(11111, 99999));

    $data = [
      'id_mapel' => $this->input->post('mapel'),
      'id_guru' => $this->session->userdata('nama'),
      'nama_ujian' => htmlspecialchars($this->input->post('ujian'), true),
      'deskripsi_ujian' => htmlspecialchars($this->input->post('deskripsi'), true),
      'kkm' => $this->input->post('kkm'),
      'auth_key' => $authkey,
      'create_at' => date('Y-m-d'),
      'mulai_at' => $this->input->post('awal'),
      'akhir_at' => $this->input->post('akhir'),
      'tipe' => $this->input->post('tipe'),
      'active' => 0
    ]; 
    $this->db->insert('cbt_ujian', $data);
    $swal = ['tipe' => 'success', 'pesan' => 'Ujian berhasil dibuat'];
    
    $this->session->set_flashdata($swal);
    redirect('cbt/ujian');
  }

  public function update_ujian($idujian)
  {
    $data = [
      'id_mapel' => $this->input->post('mapel'),
      'nama_ujian' => htmlspecialchars($this->input->post('ujian'), true),
      'deskripsi_ujian' => htmlspecialchars($this->input->post('deskripsi'), true),
      'create_at' => date('Y-m-d'),
      'kkm' => $this->input->post('kkm'),
      'mulai_at' => $this->input->post('awal'),
      'akhir_at' => $this->input->post('akhir'),
    ];

    $this->db->where('id', $idujian)->set($data)->update('cbt_ujian');
      $swal = ['tipe' => 'success', 'pesan' => 'Ujian berhasil diubah'];
    
    $this->session->set_flashdata($swal);
    redirect('cbt/ujian');

  }

  public function update_status_ujian($idujian)
  {
    $status = $this->uri->segment(5);
    $this->db->where('id', $idujian)->set('active', $status)->update('cbt_ujian');
    if($status == 1){
      $swal = ['tipe' => 'success', 'pesan' => 'Ujian berhasil diaktifkan'];
    }else{
      $swal = ['tipe' => 'error', 'pesan' => 'Ujian berhasil dinonaktifkan'];
    }
    
    $this->session->set_flashdata($swal);
    redirect('cbt/ujian');
  }
  
  public function delete_ujian($idujian)
  {
    $this->db->where('id', $idujian)->delete('cbt_ujian');
    $swal = ['tipe' => 'success', 'pesan' => 'Ujian berhasil dihapus'];
    $this->session->set_flashdata($swal);
    redirect('cbt/ujian');

  }
  
  public function delete_soal($idujian)
  {
    $cek = $this->uri->segment(5);
    $this->db->where('id', $idujian)->delete('cbt_soal');
    $swal = ['tipe' => 'success', 'pesan' => 'Soal berhasil dihapus'];
    $this->session->set_flashdata($swal);
    redirect('cbt/input/pagesoal/'.$cek);

  }

  public function detail_jawaban()
  {
    $id = $this->uri->segment(4);
    return $this->db->select('*, cbt_soal.id as idsoal')->from('cbt_soal')->join('cbt_ujian', 'cbt_ujian.id=id_ujian', 'left')->where('cbt_soal.id', $id)->get();
  }

  public function input_jawaban()
  {
    $id = $this->input->post('id_soal');
    $cek = $this->db->where('id_soal', $id)->get('cbt_jawaban')->row();
    $rect = $this->db->where('id', $id)->get('cbt_soal')->row();
      if($cek){
         $this->db->where('id', $cek->id)->update('cbt_jawaban', $_POST);
         $swal=['tipe'=>'success', 'pesan'=> 'Jawaban berhasil diperbaharui'];
        }else{
          $this->db->insert('cbt_jawaban', $_POST);
          $swal=['tipe'=>'success', 'pesan'=> 'Jawaban berhasil ditambahkan'];
      }
      $this->session->set_flashdata($swal);
      redirect('cbt/input/pagesoal/'.$rect->id_ujian);
  }

  public function get_jawaban()
  {
    $id = $this->uri->segment(4);

    return $this->db->get_where('cbt_jawaban', ['id_soal'=> $id])->row_array();
  }

  public function get_soal_half($id)
  {
    return $this->db->get_where('cbt_soal', ['id' => $id])->row_array();
  }

  public function delete_file_soal($id)
  {
    $file = $this->uri->segment(5);
    $soal = $this->db->get_where('cbt_soal', ['id' => $id])->row();
    if($file == null){
      $swal = [
        'tipe'=>'warning',
        'pesan'=>'Gambar tidak ada, hapus gagal!',
      ];
      $this->session->set_flashdata($swal);
      redirect('cbt/update/pagesoal/'.$id.'/'.$soal->id_soal);
    }
    unlink('./assets/data/soal/'.$file);
    $this->db->where('id', $id)->set('file_soal', null)->update('cbt_soal');

    $swal = [
      'tipe'=>'success',
      'pesan'=>'Gambar berhasil dihapus',
    ];
    $this->session->set_flashdata($swal);
    redirect('cbt/update/pagesoal/'.$id.'/'.$soal->id_soal);

  }

  public function update_filesoal($id)
  {
    $soal = $this->db->get_where('cbt_soal', ['id' => $id])->row();
    $image = $_FILES['file_soal']['name'];
    
    if ($image) {
        $config['allowed_types'] = '|jpeg|jpg|png';
        $config['max_size'] = '1024';
        $config['overwrite'] = TRUE;
        $config['upload_path'] = './assets/data/soal/';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_soal')) {
            $new_image = $this->upload->data('file_name');  
            $this->db->set('file_soal', $new_image);  
        }else{
            $swal = [
                'tipe' => 'error',
                'pesan' => 'File gagal di Upload'.$this->upload->display_errors()
            ];
            $this->session->set_flashdata($swal);
            redirect('cbt/update/pagesoal/'.$id. '/'.$soal->id_ujian);
          }
        }
        $this->db->where('id', $id)->set($_POST)->update('cbt_soal'); 
        $swal = [
          'tipe' => 'success',
          'pesan' => 'Soal berhasil diperbarui'
      ];
      $this->session->set_flashdata($swal);  
        redirect('cbt/input/pagesoal/'.$soal->id_ujian);
      }

      public function jawaban_half($id)
      {
        return $this->db->get_where('cbt_jawaban', ['id' => $id])->row_array();
      }

    public function upload_file_jawaban($id)
    {
        $soal = $this->db->get_where('cbt_jawaban', ['id_soal' => $id])->row();
        $ujian = $this->db->get_where('cbt_soal', ['id' => $id])->row();
        $image = $_FILES['file']['name'];
        $file = 'file'. $this->input->post('jawaban');
        if($soal->$file != null){
          unlink('./assets/data/jawaban/'.$soal->$file);
        }
    
      if ($image) {
        $config['allowed_types'] = '|jpeg|jpg|png';
        $config['max_size'] = '1024';
        $config['overwrite'] = TRUE;
        $config['upload_path'] = './assets/data/jawaban/';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $new_image = $this->upload->data('file_name');  
            $this->db->set($file, $new_image);  
            $this->db->where('id_soal', $id)->update('cbt_jawaban'); 
        }else{
            $swal = [
                'tipe' => 'error',
                'pesan' => 'File gagal di Upload'.$this->upload->display_errors()
            ];
            $this->session->set_flashdata($swal);
            redirect('cbt/upload/pagejawaban/'.$id.'/'.$ujian->id_ujian);
          }
        }
        $swal = [
          'tipe' => 'success',
          'pesan' => 'Jawaban berhasil diperbarui'
      ];
        $this->session->set_flashdata($swal);  
        redirect('cbt/upload/pagejawaban/'.$id.'/'.$ujian->id_ujian);
      }

      
    }
/* End of file Cbt_model.php */
/* Location: ./application/models/Cbt_model.php */