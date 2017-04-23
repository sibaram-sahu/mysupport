<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TicketModel extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function setData($data){
      return $this->db->insert('sp_tickets', $data);
    }

    function getData(){
      $arr = array();
      $this->db->select("*");
      $this->db->from('sp_tickets');
      $this->db->order_by("t_id", "desc");
      $this->db->where(array('t_status' => 1));
      $query = $this->db->get();
      $arr = $query->result_array();
      return json_encode($arr);
    }
    function deleteData($id){
      $this->db->where('t_id', $id);
      return $this->db->delete('sp_tickets');
    }
    function updateData($upd){
      $data = array(
        't_name' => $upd->name,
        't_desc'=> $upd->desc,
        't_sts'=> $upd->sts,
        't_pri'=> $upd->pri,
        't_dt'=> Date('Y-m-d')
      );
      $this->db->where('t_id', $upd->id);
      return $this->db->update('sp_tickets',$data);
    }
}
