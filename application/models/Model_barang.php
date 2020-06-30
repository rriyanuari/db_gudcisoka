<?php
class Model_barang extends CI_Model{
  
  public function __construct(){
    $this->load->database();
  }

  public function get_barang(){
    $this->db->select('*');
    $this->db->from('tbl_barang');
    $this->db->join('tbl_jenisBarang', 'tbl_barang.id_jenisBarang = tbl_jenisBarang.id_jenisBarang');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function get_barang_id($id = FALSE){
    $query = $this->db->get_where('tbl_barang', array('id_barang' => $id));
    return $query->row_array();
  }

  public function get_barang_last(){
    $this->db->select('*');
    $this->db->from('tbl_barang');
    $this->db->order_by('id_barang', 'DESC');
    $this->db->limit(1);
    
    $query = $this->db->get();

    return $query->row_array();
  }



  public function set_barang(){
    $data = array( 
      'id_jenisBarang'        => $this->input->post('namaBarang'),
      'qty_barang'            => $this->input->post('qty_barang'),
      'tgl_kadaluarsaBarang'  => $this->input->post('tgl_kadaluarsa'),
    );

    return $this->db->insert('tbl_barang', $data);
  }

  public function delete_barang($id){
    return $this->db->delete('tbl_barang', array('id_barang'=>$id));
  }


}