<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model User_model
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

class User_model extends CI_Model {

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

  public function cekStatus($nik){



  }

  public function getAllDebitur(){
    $this->db->select('*');
    $this->db->from('debitur');
    $this->db->where('status',1);
    // $this->db->join('rekening','debitur.id_debitur = rekening.id_debitur');
    $query = $this->db->get();
    return $query->result();
  }

  public function getUserById($id){
    $this->db->select('*');
    $this->db->from('debitur');
    $this->db->where('id_debitur',$id);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function getRekeningById($id){
    $this->db->select('*');
    $this->db->from('rekening');
    $this->db->where('id_debitur',$id);
    $query = $this->db->get();
    return $query->result();
  }
  public function getRekeningDetailByID($id){
    $this->db->select('*');
    $this->db->from('rekening');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function getRekeningByNo($rek){

    $this->db->select('*');
    $this->db->from('rekening');
    $this->db->where('no_rekening',$rek);
    $query = $this->db->get();
    return $query->row_array();

  }

  // ------------------------------------------------------------------------

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */