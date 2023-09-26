<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Login_model
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

class Login_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getUser($username)
  {
    $query = $this->db->get_where('users',['username'=>$username]);
    return $query->row_array();
  }

  // ------------------------------------------------------------------------

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */