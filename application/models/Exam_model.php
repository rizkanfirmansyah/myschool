<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exam_model extends CI_Model
{

	public function datasiswa($id)
	{
		return $this->db->select('*')->from('siswa')->join('kelas', 'siswa.kelas_id=kelas.kelas_id', 'left')->join('jurusan', 'jurusan=jurusan.jurusan_id', 'left')->where('nis', $id)->get();
	}

	public function dataujian($id, $tipe)
	{
		if($tipe == 'UAS'){
			return $this->db->select('*, jadwal_ujian.mulai as waktu_mulai, cbt_ujian.id as idujian')->from('cbt_ujian')->join('jadwal_ujian', 'id_ujian=cbt_ujian.id', 'left')->join('mapel', 'id_mapel=mapel_id')->join('kelas', 'id_kelas=kelas_id')->where('cbt_ujian.id', $id)->get();
		}else{
			return $this->db->select('*, cbt_ujian.id as idujian')->from('cbt_ujian')->join('jadwal', 'jadwal.id_mapel=cbt_ujian.id_mapel', 'left')->join('mapel', 'jadwal.id_mapel=mapel_id')->join('kelas', 'id_kelas=kelas_id')->where('cbt_ujian.id', $id)->get();

		}
	}

	public function ambilNilai()
	{
		$nama = $this->session->userdata('nama');
		$ujian = $this->session->userdata('ujian');
		return $this->db->select('*')->from('data_nilai_ujian')->join('siswa', 'nis=id_siswa', 'left')->join('kelas', 'id_kelas=kelas.kelas_id')->join('cbt_ujian', 'id_ujian=cbt_ujian.id')->join('mapel', 'id_mapel=mapel_id')->where('id_ujian', $ujian)->where('id_siswa', $nama)->get()->row_array();
	}

}