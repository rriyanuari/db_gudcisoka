<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

  public function __construct(){
    parent::__construct();
    
    if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}

    $this->load->model('model_barang');
    $this->load->helper('url_helper');
  }
  
  public function index()
	{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['barang'] = $this->model_barang->get_barang();

    $this->load->view('barang', $data);
  }

  public function qrcodeGenerate($id)
  {
    $data['id'] = $id;
    $data['barangSatuan']   = $this->model_barang->get_barang_id($id);

    $this->load->view('qrcodeGenerate', $data);
  }


  public function delete($id)
  {
    $this->model_barang->delete_barang($id);
    redirect('barang');
  }

}
