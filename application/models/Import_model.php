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
        $config['file_name'] = date('dmYHis-').$fileName;  // nama file
        $config['allowed_types'] = 'xls|xlsx|csv'; //tipe file yang diperbolehkan
        $config['max_size'] = 10000; // maksimal sizze
        
        $this->load->library('upload'); //meload librari upload
        $this->upload->initialize($config);
        
        if(! $this->upload->do_upload('fileAdmin') ){
            echo $this->upload->display_errors();exit();
        }
        
        $inputFileName = './assets/data/guru/excel/'.date('dmYHis-').$fileName;
        
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
              'status' => 1,
              "role_id"=> 3,
              "date_created"=> date('Y-m-d'),
              'password' => password_hash($userPass, PASSWORD_DEFAULT)
            ];

            
            // $guru = $this->db->get_where('users', ['email' =>$rowData[0][9] ])->row();
            $jurusan = $this->db->get_where('jurusan', ['nama_jurusan' => $rowData[0][4]])->row();
            
            // Sesuaikan key array dengan nama kolom di database                                                         
            $data = [
              // "id_user" => $guru->id,
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
              "agama"=> $rowData[0][11],
              "tanggal_lahir"=> $rowData[0][12],
            ];
            
            $check = $this->db->get_where('users', ['role_id'=> 3])->num_rows();
            if($check < 1){
              $pengguna = 0;
              $siswadata = 0;
            }else{
              $pengguna = $this->db->get_where('users', ['nama' => $rowData[0][1]])->row();
              $siswadata = $this->db->get_where('guru', ['nip' => $rowData[0][1]])->row();

              if($pengguna != 0 || $siswadata != 0){
                $swal = [
                  'tipe' => 'warning',
                  'pesan' => 'Import Data GAGAL! NIP atau NUPTK '. $rowData[0][1] .' sudah ada, Mohon periksa kembali data guru'
                ];
                $this->session->set_flashdata($swal);
                redirect('data/guru');
              }
            }

            if($rowData[0][1] == null && $rowData[0][2] == null && $rowData[0][3] == null ){
              $swal = [
                'tipe' => 'error',
                'pesan' => 'Import Data Guru Gagal pada row '.$rowData
              ];
              $this->session->set_flashdata($swal);
              redirect('data/guru');
            }else{
              
              $this->db->insert('users', $user);
              $this->db->insert("guru",$data);
            }
            
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
    $config['file_name'] = date('siHdmY-').$fileName;  // nama file
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
        
        $inputFileName = './assets/data/siswa/excel/'.date('siHdmY-').$fileName;
        
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
            $kelas = $this->db->get_where('kelas', ['nama_kelas' => $rowData[0][7]])->row_array();
            $angkatan = $this->db->get_where('angkatan', ['angkatan_nama' => $rowData[0][5]])->row_array();

            // if($rowData[0][8] == ' ' || $rowData[0][8] == '-'){
              $password = $rowData[0][2];
            // }else{
              // $password = $rowData[0][8];
            // }
            
            $siswa = [
              'nama' => $rowData[0][1],
              'nis' => $rowData[0][2],
              'nisn' => $rowData[0][3],
              'kelas_id' => $kelas['kelas_id'],
              'jurusan' => $kelas['jurusan_id'],
              'tahun_ajaran' => $rowData[0][6],
              'angkatan_id' => $angkatan['angkatan_id'],
              'telepon' => $rowData[0][8],
              'email' => $rowData[0][9],
              'tempat_lahir' => $rowData[0][10],
              'ttl' => $rowData[0][11],
              'asal_sekolah' => $rowData[0][12],
              'nama_ayah' => $rowData[0][13],
              'nama_ibu' => $rowData[0][14],
              'alamat' => $rowData[0][15],
              'agama' => $rowData[0][16],
              'status' => $rowData[0][17],
              'date_created' => date('Y-m-d')
            ];

            // var_dump($siswa);
            // die;
            
            $users = [
              'nama' => $rowData[0][2],
              'email' => $rowData[0][9],
              'password' => password_hash($password, PASSWORD_DEFAULT),
              'role_id' => 4,
              'status' => 0,
              'date_created' => date('Y-m-d')
            ];
            
            $check = $this->db->get_where('users', ['role_id'=> 4])->num_rows();
            if($check < 1){
              $pengguna = 0;
              $siswadata = 0;
            }else{
              $pengguna = $this->db->get_where('users', ['nama' => $rowData[0][2]])->num_rows();
              $siswadata = $this->db->get_where('siswa', ['nis' => $rowData[0][2]])->num_rows();
            }

            if($pengguna > 0 || $siswadata > 0){
              // $swal = [
              //   'tipe' => 'warning',
              //   'pesan' => 'Import Data GAGAL! NIS '. $rowData[0][1] .' sudah ada, Mohon periksa kembali data siswa'
              // ];
              // $this->db->update('users', $users);  
              $this->db->where('nis', $rowData[0][2])->update("siswa",$siswa); 
              // $this->db->insert("siswa",$siswa); 
              // $this->session->set_flashdata($swal);
              // redirect('data/siswa');
              // die;
            }else{
              $this->db->insert('users', $users);  
              $this->db->insert("siswa",$siswa); 
            }
          }
            $swal = [
              'tipe' => 'success',
              'pesan' => 'Import Data Siswa Berhasil'
            ];
            $this->session->set_flashdata($swal);
            redirect('data/siswa');
  }

  // ------------------------------------------------------------------------
  // UPDATE MODEL

  public function updateSiswa()
  {
    $fileName = $_FILES['fileSiswa']['name'];
    
    $config['upload_path'] = './assets/data/siswa/excel/'; //path upload
    $config['file_name'] = date('siHdmY-').$fileName;  // nama file
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
        
        $inputFileName = './assets/data/siswa/excel/'.date('siHdmY-').$fileName;
        
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
            $kelas = $this->db->get_where('kelas', ['nama_kelas' => $rowData[0][4]])->row_array();
            $angkatan = $this->db->get_where('angkatan', ['angkatan_nama' => $rowData[0][6]])->row_array();

            if($rowData[0][8] == ' ' || $rowData[0][8] == '-'){
              $password = $rowData[0][1];
            }else{
              $password = $rowData[0][8];
            }
            
            $siswa = [
              'nis' => $rowData[0][1],
              'nisn' => $rowData[0][2],
              'nama' => $rowData[0][3],
              'kelas_id' => $kelas['kelas_id'],
              'jurusan' => $kelas['jurusan_id'],
              'angkatan_id' => $angkatan['angkatan_id'],
              'tahun_ajaran' => $rowData[0][7],
              'email' => $rowData[0][9],
              'telepon' => $rowData[0][10],
              'status' => $rowData[0][11],
              'tempat_lahir' => $rowData[0][12],
              'ttl' => $rowData[0][13],
              'agama' => $rowData[0][14],
              'asal_sekolah' => $rowData[0][15],
              'nama_ayah' => $rowData[0][16],
              'nama_ibu' => $rowData[0][17],
              'alamat' => $rowData[0][18],
              'date_created' => date('Y-m-d')
            ];
            
            // $users = [
            //   'nama' => $rowData[0][1],
            //   'email' => $rowData[0][9],
            //   'password' => password_hash($password, PASSWORD_DEFAULT),
            //   'role_id' => 3,
            //   'status' => 1,
            //   'date_created' => date('Y-m-d')
            // ];
            
            // $pengguna = $this->db->get_where('users', ['nama' => $rowData[0][1]])->row();
            // $siswa = $this->db->get_where('siswa', ['nis' => $rowData[0][1]])->row();
            // $namasiswa = $this->db->get_where('siswa', ['nama' => $rowData[0][1]])->row();

            $this->db->set($siswa)->where('nis', $rowData[0][1])->update('siswa');
            // $this->db->set($users)->where('nama', $rowData[0][1])->update('users');
                
          }
            $swal = [
              'tipe' => 'success',
              'pesan' => 'Import Data Siswa Berhasil'
            ];
            $this->session->set_flashdata($swal);
            redirect('data/siswa');
  }

 

}

/* End of file Import_model.php */
/* Location: ./application/models/Import_model.php */