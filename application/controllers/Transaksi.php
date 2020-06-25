<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('model_jenisBarang');
    $this->load->helper('url_helper');
  }
  
  public function in()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
    
    $this->form_validation->set_rules('nama_jenisBarang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('tag_jenisBarang', 'Tag Barang', 'required');
    $this->form_validation->set_rules('satuan_jenisBarang', 'Satuan Barang', 'required');
    $this->form_validation->set_rules('nominal_jenisBarang', 'Nominal', 'required');

    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('barangMasuk', $data);
    }
    else
    {
      $this->model_jenisBarang->set_jenisBarang();
      redirect('barangMasuk',$data);
    }
  }


  public function delete($id)
  {
    $this->model_jenisBarang->delete_jenisBarang($id);
    redirect('jenisBarang',$data);
  }


}
