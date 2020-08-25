<?php
class Model_scanner extends CI_Model{

  public function __construct(){
    $this->load->database();
  }

  public function get_id_transaksi(){
    $query = $this->db->select_max('id_transaksi');
    $query = $this->db->from('tbl_scan');
    $query = $this->db->get();
    $id_transaksi = $query->row_array();
    $id_transaksi = $id_transaksi['id_transaksi'];
    if($id_transaksi > 0) {
      $id_transaksi += 1;
    } else {
      $id_transaksi = 1;
    }
    return $id_transaksi;
  }

  public function get_barang_scan(){
    $scan         = $_GET['scan'];
    $id_transaksi = $_GET['id_transaksi'];
    $post_scan  = explode("-", $scan);
    $post_scan2 = $post_scan[1];
    var_dump($scan);

    if($post_scan != ""){
      $query = $this->db->get_where('tbl_scan', array('kd_qr' => $scan, 'id_transaksi' => $id_transaksi));
      $query = $query->result_array();
      // var_dump($query); 
      
      $cek = count($query, 0);
      // echo $cek;

      if($cek > 0) {
        echo 'gagal';
      } else {
        $data = array( 
          'id_transaksi'          => $id_transaksi,
          'id_barang'             => $post_scan2,
          'kd_qr'                 => $scan,
        );
        $this->db->insert('tbl_scan', $data);
        echo 'sukses';
      }
    } else {
      echo 'gagal';
    }
  }

  function list_barang_scanned($id_transaksi = FALSE){
    if($id_transaksi === FALSE){
      $id_transaksi = $_GET['id_transaksi'];
    }

    $this->db->select('*');
    $this->db->from('tbl_scan');
    $this->db->join('tbl_barang', 'tbl_scan.id_barang = tbl_barang.id_barang');
    $this->db->join('tbl_jenisbarang', 'tbl_barang.id_jenisBarang = tbl_jenisbarang.id_jenisBarang');
    $this->db->join('tbl_history', 'tbl_barang.id_barang = tbl_history.id_barang');
    $this->db->where('id_transaksi', $id_transaksi);
    $query = $this->db->get();
    return $query->result_array();
  }

  function list_barang_scanned2($id_transaksi = FALSE){
    if($id_transaksi === FALSE){
      return false;
    }

    $this->db->distinct();
    $this->db->select('id_barang');
    $this->db->from('tbl_scan');
    $this->db->where('id_transaksi', $id_transaksi);
    $query = $this->db->get();
    $id_barang = $query->result_array();

    $array_hasil = [];

    foreach($id_barang as $id_barang_satuan):
      $this->db->select('id_barang');
      $this->db->from('tbl_scan');
      $this->db->where(array('id_barang' => $id_barang_satuan['id_barang'], 'id_transaksi' => $id_transaksi ));
      $query  = $this->db->get();
      $jumlah = $query->result_array();
      $count  = count($jumlah);
      $obj    = array( 'id_barang' => $id_barang_satuan['id_barang'],
                       'qty' => $count);
      array_push($array_hasil, $obj);
    endforeach;

    $array_hasil2 = [];
    foreach($array_hasil as $array_hasil_satuan):
      $this->db->distinct();
      $this->db->select(array('nama_jenisBarang', 
                              'tgl_historyBarang', 
                              'tgl_kadaluarsaBarang'));
      $this->db->from('tbl_scan');
      $this->db->join('tbl_barang', 'tbl_scan.id_barang = tbl_barang.id_barang');
      $this->db->join('tbl_jenisbarang', 'tbl_barang.id_jenisBarang = tbl_jenisbarang.id_jenisBarang');
      $this->db->join('tbl_history', 'tbl_barang.id_barang = tbl_history.id_barang');
      $this->db->where('tbl_scan.id_barang', $array_hasil_satuan['id_barang']);
      $query          = $this->db->get();
      $detail_barang  = $query->row_array();

      $detail_barang  = array_merge($detail_barang, $array_hasil_satuan);
      array_push($array_hasil2, $detail_barang);
    endforeach;
    
    return $array_hasil2;
    // die(var_dump($array_hasil2));
  }

  function proses_execute_barang_scanned2($id_transaksi = FALSE, $keterangan = FALSE){
    if($id_transaksi === FALSE || $keterangan === FALSE){
      return false;
    }

    $this->db->distinct();
    $this->db->select('id_barang');
    $this->db->from('tbl_scan');
    $this->db->where('id_transaksi', $id_transaksi);
    $query = $this->db->get();
    $id_barang = $query->result_array();

    $array_hasil = [];

    foreach($id_barang as $id_barang_satuan):
      $this->db->select('id_barang');
      $this->db->from('tbl_scan');
      $this->db->where(array('id_barang' => $id_barang_satuan['id_barang'], 'id_transaksi' => $id_transaksi ));
      $query  = $this->db->get();
      $jumlah = $query->result_array();
      $count  = count($jumlah);
      $obj    = array( 'id_barang' => $id_barang_satuan['id_barang'],
                       'qty_scan' => $count);
      array_push($array_hasil, $obj);
    endforeach;

    $array_hasil2 = [];
    foreach($array_hasil as $array_hasil_satuan):
      $this->db->distinct();
      $this->db->select(array('tbl_scan.id_barang', 
                              'qty_barang', ));
      $this->db->from('tbl_scan');
      $this->db->join('tbl_barang', 'tbl_scan.id_barang = tbl_barang.id_barang');
      $this->db->where('tbl_scan.id_barang', $array_hasil_satuan['id_barang']);
      $query          = $this->db->get();
      $detail_barang  = $query->row_array();
      
      $detail_barang  = array_merge($detail_barang, $array_hasil_satuan);
      $obj      = array( 'qty_akhir' => $detail_barang['qty_barang'] - $detail_barang['qty_scan'] ); 

      $detail_barang  = array_merge($detail_barang, $obj);
      array_push($array_hasil2, $detail_barang);
    endforeach;
    
    foreach($array_hasil2 as $array_hasil2_satuan):
      $data = array(
        'qty_barang' => $array_hasil2_satuan['qty_akhir'],
      );

      $this->db->where('id_barang', $array_hasil2_satuan['id_barang']);
      if($this->db->update('tbl_barang', $data)){
        $data_history = array(
          'id_barang'               => $array_hasil2_satuan['id_barang'],
          'status'                  => 'keluar',
          'qty_history'             => $array_hasil2_satuan['qty_scan'],
          'keterangan'              => $keterangan,
          'tgl_historyBarang'       => date("Y-m-d"),
        );
        $this->db->insert('tbl_history', $data_history);
      };
    endforeach;
    
    return true;
  }
}