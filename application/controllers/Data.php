<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Data
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

class Data extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  private function cekLogin(){
    if (!$this->session->userdata('user')) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Anda belum melakukan Login!</div>');
      redirect('login/index');
  }
}

  public function index()
  {
    $this->cekLogin();

    


    $this->load->model('Login_model');

    $data['user'] = $this->Login_model->getUser($this->session->userdata('user'));

    $this->load->model('User_model');

    $data['debitur'] = $this->User_model->getAllDebitur();

    

    
    



    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('data/datamaster',$data);
    $this->load->view('layout/footer');
  }

}


/* End of file Data.php */
/* Location: ./application/controllers/Data.php */