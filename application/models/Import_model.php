<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function guru()
  {
    $fileName = $_FILES['fileAdmin']['name'];
        
        $config['upload_path'] = './assets/data/guru/excel/'; //path upload
        $config['file_name'] = date('dmY-').$fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
        
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
        
        if(! $this->upload->do_upload('fileAdmin') ){
            echo $this->upload->display_errors();exit();
        }
        
        $inputFileName = './assets/data/guru/excel/'.date('dmY-').$fileName;
        
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        
        for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
            NULL,
            TRUE,
            FALSE);

            if($rowData[0][7] == '-' ||  $rowData[0][7] == ' '){
              $userPass = $rowData[0][1];
            }else{
              $userPass = $rowData[0][7];
            }
            
            $user = [
              'nama' => $rowData[0][1],
              "email"=> $rowData[0][9],
              'status' => 0,
              "role_id"=> 3,
              "date_created"=> date('Y-m-d'),
              'password' => password_hash($userPass, PASSWORD_DEFAULT)
            ];

            $this->db->insert('users', $user);
            
            $guru = $this->db->get_where('users', ['email' =>$rowData[0][9] ])->row();
            $jurusan = $this->db->get_where('jurusan', ['nama_jurusan' => $rowData[0][4]])->row();
            
            // Sesuaikan key array dengan nama kolom di database                                                         
            $data = [
              "id_user" => $guru->id,
              "nip"=> $rowData[0][1],
              "nama"=> $rowData[0][2],
              "status"=> $rowData[0][3],
              "id_jurusan"=> $jurusan->jurusan_id,
              "date_created"=> date('Y-m-d'),
              "tahun_ajar_awal"=> $rowData[0][5],
              "lulusan"=> $rowData[0][6],
              "telepon"=> $rowData[0][8],
              "email"=> $rowData[0][9],
              "alamat"=> $rowData[0][10],
            ];
                
                $this->db->insert("guru",$data);
                
            }
            $swal = [
              'tipe' => 'success',
              'pesan' => 'Import Data Guru Berhasil'
            ];
            $this->session->set_flashdata($swal);
            redirect('data/guru');
  }


  // ------------------------------------------------------------------------
  public function user()
  {
    $fileName = $_FILES['fileUser']['name'];
        
        $config['upload_path'] = './assets/data/user/excel/'; //path upload
        $config['file_name'] = date('dmY-').$fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
        
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
        
        if(! $this->upload->do_upload('fileUser') ){
            echo $this->upload->display_errors();exit();
        }
        
        $inputFileName = './assets/data/user/excel/'.date('dmY-').$fileName;
        
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        
        for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
            NULL,
            TRUE,
            FALSE);   
            
            // Sesuaikan key array dengan nama kolom di database                                                         
            $data = [
                "username"=> $rowData[0][1],
                "password"=> password_hash($rowData[0][2], PASSWORD_DEFAULT),
                "role_id" => $rowData[0][3]
                ];
                
                $this->db->insert("users",$data);
                
            }
            $swal = [
              'tipe' => 'success',
              'pesan' => 'Import Data User   Berhasil'
            ];
            $this->session->set_flashdata($swal);
            redirect('id/page/user');
  }


  // ------------------------------------------------------------------------
  public function staff()
  {
    $fileName = $_FILES['fileStaff']['name'];
        
        $config['upload_path'] = './assets/data/staff/excel/'; //path upload
        $config['file_name'] = date('dmY-').$fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
        
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
        
        if(! $this->upload->do_upload('fileStaff') ){
            echo $this->upload->display_errors();exit();
        }
        
        $inputFileName = './assets/data/staff/excel/'.date('dmY-').$fileName;
        
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        
        for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
            NULL,
            TRUE,
            FALSE);   
            
            $jabatan = $this->db->get_where('jabatan', ['nama_jabatan' => $rowData[0][2]])->row();

            // Sesuaikan key array dengan nama kolom di database                                                         
            $user = [
                "email"=> $rowData[0][5],
                "password"=> password_hash(12345, PASSWORD_DEFAULT),
                "role_id" => 1,
                "date_created" => date('Y-m-d ')
            ];

            $staff = [
              'nama_staff' => $rowData[0][1],
              'id_jabatan' => $jabatan->id_jabatan,
              'nip_staff' => $rowData[0][3],
              'email' => $rowData[0][5],
              'identitas_staff' => $rowData[0][4]
            ];
                
              $this->db->insert("staff",$staff);
              $this->db->insert("users",$user);
                
            }
            $swal = [
              'tipe' => 'success',
              'pesan' => 'Import Data staff Berhasil'
            ];
            $this->session->set_flashdata($swal);
            redirect('id/page/staff');
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function siswa()
  {
    $fileName = $_FILES['fileSiswa']['name'];
        
        $config['upload_path'] = './assets/data/siswa/excel/'; //path upload
        $config['file_name'] = date('dmY-').$fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
        
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
        
        if(! $this->upload->do_upload('fileSiswa') ){
          $swal = [
            'tipe' => 'warning',
            'pesan' => 'Import Data Siswa Gagal, Mohon masukan file inputan!'
          ];
          $this->session->set_flashdata($swal);
          redirect('data/siswa');
        }
        
        $inputFileName = './assets/data/siswa/excel/'.date('dmY-').$fileName;
        
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
            die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }
        
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        
        for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
            NULL,
            TRUE,
            FALSE);   
            
            $siswa = [
              'nis' => $rowData[0][1],
              'nama' => $rowData[0][2],
              // 'email' => $rowData[0][2],
              'tahun_ajaran' => $rowData[0][3],
              'jurusan' => $rowData[0][4],
              'date_created' => date('Y-m-d')
            ];

            $users = [
              'nama' => $rowData[0][4],
              'email' => $rowData[0][2],
              'password' => password_hash($rowData[0][4], PASSWORD_DEFAULT),
              'role_id' => 3,
              'date_created' => date('Y-m-d')
            ];
              $this->db->insert('users', $users);  
              $this->db->insert("siswa",$siswa);
                
            }
            $swal = [
              'tipe' => 'success',
              'pesan' => 'Import Data Siswa Berhasil'
            ];
            $this->session->set_flashdata($swal);
            redirect('data/siswa');
  }

  // ------------------------------------------------------------------------

}

/* End of file Import_model.php */
/* Location: ./application/models/Import_model.php */