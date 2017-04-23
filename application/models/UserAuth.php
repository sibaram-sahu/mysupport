<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserAuth extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getUserAuth($data){
      $condition = "usr ="."'".$data['usr']."' AND pas ="."'".md5($data['pas'])."' AND sts=1";
      $this->db->select('*');
      $this->db->from('sp_user');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() == 1)
      {
        return true;
      }
      else{
        return false;
      }
    }

    function getUserInfo($username){
      $condition = "usr ="."'".$username."'";
      $this->db->select('*');
      $this->db->from('sp_user');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() == 1)
      {
        return $query->result();
      }
      else{
        return false;
      }
    }

    function setPsword($data,$uid){
      $this->db->where('usr', $uid);
      return $this->db->update('sp_user', $data);
    }
}
