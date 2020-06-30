<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

  public function __construct(){
    parent::__construct();

    if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
    }

    $this->load->model('model_jenisBarang');
    $this->load->model('model_barang');
    $this->load->model('model_history');
  }
  
  public function index()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
    $this->load->view('formTransaksi', $data);
  }

  public function barangMasuk()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('namaBarang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('qty_barang', 'Tag Barang', 'required');
    $this->form_validation->set_rules('tgl_kadaluarsa', 'Tanggal Kadaluarsa', 'required');

    if ($this->form_validation->run() == FALSE)
    {
      $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
      $this->load->view('formTransaksi', $data);
    }
    else
    {
      $this->model_barang->set_barang();

      $data['status']     = "masuk";
      $data['keterangan'] = "";
      $data['barang']     = $this->model_barang->get_barang_last();  

      $this->model_history->set_history($data);
      redirect('barang');
    }

  }


}

