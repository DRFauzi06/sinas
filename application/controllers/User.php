<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
*
* Controller User
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

class User extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
  }
  
  public function index()
  {
    $this->cekLogin();
    $this->load->model('Login_model');
    
    $data['debitur'] = $this->db->from("debitur")->count_all_results();
    $data['rekening'] = $this->db->from("rekening")->count_all_results();
    $data['transaksi'] = $this->db->from("transaksi")->count_all_results();
    
    $this->db->select_sum('saldo');
    
    // $query = "SELECT SUM('SALDO') FROM rekening";
    $data['saldo'] = $this->db->get('rekening')->result_array();
    
    
    $data['user'] = $this->Login_model->getUser($this->session->userdata('user'));
    
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('user/dashboard');
    $this->load->view('layout/footer');
  }
  
  private function cekLogin(){
    if (!$this->session->userdata('user')) {
      $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Anda belum melakukan Login!</div>');
      redirect('login/index');
    }
    
  }
  
  public function register(){
    $this->cekLogin();
    $this->load->model('Login_model');
    
    
    $data['user'] = $this->Login_model->getUser($this->session->userdata('user'));
    $data['CIF'] = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
    
    
    
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('user/register');
    $this->load->view('layout/footer');
    
  }
  
  public function daftar(){
    
    $this->cekLogin();
    
    
    
    //get data
    $nama = $this->input->post('namaPendaftar');
    $nik = $this->input->post('nikPendaftar');
    $tgl = $this->input->post('tglLahir');
    $jk = $this->input->post('kelaminPendaftar');
    $alamat = $this->input->post('alamatPendaftar');
    $cif = $this->input->post('cifBaru');
    
    
    $data= array(
      'nama_debitur'=> $nama,
      'nik_debitur'=> $nik,
      'tgl_lahir'=> $tgl,
      'jenis_kelamin'=> $jk,
      'alamat'=> $alamat,
      'cif'=> $cif,
      'status'=> 1
    );
    
    
    $query = $this->db->insert('debitur',$data);
    if($query){
      $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4 mb-4">Pendaftaran Debitur baru berhasil</div>');
      redirect('user/register');
    }else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Pendaftaran Debitur baru Gagal</div>');
      redirect('user/register');
    }
    
    
    
    
  }
  
  public function cekcif(){
    
    $this->cekLogin();
    
    $nik = $this->input->post('nikPendaftar');
    
    $query = $this->db->get_where('debitur',['nik_debitur'=>$nik])->row_array();
    var_dump($query);
    
    if(!$query){
      
      
      $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">NIK belum terdaftar, lakukan pendaftaran terlebih dahulu</div>');
      redirect('user/register');
      
    }else if($query){
      
      $tanggal = date('ymdd');
      
      
      
      
      
      $data = $query;
      $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4 mb-4">NIK sudah terdaftar, pendaftar bisa membuka rekening</div>');
      $this->load->model('Login_model');
      
      
      $data['user'] = $this->Login_model->getUser($this->session->userdata('user'));
      $data['rekening'] =  $tanggal + str_pad(mt_rand(10,99),2,'0',STR_PAD_LEFT);
      
      // var_dump($data);
      
      $this->load->view('layout/header');
      $this->load->view('layout/sidebar',$data);
      $this->load->view('user/registerrekening',$data);
      $this->load->view('layout/footer');
      
      
    }
    
    
  }
  
  public function rekening()
  {
    
    $this->cekLogin();
    $id = $this->input->post('idDebitur');
    $nama = $this->input->post('namaAkun');
    $rek = $this->input->post('noRekening');
    $cif = $this->input->post('noCif');
    $tgl = $this->input->post('tanggal');
    
    $data = array(
      'id_debitur' => $id,
      'nama_akun' => $nama,
      'no_rekening' => $rek,
      'no_cif' => $cif,
      'tanggal_buka' => $tgl,
      'saldo' => 0,
      'status' => 1
    );
    
    // var_dump();
    
    $query = $this->db->insert('rekening',$data);
    if($query){
      $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4 mb-4">Rekening baru berhasil dibuat!</div>');
      redirect('user/saldo');
    }else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Rekening baru gagal dibuat!</div>');
      redirect('user/cekCik');
    }
    
    
  }
  
  public function saldo(){
    
    $this->cekLogin();
    
    $data['jam'] = date('H:i:s');
    
    
    $this->load->model('Login_model');
    
    $data['user'] = $this->Login_model->getUser($this->session->userdata('user'));
    
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('user/saldo');
    $this->load->view('layout/footer');
    
    
    
  }
  public function transaksi(){
    
    $this->cekLogin();
    
    
    $this->load->model('Login_model');
    
    $data['user'] = $this->Login_model->getUser($this->session->userdata('user'));
    
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('user/transaksi');
    $this->load->view('layout/footer');
    
    
  }
  
  public function edit(){
    
    $this->cekLogin();
    
    $this->load->model('Login_model');
    $id= $this->uri->segment('3');
    
    $this->load->model('User_model');
    $data['debitur'] = $this->User_model->getUserById($id);
    $data['rekening'] = $this->User_model->getRekeningById($id);
    
    
    $data['user'] = $this->Login_model->getUser($this->session->userdata('user'));
    
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('user/edit',$data);
    $this->load->view('layout/footer');
    
    
  }
  public function hapus(){
    $this->cekLogin();
    
    $data = array(
      'status'=>2
    );
    
    $this->load->model('Login_model');
    $id= $this->uri->segment('3');
    $this->db->where('id_debitur',$id);
    $this->db->update('debitur',$data);
    
    // $this->db->delete('debitur',['id_debitur'=>$id]);
    
    $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4 mb-4">Data debitur berhasil dihapus!</div>');
    redirect('data/index');
    
    
    
    
  }
  
  public function editAkun(){
    
    $this->cekLogin();
    
    $this->load->model('Login_model');
    $id= $this->uri->segment('3');
    
    $this->load->model('User_model');
    $data['rekening'] = $this->User_model->getRekeningDetailById($id);
    
    $this->load->model('User_model');
    $data['user'] = $this->Login_model->getUser($this->session->userdata('user'));
    
    $this->load->view('layout/header');
    $this->load->view('layout/sidebar',$data);
    $this->load->view('user/editAkun',$data);
    $this->load->view('layout/footer');
    
  }
  public function update(){
    
    $this->cekLogin();
    
    $id = $this->input->post('idDebitur');
    $nama = $this->input->post('namaDebitur');
    $nik = $this->input->post('nikDebitur');
    $tgl = $this->input->post('tglLahir');
    $jk = $this->input->post('kelaminDebitur');
    $alamat = $this->input->post('alamatDebitur');
    
    
    $data= array(
      'nama_debitur'=> $nama,
      'nik_debitur'=> $nik,
      'tgl_lahir'=> $tgl,
      'jenis_kelamin'=> $jk,
      'alamat'=> $alamat
    );
    
    $this->db->where('id_debitur',$id);
    
    $query = $this->db->update('debitur',$data);
    
    if($query){
      $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4 mb-4">Data Debitur berhasil dirubah</div>');
      // var_dump($query);
      // echo $this->db->error();
      redirect('data/index');
    }else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Data Debitur gagal dirubah</div>');
      redirect('data/index');
    }
    
  }
  public function updateAkun(){
    $this->cekLogin();
    $id = $this->input->post('idRekening');
    $nama = $this->input->post('namaAkun');
    $status = $this->input->post('statusAkun');
    
    $tanggal = date('Y-m-d');
    
    if($status==1){
      $data = array(
        'nama_akun' =>$nama
      );
      $this->db->where('id',$id);
      $this->db->update('rekening',$data);
      redirect('data/index');
      
    }else if($status==2){
      $data = array(
        'nama_akun' =>$nama,
        'status' =>2,
        'tanggal_tutup' =>$tanggal
      );
      $this->db->where('id',$id);
      $this->db->update('rekening',$data);
      redirect('data/index');
    }
    
    
  }
  
  public function editRekening(){
    
    
  }
  
  
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */