<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Data_model
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

class Data_model extends CI_Model {

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

  public function getAllDebitur(){
    $this->db->select('debitur.*','rekening.*');
    $this->db->from('debitur');
    $this->db->join('rekening','debitur.id_debitur = rekening.id_debitur');
    $query = $this->db->get();
    return $query->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file Data_model.php */
/* Location: ./application/models/Data_model.php */