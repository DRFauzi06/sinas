<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Login
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Login extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
  }

  public function index()
  {
    $this->cekStatus();
    $this->load->view('login/login');
  }

  public function login(){

    $this->cekStatus();
    $user = $this->input->post('username');
    $passwd = $this->input->post('passwordUser');

    $this->load->model('Login_model');
    $query = $this->db->get_where('users',['username'=>$user])->row_array();

    if($query){

      if(password_verify($passwd,$query['password'])){
        $data = array(
          'user' =>$user
        );
        $this->session->set_userdata($data);
        redirect('user');
      }else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Password salah</div>');
        redirect('login/index');
      }

    }else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Email salah</div>');
      redirect('login/index');
    }


  }

  private function cekStatus(){
    if($this->session->userdata('user')<>null){
      redirect('user/index');
    }
  }

  public function logout(){
    $this->session->sess_destroy();
    $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4 mb-4">Logout Berhasil</div>');

    $this->load->view('login/login');

  }

}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */