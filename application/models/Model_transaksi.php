<?php
class Model_transaksi extends CI_Model{
  
  public function __construct(){
    $this->load->database();
  }
  
  public function get_barang($slug = FALSE){
    if($slug === FALSE){
      $query = $this->db->get('tbl_barang');
      return $query->result_array();
    }
    
    $query = $this->db->get_where('tbl_barang', array('slug' => $slug));
    return $query->row_array();
  }

  public function get_jenisBarang_from_barang(){
    $this->db->select('*');
    $this->db->from('tbl_barang');
    $this->db->join('tbl_jenisBarang', 'tbl_barang.id_jenisBarang = tbl_jenisBarang.id_jenisBarang');
    $query = $this->db->get();

    return $query->result_array();
  }
  

  public function set_barang(){
    $data = array( 
      'nama_jenisBarang'    => $this->input->post('nama_jenisBarang'),
      'tag_jenisBarang'     => $this->input->post('tag_jenisBarang'),
      'satuan_jenisBarang'  => $this->input->post('satuan_jenisBarang'),
      'nominal_jenisBarang' => $this->input->post('nominal_jenisBarang')
    );

    return $this->db->insert('tbl_barang', $data);
  }

  public function delete_barang($id){
    return $this->db->delete('tbl_barang', array('id_barang'=>$id));
  }
}