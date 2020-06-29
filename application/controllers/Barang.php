<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('model_jenisBarang');
    $this->load->model('model_transaksi');
    $this->load->helper('url_helper');
  }
  
  public function index()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
    $data['barang']        = $this->model_transaksi->get_jenisBarang_from_barang();
    
    $this->form_validation->set_rules('nama_jenisBarang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('tag_jenisBarang', 'Tag Barang', 'required');
    $this->form_validation->set_rules('satuan_jenisBarang', 'Satuan Barang', 'required');
    $this->form_validation->set_rules('nominal_jenisBarang', 'Nominal', 'required');

    // var_dump($data['barang']);
    if ($this->form_validation->run() == FALSE)
    {

      $this->load->view('barang', $data);
    }
    else
    {
      $this->model_jenisBarang->set_jenisBarang();
      redirect('barang',$data);
    }
  }


  public function delete($id)
  {
    $this->model_jenisBarang->delete_jenisBarang($id);
    redirect('jenisBarang',$data);
  }


}
