<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

  public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('TicketModel');
      $this->load->library('encrypt');
  }
  function index(){
    $this->setTicket();
  }

  function setTicket(){
    $this->form_validation->set_error_delimiters('<div class="pad5 alert alert-danger bor0"><i class="fa fa-times fa-fw"></i>', '</div>');
    $this->form_validation->set_rules('title', 'Title', 'trim|required');
    $this->form_validation->set_rules('desc', 'Description', 'trim|required');
    $this->form_validation->set_rules('status', 'Status', 'trim');
    $this->form_validation->set_rules('prority', 'Prority', 'trim');

    if ($this->form_validation->run() == FALSE){
        redirect(base_url().'app/view/dashboard');
    }
    else{
      $data = array(
        't_name' => $this->input->post('title'),
        't_desc' => $this->input->post('desc'),
        't_sts' => $this->input->post('status'),
        't_pri' => $this->input->post('prority'),
        't_cre' => $_SESSION['logged_in']['name'],
        't_dt' => Date('Y-m-d'),
        't_status' => 1
      );
      $result = $this->TicketModel->setData($data);
      if($result){
        $this->session->set_tempdata('msg1','<div class="top-right-msg pad5 alert alert-success bor0"> <i class="fa fa-check fa-fw"></i>Ticket created</div>',5);
        redirect(base_url().'app/view/dashboard');
        }
        else{
          $this->session->set_tempdata('msg1','<div class="top-right-msg pad5 alert alert-danger bor0"> <i class="fa fa-times fa-fw"></i>Oops! Error.  Please try again later!!!</div>',5);
          redirect(base_url().'app/view/dashboard');
        }
      }
    }

  function getTicket(){
    if($this->session->userdata('logged_in')){
      $result = $this->TicketModel->getData();
      echo $result;
    }
    else{
      redirect(base_url().'app/view');
    }
  }

  function deleteTicket(){
    if($this->session->userdata('logged_in')){
      $id = $this->uri->segment(3);
      $result = $this->TicketModel->deleteData($id);
      if($result){
        $this->session->set_tempdata('msg1','<div class="top-right-msg pad5 alert alert-success bor0"> <i class="fa fa-check fa-fw"></i>Ticket Deleted</div>',5);
      }
    }
    else{
      redirect(base_url().'app/view');
    }
  }
  function updateTicket(){
    $obj=json_decode(file_get_contents('php://input'));
    if($this->session->userdata('logged_in')){
     $result = $this->TicketModel->updateData($obj);
      if($result){
        print_r($result);
        //return $result;
      }
    }
    else{
      $this->session->set_tempdata('msg1','<div class="top-right-msg pad5 alert alert-danger bor0"> <i class="fa fa-times fa-fw"></i>Update failed</div>',5);
      redirect(base_url().'index');
    }
  }

}
