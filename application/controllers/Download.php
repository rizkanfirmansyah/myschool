<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Download extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function materi($id)
    {
         siswa_checked_download($id);
         $materi = $this->db->get_where('data_file', ['id_materi' => $id]);
         if($materi->num_rows() == 1){
              $down = $materi->row();
              $file =$down->lokasi_file.$down->nama_file;
          force_download($file, NULL);
         }else{
              $file_id = $materi->row();
              redirect('guru/download/materi/'.$file_id->id_materi);
         }
    }

    public function file($type, $id)
    {
          if ($type == 'guru') {
               $data = $this->db->get_where('data_file', ['id' => $id])->row();
               force_download($data->lokasi_file.$data->nama_file, NULL);
          }
    }

    public function excel($id)
    {
     force_download('assets/templates/excel/'.$id.'/' .$id.'.xls', NULL);
    }

    public function gallery($coba)
    {
    	 force_download('assets/img/gallery/'.$coba, NULL);
    }


    public function tugas($id)
    {
         force_download('assets/member/file-tugas/'.$id, NULL);
    }

    public function nilai($id)
    {
         force_download('assets/member/file-nilai/'.$id, NULL);
    }

    public function catatan($id)
    {
         force_download('assets/member/file-catatan/'.$id, NULL);
    }

    public function sertifikat($id)
    {
         force_download('assets/member/file-sertifikat/'.$id, NULL);
    }

    public function template($id)
    {
        $excel = $id.'.xls';
        force_download('assets/template/excel/'.$excel, NULL);
    }

}
