<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

  public function __construct(){
    parent::__construct();

    if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
    }

    $this->load->model('model_jenisBarang');
    $this->load->model('model_barang');
    $this->load->model('model_history');
    $this->load->model('model_scanner');
  }

// ===== DASHBOARD
  public function index()
  {
    $data['jenis_barang']  = $this->model_jenisBarang->get_count_jenisBarang();
    $data['barang']        = $this->model_barang->get_count_barang();
    $data['history']       = $this->model_history->get_count_history();
    $data['file']          ='dashboard';

    // var_dump($data);

    $this->load->view('index', $data);
  }
// ===== /.DASHBOARD

// ===== JENIS BARANG
	public function jenisBarang()
	{
    $this->load->helper('form');

    $user = $this->session->userdata('username');
    $query = $this->db->get_where('tbl_user', array('username' => $user));
    
    $data['user']          = $query->row_array(); 
    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
    $data['file']          = 'jenisBarang';

    $this->load->view('index', $data);
  }

  public function jenisBarang_download()
	{
    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();

    $this->load->view('reports/csv-jenisBarang', $data);
  }

  public function jenisBarang_print()
	{
    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();

    $this->load->view('reports/pdf-jenisBarang', $data);
  }

	public function jenisBarang_create()
	{
    $data = $this->model_jenisBarang->set_jenisBarang();
    echo json_encode($data);
  }

  public function jenisBarang_delete($id)
  {
    $this->model_jenisBarang->delete_jenisBarang($id);
    $data['file']          = 'jenisBarang';
    
    redirect('jenis-barang',$data);
  }
// ===== /.JENIS BARANG

// ===== TRANSAKSI

  public function transaksi_masuk()
	{

    $this->load->library('form_validation');

    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
    $data['file']          = 'transMasuk';

    $this->load->view('index', $data);
  }


  public function transaksi_masuk_proses()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('namaBarang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('qty_barang', 'Tag Barang', 'required');
    $this->form_validation->set_rules('tgl_kadaluarsa', 'Tanggal Kadaluarsa', 'required');

    if ($this->form_validation->run() == FALSE)
    {
      $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
      $data['file']          = 'transMasuk';
      $this->load->view('index', $data);
    }
    else
    {
      $this->model_barang->set_barang();

      $data['status']     = "masuk";
      $data['keterangan'] = "";
      $data['barang']     = $this->model_barang->get_barang_last();  

      $this->model_history->set_history($data);
      redirect(base_url());
    }

  }

  public function transaksi_keluar()
	{
    $data['id_transaksi'] = $this->model_scanner->get_id_transaksi();
    $this->load->view('scanner/index', $data);
  }

  public function transaksi_keluar_scan()
	{
    if(isset($_GET['scan'])){
      $data =$this->model_scanner->get_barang_scan();
      echo $data;
    };
  } 

  public function transaksi_keluar_scan2()
	{
    $data = $this->model_scanner->list_barang_scanned();
    echo json_encode($data);
  }

  public function transaksi_keluar_proses($id_transaksi)
	{
    $data['id_transaksi'] = $id_transaksi; 
    $data['barang']       = $this->model_scanner->list_barang_scanned2($id_transaksi);
    $data['file']         = 'transKeluar';

    $this->load->view('index', $data);
  }

  public function transaksi_keluar_proses_execute($id_transaksi)
	{
    $keterangan = $_GET['keterangan'];
    $data['id_transaksi'] = $id_transaksi;
    if (!$this->model_scanner->proses_execute_barang_scanned2($id_transaksi, $keterangan)){
      ?><script>alert('gagal')</script> <?php
      die();
    };
    ?><script>alert('barang berhasil keluar')</script> <?php
    
    redirect(site_url('history'));
  }


// ===== /.TRANSAKSI

// ===== HISTORY
  public function history()
	{
    $data['history']  = $this->model_history->get_history();
    $data['file']     ='history';

    $this->load->view('index', $data);
  }

  public function history_download()
	{
    $data['history']   = $this->model_history->get_history();

    $this->load->view('reports/csv-history', $data);
  }

  public function history_print()
	{
    $data['history']   = $this->model_history->get_history();

    $this->load->view('reports/pdf-history', $data);
  }

// ===== /.HISTORY

// ===== BARANG
  public function barang()
	{
    $user = $this->session->userdata('username');
    $query = $this->db->get_where('tbl_user', array('username' => $user));
    
    $data['user']          = $query->row_array(); 
    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
    $data['file']          = 'barang';

    $this->load->view('index', $data);
  }

  public function barang_download()
	{
    // $data['barang']        = $this->model_barang->get_barang();
    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();

    $this->load->view('reports/csv-barang', $data);
  }

  public function barang_print()
	{
    // $data['barang']        = $this->model_barang->get_barang();
    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();

    $this->load->view('reports/pdf-barang', $data);
  }

  public function barang_qrcodeGenerate($id)
  {
    $data['id'] = $id;
    $data['barangSatuan']   = $this->model_barang->get_barang_id($id);

    $this->load->view('qrcodeGenerate', $data);
  }

  public function barang_delete($id)
  {
    $this->model_barang->delete_barang($id);
    redirect('barang');
  }
// ===== /.BARANG




}
