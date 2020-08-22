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
         $materi = $this->db->get_where('data_file', ['id_materi' => $id])->result_array();
         foreach ($materi as $m ) {
          $cek = $m['lokasi_file'].$m['nama_file'];
              force_download($cek, NULL);
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
