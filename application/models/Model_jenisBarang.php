<?php
class Model_jenisBarang extends CI_Model{
  
  public function __construct(){
    $this->load->database();
  }
  
  public function get_jenisBarang(){
    $query = $this->db->get('tbl_jenisBarang');
    return $query->result_array();
  }

  public function get_sum_jenisBarang($jenisBarang){
    $this->db->select_sum('qty_barang');
    $this->db->where('id_jenisBarang', $jenisBarang);
    $query = $this->db->get('tbl_barang');
    return $query->row_array();
  }

  public function get_count_jenisBarang(){
    $query = $this->db->count_all('tbl_jenisBarang');
    return $query;
  }

  public function set_jenisBarang(){
    $data = array(
      'nama_jenisBarang'    => $this->input->get('nama_jenisBarang'), 
      'satuan_jenisBarang'  => $this->input->get('satuan'), 
      'nominal_jenisBarang' => $this->input->get('nominal'), 
      );

    $result = $this->db->insert('tbl_jenisBarang',$data);
    return $result;
  }

  public function delete_jenisBarang($id){
    return $this->db->delete('tbl_jenisBarang', array('id_jenisBarang'=>$id));
  }
}