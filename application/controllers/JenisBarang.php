<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisBarang extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('model_jenisBarang');
    $this->load->helper('url_helper');
  }

	public function index()
	{
    $data['jenisBarang']   = $this->model_jenisBarang->get_jenisBarang();
    
		$this->load->view('dashboard', $data);
  }

}
