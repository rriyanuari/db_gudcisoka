<?php
class Model_scanner extends CI_Model{

  public function __construct(){
    $this->load->database();
  }

  public function get_barang_scan(){
    $post_scan = explode("-",$_GET["scan"],);
    $post_scan = $post_scan[1];

    if($post_scan != ""){
      $query = $this->db->get_where('tbl_barang', array('id_barang' => $post_scan));
      $cek = mysqli_num_rows($sql);
      if($cek > 0) {
        echo "gagal";
      } else {
        $this->db->select('id_transaksi');
        $this->db->from('tbl_scan');
        $sql_per_id = $this->db->get();
        $s = 1;
        if(mysqli_num_rows($sql_per_id) > 0) {
          while($d_kode = mysqli_fetch_array($sql_per_id)){
            $data_id['$s'] = $d_kode['id'];
            $s++;
            $id_transaksi = $data_id['$s'] + 1;
          }
        } else {
          $data_id['$s'] = 1 ;
          $id_transaksi = $data_id['$s'];
        }
        $data = array( 
          'id_transaksi'          => $id_transaksi,
          'id_barang'             => $post_scan,
        );
        $this->db->insert('tbl_scan', $data);
        echo "sukses";
      }
    } else {
      echo "gagal";
    }
  }

}