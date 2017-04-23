<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oauth extends CI_Controller {

  public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->model('UserAuth');
      $this->load->library('encrypt');
  }
  function index(){
      $this->form_validation->set_error_delimiters('<div class="pad5 alert alert-danger bor0"><i class="fa fa-times fa-fw"></i>', '</div>');
      $this->form_validation->set_rules('usr', 'username', 'trim|required');
      $this->form_validation->set_rules('pas', 'Password', 'trim|required');

      if ($this->form_validation->run() == FALSE){
          $this->load->view('index');
      }
      else{
        $data = array(
          'usr' => $this->input->post('usr'),
          'pas' => $this->input->post('pas'),
          'status' => 1
        );
        $result = $this->UserAuth->getUserAuth($data);
        if($result){
          $username = $this->input->post('usr');
          $result = $this->UserAuth->getUserInfo($username);
          if($result != false){
              $session_data = array(
                'name' => $result[0]->name,
                'email' => $result[0]->email,
                'usr' => $result[0]->usr
              );
              $this->session->set_userdata('logged_in',$session_data);
              $type = $result[0]->uType;
              if(isset($session_data)){
                redirect(base_url().'app/view/dashboard');
              }
              else{
                $this->laod->view('index');
              }
          }
          else{
            $this->session->set_flashdata('msg','<div class="top-center pad5 alert alert-danger bor0"> <i class="fa fa-times fa-fw"></i>Oops! Error.  Please try again later!!!</div>');
            redirect(base_url());
          }
        }
        else{
          $this->session->set_flashdata('msg','<div class="top-center pad5 alert alert-danger bor0"> <i class="fa fa-times fa-fw"></i>Oops! Error.  Please try again later!!!</div>');
          redirect(base_url());
        }
      }
  }

    // Logout from admin page
    public function logout() {
      $sess_array = array(
      'usr' => '',
      'email'=>'',
      'name'=>''
      );
      $this->session->unset_userdata('logged_in', $sess_array);
      redirect(base_url());
    }

    //change password
    public function changePassword(){
      if($this->session->userdata('logged_in')){
        $pas=file_get_contents('php://input');
        $data = array(
          'pas' => md5($pas)
        );
        $usr = $_SESSION['logged_in']['usr'];
        $result = $this->UserAuth->setPsword($data,$usr);print_r($result);exit;
          if($result){
            return $result;
          }
      }
      else{
        $this->session->set_tempdata('msg1','<div class="top-right-msg pad5 alert alert-danger bor0"> <i class="fa fa-times fa-fw"></i>Failed to change password</div>',5);
        redirect(base_url().'index');
      }
    }
}
