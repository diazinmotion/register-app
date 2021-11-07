<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

  function verify_login($email = null, $password = null){

    $this->db->where('email', $email);
    $this->db->where('password', $password);
    
    $q = $this->db->get('users');

    return ($q) ? $q->row() : false;
  }
}