<?php
class Model_history extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  public function get_history(){
    $this->db->select('*');
    $this->db->from('tbl_history');
    $this->db->join('tbl_barang', 'tbl_history.id_barang = tbl_barang.id_barang');
    $this->db->join('tbl_jenisBarang', 'tbl_barang.id_jenisBarang = tbl_jenisBarang.id_jenisBarang');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function get_count_history(){
    $query = $this->db->count_all('tbl_history');
    return $query;
  }

  public function set_history($data){
    $barang   = $data['barang'];
    $data2 = array( 
      'id_barang'               => $barang['id_barang'],
      'status'                  => $data['status'],
      'qty_history'             => $this->input->post('qty_barang'),
      'keterangan'              => $data['keterangan'],
      'tgl_historyBarang'       => date("Y-m-d"),
    );

    return $this->db->insert('tbl_history', $data2);
  }

}