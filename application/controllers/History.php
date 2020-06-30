<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

  public function __construct(){
    parent::__construct();

    if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
    }

    $this->load->model('model_history');
    $this->load->helper('url_helper');
  }

  public function index()
	{
    $data['history']   = $this->model_history->get_history();

    $this->load->view('history', $data);
  }

}
