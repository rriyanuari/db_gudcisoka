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

  public function set_jenisBarang(){
    $data = array( 
      'nama_jenisBarang'    => $this->input->post('nama_jenisBarang'),
      'tag_jenisBarang'     => $this->input->post('tag_jenisBarang'),
      'satuan_jenisBarang'  => $this->input->post('satuan_jenisBarang'),
      'nominal_jenisBarang' => $this->input->post('nominal_jenisBarang')
    );

    return $this->db->insert('tbl_jenisBarang', $data);
  }
}