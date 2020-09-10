<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Inventaris extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    maintanance_check();
    $this->load->model('User_model', 'user');
    $this->load->model('Data_model', 'data');
    $this->load->model('Barang_model', 'Barang');
  }

  public function index()
  {
    redirect('auth/blocked');
  }

  public function daftar()
  {
    $data = [
      'user' => $this->user->getUserSession(),
      'title' => 'Daftar Barang',
      'table' => $this->Barang->getJoinTable(),
      'jenis' => $this->Barang->getTable('jenis_barang'),
      'merk' => $this->Barang->getTable('merk_barang'),
      'unit' => $this->Barang->getTable('unit_barang'),
    ];
      $this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('inventaris/index');
    	$this->load->view('templates/footer', $data);
  }

  public function barang($id, $table)
  {
    $data = [
      'user' => $this->user->getUserSession(),
      'title' => 'Daftar '.$id.' barang',
      'btnId' => 'nama_'.$id,
      'formInput' => $table,
      'id' => $id,
      'table' => $this->db->get($table)->result_array(),
    ];
      $this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('inventaris/daftar/index');
    	$this->load->view('templates/footer', $data);
  }

  public function transaksi()
  {
    $data = [
      'user' => $this->user->getUserSession(),
      'title' => 'Transaksi Barang',
      'table' => $this->Barang->getJoinTable(),
      'data' => $this->Barang->getJoinData(),
      'pembelian' => $this->Barang->getDataTransaksi('pembelian')
    ];
    
      $this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('inventaris/transaksi/index');
    	$this->load->view('templates/footer', $data);
  }

  public function get_data_barang()
  {
    $id = $this->input->post('id');
    $data = $this->Barang->Barang->getJoinTableById($id);
    echo json_encode($data);
  }

  public function get_id_nota()
  {
    $data = $this->Barang->getTableByToday('pembelian');
    $angka = $data+1;
    $id = 'SPI-'. date('dmY').'-'.$angka; 
    echo json_encode($id);
  }

}


/* End of file Inventaris.php */
/* Location: ./application/controllers/Inventaris.php */
