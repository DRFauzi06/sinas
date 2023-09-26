<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Saldo_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Saldo_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  public function addSaldo($nom,$rekening){

    $nominal = 'UPDATE rekening SET saldo = saldo + ? WHERE no_rekening = ?';
    $this->db->trans_begin();
    $this->db->query($nominal,array($nom,$rekening));
    $this->db->trans_complete();

    $status = $this->db->trans_status();

    if( $status === false){
      echo 'rollback';
    }else{
      echo 'commited';
    }

    return $status;

  }

   public function tarikSaldo($nom,$rekening){

    $nominal = 'UPDATE rekening SET saldo = saldo - ? WHERE no_rekening = ?';
    $this->db->trans_begin();
    $this->db->query($nominal,array($nom,$rekening));
    $this->db->trans_complete();

    if($this->db->trans_status() === false){
      echo 'rollback';
    }else{
      echo 'commited';
    }

  }
  

  // ------------------------------------------------------------------------

}

/* End of file Saldo_model.php */
/* Location: ./application/models/Saldo_model.php */