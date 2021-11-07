<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {

  function get_all($where = [], $like = [], $limit = null, $offset = null){

    if($where){ $this->db->where($where); }
    if($like){ 
      $is_first = true;
      foreach ($like as $i => $v) {
        if($is_first){
          $this->db->like($i, $v); 
        }else{
          $this->db->or_like($i, $v); 
        }

        $is_first = false;
      }
    }
        
    if($limit && $offset){ 
      $this->db->limit($limit, $offset); 
    }
    
    $q = $this->db->get('pengguna');

    return ($q) ? $q->result() : false;
  }

  function get_count($where = [], $like = []){

    if($where){ $this->db->where($where); }
    if($like){ 
      $is_first = true;
      foreach ($like as $i => $v) {
        if($is_first){
          $this->db->like($i, $v); 
        }else{
          $this->db->or_like($i, $v); 
        }

        $is_first = false;
      }
    }
    
    $q = $this->db->get('pengguna');

    return ($q) ? $q->num_rows() : false;
  }

  function get_item($id = null){

    $this->db->where('id', $id);
    
    $q = $this->db->get('pengguna');

    return ($q) ? $q->row() : false;
  }

  function delete_item($id = null){

    $this->db->where('id', $id);
    
    $q = $this->db->delete('pengguna');

    return ($q) ? true : false;
  }

  function proccess($id = null, $data = []){
    $q = false;

    if(! $id){
      $q = $this->db->insert('pengguna', $data);
    }else{
      $this->db->where('id', $id);
      $q = $this->db->update('pengguna', $data);
    }

    return $q;
  }
}