<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_model extends CI_Model
{

	public function dataExcelSiswa()
    {
         $siswa = $this->db->get('siswa')->result();

          $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Nis')
                      ->setCellValue('C1', 'Nama')
                      ->setCellValue('D1', 'Kelas')
                      ->setCellValue('E1', 'Jurusan')
                      ->setCellValue('F1', 'Angkatan')
                      ->setCellValue('G1', 'Tahun Ajaran')
                      ->setCellValue('H1', 'Email');

          $kolom = 2;
          $nomor = 1;
          foreach($semua_pengguna as $pengguna) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $pengguna->nis)
                           ->setCellValue('C' . $kolom, $pengguna->nama)
                           ->setCellValue('D' . $kolom, $pengguna->kelas)
                           ->setCellValue('E' . $kolom, $pengguna->jurusan)
                           ->setCellValue('F' . $kolom, $pengguna->angkatan)
                           ->setCellValue('G' . $kolom, $pengguna->tahun_ajaran)
                           ->setCellValue('H' . $kolom, $pengguna->email);

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="siswa-'.date('Ymd').'.xlsx"');
        header('Cache-Control: max-age=0');

      $writer->save('php://output');
    }

}