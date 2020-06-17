<?php
class Model_jenisBarang extends CI_Model{
  
  public function __construct(){
    $this->load->database();
  }
  
  public function get_jenisBarang($slug = FALSE){
    if($slug === FALSE){
      $query = $this->db->get('tbl_jenisBarang');
      return $query->result_array();
    }
    
    $query = $this->db->get_where('tbl_jenisBarang', array('slug' => $slug));
    return $query->row_array();
  }

  public function get_jenisBarang_id($id = FALSE){
    $query = $this->db->get_where('news', array('id' => $id));
    return $query->row_array();
  }

}
