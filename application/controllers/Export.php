<?php
defined('BASEPATH') or exit('No direct script access allowed');
ob_start();
class Export extends CI_Controller
{
	public function __construct()
    {
	 parent::__construct();
      maintanance_check();
      log_history();
      $this->load->model('User_model', 'user');
      $this->load->model('Insert_model', 'insert');
      $this->load->model('Data_model', 'data');
      $this->load->model('Update_model', 'update');
      $this->load->model('Delete_model', 'delete');
      $this->load->model('Member_model', 'member');
      $this->load->model('Backend_model', 'backend');
      $this->load->model('Import_model', 'import');
      $this->load->model('Siswa_model', 'siswa');
      $this->load->model('Guru_model', 'guru');
      require_once APPPATH."/third_party/PHPExcel.php";
      require_once APPPATH."/third_party/PHPExcel/IOFactory.php";
        if ($this->session->userdata('role_id') != 1) {
              redirect('data/user/');
      }
    }


    public function E_siswa()
    {
      $ambildata = $this->siswa->siswa()->result();
            
      if(count($ambildata)>0){
          $objPHPExcel = new PHPExcel();
      // Set properties
          $objPHPExcel->getProperties()
          ->setCreator("Riezkan Aprianda Firmansyah") //creator
          ->setTitle("Programmer -  Build with IT Club SMKN5 Bandung");   //file title
          
          $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
          $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
          
          $objget->setTitle('Sample Sheet'); //sheet title
           
          $objget->getStyle("A1:D1")->applyFromArray(
              array(
                  'fill' => array(
                      'type' => PHPExcel_Style_Fill::FILL_SOLID,
                      'color' => array('rgb' => '92d050')
                  ),
                  'font' => array(
                      'color' => array('rgb' => '000000')
                      )
                      )
                  );
                  
      //table header
          $cols = array("A","B","C", "D");
          
          $val = array("No","Nama","NIS", 'Email');
          
          for ($a=0;$a<4; $a++) 
          {
              $objset->setCellValue($cols[$a].'1', $val[$a]);
              
          //Setting lebar cell
              $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
              $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
              $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
              
              $style = array(
                  'alignment' => array(
                      'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                      )
                  );
                  $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
          }
          $kolom = 1;
          $baris  = 2;
          foreach ($ambildata as $frow){
              
          //pemanggilan sesuaikan dengan nama kolom tabel
              $objset->setCellValue("A".$baris, $kolom); //membaca data nama
              $objset->setCellValue("B".$baris, $frow->nama); //membaca data alamat
              $objset->setCellValue("C".$baris, $frow->nis); //membaca data alamat
              $objset->setCellValue("D".$baris, $frow->email); //membaca data kontak
               
          //Set number value
              $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
              
              $baris++;
              $kolom++;
          }
           
          $objPHPExcel->getActiveSheet()->setTitle('Data Export');

          $objPHPExcel->setActiveSheetIndex(0);  
          $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");
          ob_end_clean();
          header('Content-Type: application/vnd.ms-excel'); //mime type
          header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
          header('Cache-Control: max-age=0'); //no cache
          
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');                
          $objWriter->save('php://output');
          ob_end_clean();
      }else{
          redirect('data/siswa');
      }
    }

    public function E_guru()
    {
        $ambildata = $this->guru->allObj()->result();
            
      if(count($ambildata)>0){
          $objPHPExcel = new PHPExcel();
      // Set properties
          $objPHPExcel->getProperties()
          ->setCreator("Riezkan Aprianda Firmansyah") //creator
          ->setTitle("Programmer -  Build with IT Club SMKN5 Bandung");   //file title
          
          $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
          $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
          
          $objget->setTitle('Sample Sheet'); //sheet title
           
          $objget->getStyle("A1:J1")->applyFromArray(
              array(
                  'fill' => array(
                      'type' => PHPExcel_Style_Fill::FILL_SOLID,
                      'color' => array('rgb' => '92d050')
                  ),
                  'font' => array(
                      'color' => array('rgb' => '000000')
                      )
                      )
                  );
                  
      //table header
          $cols = array("A","B","C", "D", "E", "F", "G", "H", "I", "J");
          
          $val = array("No","NIP","Nama", 'Status', 'Jurusan', 'tahun ajar awal', 'lulusan', 'telepon', 'email', 'alamat');
          
          for ($a=0;$a<4; $a++) 
          {
              $objset->setCellValue($cols[$a].'1', $val[$a]);
              
          //Setting lebar cell
              $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
              $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
              $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
              
              $style = array(
                  'alignment' => array(
                      'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                      )
                  );
                  $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
          }
          $kolom = 1;
          $baris  = 2;
          foreach ($ambildata as $frow){
              
          //pemanggilan sesuaikan dengan nama kolom tabel
              $objset->setCellValue("A".$baris, $kolom); //membaca data nama
              $objset->setCellValue("C".$baris, $frow->nip); //membaca data alamat
              $objset->setCellValue("B".$baris, $frow->nama); //membaca data alamat
              $objset->setCellValue("D".$baris, $frow->status); //membaca data kontak
              $objset->setCellValue("E".$baris, $frow->nama_jurusan); //membaca data kontak
              $objset->setCellValue("F".$baris, $frow->tahun_ajar_awal); //membaca data kontak
              $objset->setCellValue("G".$baris, $frow->lulusan); //membaca data kontak
              $objset->setCellValue("H".$baris, $frow->telepon); //membaca data kontak
              $objset->setCellValue("I".$baris, $frow->email); //membaca data kontak
              $objset->setCellValue("J".$baris, $frow->alamat); //membaca data kontak
               
          //Set number value
              $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
              
              $baris++;
              $kolom++;
          }
           
          $objPHPExcel->getActiveSheet()->setTitle('Data Export');

          $objPHPExcel->setActiveSheetIndex(0);  
          $filename = urlencode("Data".date("Y-m-d H:i:s").".xls");
          ob_end_clean();
          header('Content-Type: application/vnd.ms-excel'); //mime type
          header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
          header('Cache-Control: max-age=0'); //no cache
          
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');                
          $objWriter->save('php://output');
          ob_end_clean();
      }else{
          redirect('data/guru');
      }
    }

}