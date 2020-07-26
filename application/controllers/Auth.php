<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('model_auth');
  }

  public function index(){
    if($this->session->userdata('status') == "login"){
			redirect(base_url());
    }
    
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
    );
    
    if ($this->form_validation->run() == FALSE){
      $this->load->view('login');
    }else{
      $cek = $this->model_auth->cek_login("tbl_user",$where)->num_rows();
      if($cek > 0){

        $data_session = array(
          'username' => $username,
          'status' => "login"
        );

        $this->session->set_userdata($data_session);

        redirect(base_url());

      }else{
        echo "Username dan password salah !";
      }
    }
      
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect(base_url());
  }

}
