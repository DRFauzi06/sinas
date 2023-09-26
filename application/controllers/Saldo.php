<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
*
* Controller Saldo
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

class Saldo extends CI_Controller
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
  
  public function tambahSaldo()
  {
    
    
    
    $rek = $this->input->post('noRekening');
    $saldo = filter_input(INPUT_POST, 'debet', FILTER_VALIDATE_INT);
    
    $this->load->model('User_model');
    
    $rekening = $this->User_model->getRekeningByNo($rek);
    var_dump($rekening);
    
    $cek = $this->db->get_where('transaksi',['no_rekening'=>$rek])->result_array();
    if($rekening['status']==2){
      $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Rekening sudah tidak aktif, transaksi tidak bisa dilakukan!</div>');
      redirect('user/saldo');
    }else{
      if(!$cek){
        
        if($saldo>=25000){
          
          
        }else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Transaksi pertama minimal 25000!</div>');
          redirect('user/saldo');
        }
        
      }
      
      
      
      $transaksi = "setor";
      
      $user = $this->db->get_where('rekening',['no_rekening'=>$rek])->row_array();
      
      $this->transaksi($transaksi,$user,$saldo);
      
      $this->load->model('Saldo_model');
      $status = $this->Saldo_model->addSaldo($saldo,$rek);
      
      
      
      // $data = array(
        
        
        //   'saldo' =>  $saldo
        
        // );
        
        
        // $this->db->where('no_rekening',$rek);
        
        // $query = $this->db->update('rekening',$data);
        if($status){
          $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4 mb-4">Saldo berhasil ditambahkan kedalam rekening anda!</div>');
          redirect('user/saldo');
        }else{
          $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Nomor rekening belum terdaftar! silahkan buat rekening terlebih dahulu</div>');
          redirect('user/saldo');
        }
        
      }
    }
    
    public function tarikSaldo(){
      
      $rek = $this->input->post('noRekening');
      $saldo = filter_input(INPUT_POST, 'debet', FILTER_VALIDATE_INT);
      
      $transaksi = "tarik";
      
      
      $user = $this->db->get_where('rekening',['no_rekening'=>$rek])->row_array();
      $this->load->model('User_model');
      
      $rekening = $this->User_model->getRekeningByNo($rek);
      
      if($rekening['status']==2){
        $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Rekening sudah tidak aktif, transaksi tidak bisa dilakukan!</div>');
        redirect('user/transaksi');
      }else{
        
        if($saldo>$user['saldo']){
          $this->session->set_flashdata('message', '<div class="alert alert-danger ml-4 mr-4 mb-4">Uang yang ingin ditarik melebihi saldo rekening anda!</div>');
          redirect('user/transaksi');
          // echo "Saldo Kurang";
          // echo "Saldo tolol";
        }
        else{
          $this->transaksi($transaksi,$user,$saldo);
          
          $this->load->model('Saldo_model');
          $this->Saldo_model->tarikSaldo($saldo,$rek);
          $this->session->set_flashdata('message', '<div class="alert alert-success ml-4 mr-4 mb-4">Anda berhasil menarik uang dari rekening anda!</div>');
          redirect('user/transaksi');
          
        }
        
        
        
        
      }
    }
    
    public function transaksi($jenis,$user,$nominal){
      
      if($jenis=="setor"){
        // $tgl = date('d-m-Y');
        
        $data = array(
          'id_debitur'=>$user['id_debitur'],
          'no_rekening'=>$user['no_rekening'],
          'tanggal_transaksi'=>date('Y-m-d'),
          'jam'=>date('H:i:s'),
          'nominal'=>$nominal,
          'jenis_transaksi'=>"Setoran Tunai",
          'debet'=>"D"
        );
        $this->db->insert('transaksi',$data);
        
      }else if($jenis=="tarik"){
        
        $data = array(
          'id_debitur'=>$user['id_debitur'],
          'no_rekening'=>$user['no_rekening'],
          'tanggal_transaksi'=>date('Y-m-d'),
          'jam'=>date('H:i:s'),
          'nominal'=>$nominal,
          'jenis_transaksi'=>"Tarik Tunai",
          'debet'=>"K"
        );
        $this->db->insert('transaksi',$data);
        
      }
      
      
    }
    
    public function cekSaldo(){
      
      $this->cekLogin();
      
      $rek = $this->input->post('noRekening');
      $namaAkun = $this->input->post('namaAkun');
      
      $data['rekening'] = $this->db->get_where('rekening',['no_rekening'=>$rek])->row_array();
      $id = $data['rekening']['id_debitur'];
      $data['debitur'] = $this->db->get_where('debitur',['id_debitur'=>$id])->row_array();
      
      // var_dump($data);
      $this->load->model('Login_model');
      
      $data['user'] = $this->Login_model->getUser($this->session->userdata('user'));
      
      $this->load->view('layout/header');
      $this->load->view('layout/sidebar',$data);
      $this->load->view('user/ceksaldo',$data);
      $this->load->view('layout/footer');
      
    }
    
    public function mutasi(){
      
      $rek = $this->input->post('noRekening');
      $namaAkun = $this->input->post('namaAkun');
      
      $this->load->model('Login_model');
      
      $data['user'] = $this->Login_model->getUser($this->session->userdata('user'));
      
      
      $data['rekening'] = $this->db->get_where('rekening',['no_rekening'=>$rek])->row_array();
      // $id = $data['rekening']['id_debitur'];
      // $data['debitur'] = $this->db->get_where('debitur',['id_debitur'=>$id])->row_array();
      
      
      $data['mutasi'] = $this->db->order_by('jam','DESC')->get_where('transaksi', ['no_rekening'=>$rek])->result();
      
      // var_dump($mutasi);
      
      
      $this->load->view('layout/header');
      $this->load->view('layout/sidebar',$data);
      $this->load->view('user/mutasi',$data);
      $this->load->view('layout/footer');
      
      
      
      
      // $mutasi = $this->db->query($query)->result();
      
      // foreach($mutasi as $item){
        //   // var_dump($item);
        //   if($item->debet =="D"){
          //     $saldoAwal = $saldoAwal + $item->nominal;
          
          //     echo "Menambah : ".$saldoAwal."<br>";
          
          //   }else if($item->debet =="K"){
            //     $saldoAwal = $saldoAwal - $item->nominal;
            //    echo "Menarik : ".$saldoAwal."<br>";
            
            //   }
            
            // }
            
            
            // $data['mutasi'] = 
            
          }
          
        }
        
        
        /* End of file Saldo.php */
        /* Location: ./application/controllers/Saldo.php */