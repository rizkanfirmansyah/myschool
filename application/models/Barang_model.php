<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Barang_model extends CI_Model {

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

  public function getTable($table)
  {
    return $this->db->get($table)->result_array();
  }

  public function getJoinTable()
  {
    return $this
          ->db  
          ->select('*')
          ->from('barang')
          ->join('merk_barang', 'id_merk=merk_barang', 'left')
          ->join('jenis_barang', 'id_jenis=jenis_barang', 'left')
          ->join('unit_barang', 'id_unit=unit_barang', 'left')
          ->get()
          ->result_array();
  }

  public function getJoinTableById($id)
  {
    return $this
          ->db  
          ->select('*')
          ->from('barang')
          ->join('merk_barang', 'id_merk=merk_barang', 'left')
          ->join('jenis_barang', 'id_jenis=jenis_barang', 'left')
          ->join('unit_barang', 'id_unit=unit_barang', 'left')
          ->where('id_barang', $id)
          ->get()
          ->row_array();
  }

  public function getDataTransaksi($id)
  {
    return $this->db->get_where($id)->num_rows();
  }

  public function getJoinData()
  {
    return $this
          ->db  
          ->select('*')
          ->from('pembelian')
          ->join('barang', 'barang.id_barang=pembelian.id_barang', 'left')
          ->join('merk_barang', 'id_merk=merk_barang')
          ->join('jenis_barang', 'id_jenis=jenis_barang')
          ->join('unit_barang', 'id_unit=unit_barang')
          ->get()
          ->result_array();
  }

  public function getDataGroupBy()
  {
    return $this
          ->db  
          ->select('*, SUM(jumlah_barang) as jmlBarang')
          ->from('pembelian')
          ->join('barang', 'barang.id_barang=pembelian.id_barang', 'left')
          ->join('merk_barang', 'id_merk=merk_barang')
          ->join('jenis_barang', 'id_jenis=jenis_barang')
          ->join('unit_barang', 'id_unit=unit_barang')
          ->group_by('pembelian.id_barang')
          ->get()
          ->result_array();
  }

  public function getJoinDataById($id)
  {
    return $this
          ->db  
          ->select('*')
          ->from('pembelian')
          ->join('barang', 'barang.id_barang=pembelian.id_barang', 'left')
          ->join('merk_barang', 'id_merk=merk_barang')
          ->join('jenis_barang', 'id_jenis=jenis_barang')
          ->join('unit_barang', 'id_unit=unit_barang')
          ->where('id_nota', $id)
          ->get()
          ->row_array();
  }

  public function getTableByToday($table)
  {
    return $this
    ->db
    ->where('DAY(tanggal)', date('d'))
    ->where('MONTH(tanggal)', date('m'))
    ->where('YEAR(tanggal)', date('Y'))
    ->where('jenis_pembelian', 'pembelian')
    ->get($table)
    ->num_rows();
  }

}

/* End of file Barang_model.php */
/* Location: ./application/models/Barang_model.php */