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
    // $data['history']  = $this->model_history->get_history();
    $data['file']     ='dashboard';

    $this->load->view('index', $data);
  }
// ===== /.DASHBOARD

// ===== JENIS BARANG
	public function jenisBarang()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $user = $this->session->userdata('username');
    $query = $this->db->get_where('tbl_user', array('username' => $user));
    
    $data['user']          = $query->row_array(); 
    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
    $data['file']          = 'jenisBarang';
    
    $this->form_validation->set_rules('nama_jenisBarang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('tag_jenisBarang', 'Tag Barang', 'required');
    $this->form_validation->set_rules('satuan_jenisBarang', 'Satuan Barang', 'required');

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('index', $data);
    }
    else
    {
      $this->model_jenisBarang->set_jenisBarang();
      redirect('jenis-barang',$data);
    }
  }

  public function jenisBarang_delete($id)
  {
    $this->model_jenisBarang->delete_jenisBarang($id);
    $data['file']          = 'jenisBarang';
    
    redirect('jenis-barang',$data);
  }
// ===== /.JENIS BARANG

// ===== TRANSAKSI
  // public function transaksi()
	// {
  //   $this->load->helper('form');
  //   $this->load->library('form_validation');

  //   $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
  //   $data['file']          = 'formTransaksi';

  //   $this->load->view('index', $data);
  // }

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
    // $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
    // $data['file']          = 'transMasuk';

    $this->load->view('scanner/index');
  }

  public function transaksi_keluar_scan()
	{
    $data =$this->model_scanner->get_barang_scan();
    echo json_encode($data);
  }
// ===== /.TRANSAKSI

// ===== HISTORY
  public function history()
	{
    $data['history']  = $this->model_history->get_history();
    $data['file']     ='history';

    $this->load->view('index', $data);
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
